<div class="header">
    <div class="header-content">
        <ul class="global-actions">
            @auth
            <li>
                <a href="{{ route('homepage') }}" class="global-actions-button-content">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Home
                </a>
            </li>

            {{-- <li>
                <a href="{{ route('profile') }}" class="global-actions-button-content">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Profile
                </a>
            </li>             --}}
    
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="global-actions-button-content" type="submit"> Logout </button>
                </form>
            </li>

            {{-- <li>
                <a class="global-actions-button-content">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    Followers
                </a>
            </li>

            <li>
                <a class="global-actions-button-content">
                    <i class="fa fa-comment" aria-hidden="true"></i>
                    Following
                </a>
            </li> --}}
            @endauth            
        </ul>

        @auth
            {{-- <button class="compose-tweet">
                <span class="wrap">
                    <i class="fa fa-paper-plane"></i>
                    Tweet
                </span>
            </button> --}}

            <a href="{{ route('profile') }}" class="global-actions-button-content">
                @php
                $profile_picture = '';
                if(auth()->user()){
                    $profile_picture = auth()->user()->profile_picture;

                }
                // dump(auth()->user()->profile_picture);
                @endphp
                
                @if($profile_picture != '')
                    <img class="profile-picture-small" src="{{ asset("storage/{$profile_picture}") }}" alt="Profile Picture" >
                @else
                    <img src="assets/avatars/1.png" alt="" class="tweet-profile-thumbnail" />
                @endif

            </a>
            

            {{-- <div class="search">
                <input type="text" placeholder="Search Twitter" />
                <span class="fa fa-search"></span>
            </div> --}}

        @endauth

        @guest
        <a href="{{ route('register') }}" class="global-actions-button-content">
            <i class="fa fa-home" aria-hidden="true"></i>
            Register
        </a>

        <a href="{{ route('login') }}" class="global-actions-button-content">
            <i class="fa fa-home" aria-hidden="true"></i>
            Login
        </a>        
            
        @endguest
        

        {{-- <i class="logo fa fa-twitter" aria-hidden="true"></i> --}}
    </div>
</div>