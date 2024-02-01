<div class="card">
    <img src="{{ $book->coverUrl }}" alt="{{ $book['title'] }}" class="card-img-top">
    <div class="card-body">
        <strong>{{ $book->title }}</strong>
        <p>{{ $book->author }}</p>
        <p>{{ $book->publish_year }}</p>
        <p><span class="badge text-bg-info">{{ $book->genre?->name }}</span></p>
        @if ($book->available_quantity > 0 && !$book->userRented)
            <button class="btn btn-primary" onclick="rentBook({{ $book['id'] }})">{{ __('app.rent_book') }}</button>
        @elseif ($book->userRented)
            <button class="btn btn-warning" onclick="returnBook({{ $book['id'] }})">{{ __('app.return_book') }}</button>
        @endif
        
    </div>

</div>