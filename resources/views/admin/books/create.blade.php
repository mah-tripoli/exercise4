@extends('layouts.base')

@section('content')
    <h1 class="h3 mb-6">{{ __('admin.books.add_book') }}</h1>

    <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.books.form')
        <button type="submit" class="btn btn-primary">{{ __('admin.create') }}</button>
    </form>
@endsection