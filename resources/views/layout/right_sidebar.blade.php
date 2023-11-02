<div class="right-sidebar">
    <div class="who-to-follow top-level-panel">
        <ul class="who-to-follow-header">
            <li>
                <h1>Who to follow</h1>
            </li>
        </ul>

        <ul class="who-to-follow-list">
       

@foreach(auth()->user()->usersNotFollowed()->get() as $user)
    {{-- <p>{{ $user->name }}</p> --}}
    <li>
        @if ($user->profile_picture != "")
        <img src='{{ asset("storage/$user->profile_picture") }}'' alt="" class="tweet-profile-thumbnail" />
            
        @else
        <img src="assets/avatars/2.png" alt="" class="tweet-profile-thumbnail" />
            
        @endif

        <div class="who-to-follow-right-wrap">
            <p class="who-to-follow-line-wrap">
                <a href="#" class="who-to-follow-display-name">{{ $user->name }}</a>
                <a href="#" class="tweet-username">@.{{ str_replace(" ","_",$user->name) }}</a>
            </p>

            <div class="clear"></div>

            <a href="{{ route('follower-profile', ['user' => $user->id]) }}" class="follow">
                <i class="fa fa-user-plus"></i>
                Follow
            </a>
        </div>

        <div class="clear"></div>
    </li>
    @endforeach

            
            {{-- <li>
                <img src="assets/avatars/3.png" alt="" class="tweet-profile-thumbnail" />

                <div class="who-to-follow-right-wrap">
                    <p class="who-to-follow-line-wrap">
                        <a href="#" class="who-to-follow-display-name">Carter</a>
                        <a href="#" class="tweet-username">@carter3</a>
                    </p>

                    <div class="clear"></div>

                    <a href="#" class="follow">
                        <i class="fa fa-user-plus"></i>
                        Follow
                    </a>
                </div>

                <div class="clear"></div>
            </li> --}}
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    {{-- <div class="footer top-level-panel">
        <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy</a></li>
        </ul>
    </div> --}}
</div>