@extends('layout.layout')

@section('content')
    <div class="">
        <div class="">
            <form class="" action="{{ route('login') }}" method="post">
                @csrf
                <h3 class="">Login</h3>
                <div class="">
                    <label for="email" class="">Email:</label><br>
                    <input type="email" name="email" id="email" class="">
                    @error('email')
                        <span class=""> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <label for="password" class="">Password:</label><br>
                    <input type="password" name="password" id="password" class="">
                    @error('password')
                        <span class=""> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{-- <label for="remember-me" class=""></label><br> --}}
                    <input type="submit" name="submit" class="" value="submit">
                </div>
                <div class="">
                    <a href="/register" class="">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection