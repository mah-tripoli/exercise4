<?php

namespace App\Listeners;

use App\Events\BookRented;
use App\Mail\BookRentedMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class BookRentalAdminNotify
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookRented $event): void
    {
        Mail::to(User::where('role', 'admin')->pluck('email')->toArray())
            ->send(new BookRentedMail($event->book, $event->user));
    }
}
