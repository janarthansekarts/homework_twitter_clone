@extends('layout.layout')

@section('content')
<ul class="tweet-feed">
    <li class="new-tweet">
        <img src="assets/avatars/1.png" alt="" class="profile-picture-small" />
        <div class="tweet-input-wrap">
            <input type="text" placeholder="What's happening?" />
            <a class="fa fa-camera attach-photo"></a>
        </div>
    </li>

    <li class="view-new-tweets">
        <p>Refresh Tweets</p>
    </li>

    <li class="tweet">
        <img src="assets/avatars/1.png" alt="" class="tweet-profile-thumbnail" />
        <div class="tweet-content-wrap">
            <div class="tweet-header">
                <a href="#" class="tweet-display-name">LillyRue</a>
                <a href="#" class="tweet-username">@lilly_rue</a>
                <a href="#" class="tweet-time">20m</a>
            </div>
            <p class="tweet-text">
                Watch <a href="#" class="user-mention">@lorem_ipsum</a> dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor :</br><a href="#" class="external-link">https://google.com/1JOUC81</a>
            </p>
            <ul class="tweet-action-buttons">
                <li>
                    <a href="#">
                        <i class="fa fa-reply"></i>
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-retweet"></i>
                        <span>6</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-star"></i>
                        <span>9</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-ellipsis-h"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </li>

    <li class="tweet">
        <img src="assets/avatars/1.png" alt="" class="tweet-profile-thumbnail" />
        <div class="tweet-content-wrap">
            <div class="tweet-header">
                <a href="#" class="tweet-display-name">LillyRue</a>
                <a href="#" class="tweet-username">@lilly_rue</a>
                <a href="#" class="tweet-time">2h</a>
            </div>
            <p class="tweet-text">
                RT <a href="#" class="user-mention">@perspiciatis</a>: Sed ut unde omnis iste natus error sit <a href="#" class="user-mention">#voluptatem</a> accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi beatae vitae dicta sunt explicabo <a href="#" class="user-mention">@architecto</a>. <a href="#" class="external-link">google.com/1P1INge</a>
            </p>
            <img src="assets/media/tweet-post.jpg" alt="" class="tweet-photo" />
            <ul class="tweet-action-buttons">
                <li>
                    <a href="#">
                        <i class="fa fa-reply"></i>
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-retweet"></i>
                        <span>1,265</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-star"></i>
                        <span>45</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-ellipsis-h"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </li>
</ul>

@endsection