<?php

use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/rent-book', [BookController::class, 'rentBook'])->name('books.rent');
    Route::post('/return-book', [BookController::class, 'returnBook'])->name('books.return');

    Route::group(['prefix' => 'admin'], function () {
        Route::resource('books', AdminBookController::class, ['names' => 'admin.books'])->middleware('role.admin');
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Language Switcher
Route::get('/lang/{locale}', function ($locale) {
    app()->setLocale($locale);
    // Set session locale
    session(['locale' => $locale]);

    return redirect()->back();
})->name('locale');
 
