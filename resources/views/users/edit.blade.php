@extends('layout.layout')

@section('content')
    <div class="">
            <form class="" action="{{ route('update-profile') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <h3 class="">Profile</h3>
                <div class="">
                    <label 
                      class=""
                      for="profile_picture" 
                      >Profile Picture</label>
                      {{-- <input type="f ile" name="profile_picture" id="profile_picture"> --}}
                      <input name="profile_picture" class="" type="file">
                      <img src="{{ asset("storage/$user->profile_picture") }}" alt="Your profile picture" width="40"/>
                    @error('profile_picture')
                      <span class="">{{$message}}</p>
                    @enderror
                </div>
                <div class="">
                    <label for="name" class="">Name:</label><br>
                    <input type="text" name="name" id="name" class="" value="{{$user->name}}"
                    required > 
                    @error('name')
                        <span class=""> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <label for="email" class="">Email:</label><br>
                    <input type="email" name="email" id="email" class="" value="{{$user->email}}"
                    disabled >
                    @error('email')
                        <span class=""> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <label 
                    class=""
                    for="description">Description</label>
                    <textarea name="description" id="description" class="" >{{$user->description}}</textarea>
                    @error('description')
                      <span class="">{{$message}}</p>
                    @enderror
                </div>
                <div class="">
                    <label for="password" class="">Change Password:</label><br>
                    <input type="password" name="password" id="password" class="">
                    @error('password')
                        <span class=""> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <label for="confirm-password" class="">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" id="confirm-password" class="">
                    @error('password_confirmation')
                        <span class=""> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <input type="submit" name="submit" class="" value="submit">
                </div>
               
            </form>
            <a href="{{ route('delete-profile') }}">Delete Account</a>

    </div>
@endsection