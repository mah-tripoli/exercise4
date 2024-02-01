@extends('layouts.base')

@section('content')
    <h1 class="h3 mb-6">{{ __('admin.books.management') }}</h1>

    {{-- Display success message --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-2">
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary">{{ __('admin.books.add_book') }}</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('admin.books.title') }}</th>
                <th scope="col">{{ __('admin.books.author') }}</th>
                <th scope="col">{{ __('admin.books.publish_year') }}</th>
                <th scope="col">{{ __('admin.books.available') }}</th>
                <th scope="col">{{ __('admin.books.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
            <tr>
                <th scope="row">{{ $book->id }}</th>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publish_year }}</td>
                <td>{{ $book->available_quantity > 0 ? __('admin.yes') : __('admin.no') }}</td>
                <td>
                    <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-primary">{{ __('admin.edit') }}</a>
                    <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ __('admin.delete_confirm') }}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('admin.delete') }}</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">{{ __('admin.books.no_books') }}</td>
            </tr>
            @endforelse

        </tbody>
    </table>

    {{ $books->links() }}
@endsection
