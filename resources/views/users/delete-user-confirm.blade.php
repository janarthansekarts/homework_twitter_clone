@extends('layout.layout')

@section('content')
    <div class="">
        <h3 class="">Delete Your Account</h3>
        <p class="">Are you sure you want to delete your account? This action cannot be undone.</p>
        <form method="post" action="{{ route('confirm-delete-account') }}">
            @csrf
            <button type="submit" class="">Delete My Account</button>
        </form>
    </div>
@endsection
