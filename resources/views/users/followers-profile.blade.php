<!-- resources/views/user-profile.blade.php -->
@extends('layout.layout')
<h1>{{ $user->name }}</h1>
<p>{{ $user->email }}</p>

@if ($isFollowing)
    <form action="{{ route('unfollow-user', $user) }}" method="POST" id="un-follow">
        @csrf
        @method('DELETE')
        <button type="submit">Unfollow</button>
    </form>
@else
    <form action="{{ route('follow-user', $user) }}" method="POST" id="follow">
        @csrf
        <button type="submit">Follow</button>
    </form>
@endif

@section('content')





<!-- Display user's tweets -->
{{-- @foreach ($user->tweets as $tweet) --}}
@php
    $tweets = $user->tweets;
@endphp
<div >
    <ul class="tweet-feed"  id="">
<li class="tweet">
    @include('components.tweet')
</li>

    </ul>
</div>
{{-- @endforeach --}}


{{-- @foreach ($profileUser->tweets as $tweet)
    <!-- Display tweets here -->
@endforeach --}}


<script>






// $(document).ready(function() {
//         $(document).on('submit', 'form', function(e) {
//             e.preventDefault();
//             var form = $(this);
//             var method = form.attr('method');
//             var text = form.find('button').text();
//             $.ajax({
//                 url: form.attr('action'),
//                 method: method,
//                 data: form.serialize(),
//                 success: function(response) {
//                     // Update the UI to show follow/unfollow button
//                     if (method === 'POST') {
//                     // if (text === 'Follow') {
//                         form.find('button').text('Unfollow');
//                         form.attr("method", "delete");
//                     } else {
//                         form.find('button').text('Follow');
//                         form.attr('method', 'POST');
//                     }
//                     window.reload();
//                 }
//             });
//         });
//     });

    
</script>

@endsection