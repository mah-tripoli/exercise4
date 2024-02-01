<?php

namespace App\Http\Controllers;

use App\Data\BookData;
use App\Events\BookRented;
use App\Models\Book;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index()
    {
        $rentals = collect([]);

        $user = auth()->user();
        if ($user) {
            $rentals = $user->rentals;
        }

        $books = Book::paginate();
        
        // Add the userRented property to each book
        /** @var \Illuminate\Pagination\LengthAwarePaginator $books */
        $books->getCollection()->transform(function ($book) use ($rentals) {
            $book->userRented = $rentals->where('book_id', $book->id)->where('status', 'rented')->isNotEmpty();
            return $book;
        });

        return view('books.index', compact('books'));
    }

    public function rentBook(Request $request)
    {
        $user = auth()->user();

        $bookId = $request->input('book_id');

        $book = Book::find($bookId);

        // Check if the book is already rented
        $rentedBefore = Rental::where('book_id', $bookId)
            ->where('user_id', $user->id)
            ->where('status', 'rented')
            ->exists();
        if ($rentedBefore) {
            return redirect()->route('books.index')->with('error', __('messages.book_already_rented'));
        }

        if ($book->available_quantity > 0) {
            $book->available_quantity--;
            $book->save();

            Rental::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'rental_date' => now(),
                'due_date' => now()->addDays(7),
                'status' => 'rented',
            ]);

            BookRented::dispatch($book, $user);
        } else {
            return redirect()->route('books.index')->with('error', __('messages.book_not_available'));
        }

        // Implement your logic to rent the book

        return redirect()->route('books.index')->with('success', __('messages.book_rented'));
    }

    public function returnBook(Request $request)
    {
        $user = auth()->user();

        $bookId = $request->input('book_id');

        $book = Book::find($bookId);

        if ($user->rentals()->where('book_id', $bookId)->exists()) {
            $user->rentals()->where('book_id', $bookId)->where('status', 'rented')->update([
                'status' => 'returned',
                'return_date' => now(),
            ]);
            $book->available_quantity++;
            $book->save();
        }

        return redirect()->route('books.index')->with('success', __('messages.book_returned'));
    }
}
