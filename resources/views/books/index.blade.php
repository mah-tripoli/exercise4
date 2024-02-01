@extends('layouts.base')

@section('content')
    <h1 class="h3 mb-6">{{ __('app.books') }}</h1>

    {{-- Display success message --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">
        @foreach ($books as $book)
        <div class="col-4 mb-4">
            @include('books.card')
        </div>
        @endforeach

    </div>

    @if ($books->count() == 0)
        <p>{{ __('app.no_books') }}</p>
    @endif

    {{ $books->links() }}

    <form method="POST" action="{{ route('books.rent') }}" id="rent-book-form">
        @csrf
        <input type="hidden" name="book_id" id="book_id" value="">
    </form>
    <form method="POST" action="{{ route('books.return') }}" id="return-book-form">
        @csrf
        <input type="hidden" name="book_id" id="book_id" value="">
    </form>
    <script>
        function rentBook(bookId) {
            let form = document.getElementById('rent-book-form');
            form.book_id.value = bookId;
            form.submit();
        }
        function returnBook(bookId) {
            let form = document.getElementById('return-book-form');
            form.book_id.value = bookId;
            form.submit();
        }
    </script>
@endsection
