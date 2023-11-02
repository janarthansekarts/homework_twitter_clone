@foreach ($comments as $comment)
    <li>
        @php
        $profile_picture = $comment->user->profile_picture;
    @endphp
        <div class="user-profile-picture">
            
            {{-- @if ($comment->user_id == Auth::id())
                <button class="edit-comment-btn" data-comment-id="{{ $comment->id }}">Edit</button>
            @endif --}}
            @if($profile_picture != '')
                <img class="profile-picture-small" src="{{ asset("storage/{$profile_picture}") }}" alt="Profile Picture" >
            @else
                <img src="assets/avatars/2.png" alt="" class="tweet-profile-thumbnail" />

            @endif
        </div>
        <div class="comment-content">
            
        <strong>{{ $comment->user->name }}: </strong> {{ $comment->content }}
        </div>
    </li>
@endforeach
