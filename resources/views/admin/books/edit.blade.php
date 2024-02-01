@extends('layouts.base')

@section('content')
    <h1 class="h3 mb-6">{{ __('admin.books.edit_book') }}: {{ $book->title }}</h1>

    <form method="POST" action="{{ route('admin.books.update', $book) }}') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.books.form')
        <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
    </form>
@endsection