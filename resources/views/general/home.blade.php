@extends('layouts.base')

@section('content')

@auth
{{ __('app.welcome') }}, <strong>{{ Auth::user()->name }}</strong>!
@endauth

@guest
    <div class="alert alert-info">
        If you have an account, <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to access system features.
    </div>
@endguest

@endsection
