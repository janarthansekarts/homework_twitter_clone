<div class="left-sidebar">

    <div class="user-summary top-level-panel">

        <div class="user-info-wrap">
            <img src="assets/avatars/1.png" alt="" class="profile-picture" />
@php
    $user = auth()->user();
    // dd($user->tweets,$user->has('tweets'), count($user->tweets));
@endphp
            <div class="username-wrap">
                <a href="#" class="display-name">{{ $user->name }}</a>
                <a href="#" class="username">@.{{ str_replace(" ","_",$user->name) }} </a>
            </div>

            <ul class="user-stats">
                <li>
                    <a href="#" class="user-stats-header">Tweets</a>
                    <a href="#" class="user-stats-value">{{ count($user->tweets) }}</a>
                </li>
                <li>
                    <a href="#" class="user-stats-header">Following</a>
                    <a href="#" class="user-stats-value">{{ count($user->followings) }}</a>
                </li>
                <li>
                    <a href="#" class="user-stats-header">Followers</a>
                    <a href="#" class="user-stats-value">{{ count($user->followers) }}</a>
                </li>
            </ul>
        </div>
    </div>

    {{-- <div class="trending top-level-panel">
        <h1>Trends</h1>

        <ul class="trend-list">
            <li class="trend">
                <a href="#" class="trending-hashtag">#php</a>
                <p class="trend-description">Unde omnis iste #php natus error sit</p>
                <p class="subtext">70.2K Tweets about this trend</p>
            </li>

            <li class="trend">
                <a href="#" class="trending-hashtag">#HotCode</a>
                <p class="trend-description">#HotCode consectetur adipiscing elit, sed do eiusmod tempor</p>
                <p class="subtext">10K Tweets about this trend</p>
            </li>

            <li class="trend">
                <a href="#" class="trending-hashtag">#CodeForFun</a>
                <p class="subtext">Just started trending</p>
            </li>
        </ul>
    </div> --}}
</div>