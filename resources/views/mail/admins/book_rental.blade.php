<x-mail::message>
# User rented a book

User {{ $user->name }} has rented a book: {{ $book->title }}.

<x-mail::button :url="$booksUrl">
Books List
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
