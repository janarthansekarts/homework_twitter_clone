    @forelse ($tweets as $tweet)

    @php
        $profile_picture = $tweet->user->profile_picture;
    @endphp
        <li>
            {{-- {{ dump($tweet->user->profile_picture); }} --}}
        @if ($tweet->user->profile_picture != null)
        <a href="{{ route('follower-profile', ['user' => $tweet->user->id]) }}">
        <img src='{{ asset("storage/$profile_picture") }}' alt="" class="tweet-profile-thumbnail" />

        </a>
            
        @else
        <img src="assets/avatars/1.png" alt="" class="tweet-profile-thumbnail" />

        @endif
        <div class="tweet-content-wrap">
            <div class="tweet-header">
                <a href="#" class="tweet-display-name">{{ $tweet->user->name }}</a>
                <a href="#" class="tweet-username">{{ str_replace(" ", "_", strtolower($tweet->user->name)) }}</a>
                {{-- <a href="#" class="tweet-time">2h</a> --}}
            </div>
            <p class="tweet-text">
                {{ $tweet->tweet }}
            </p>
            @if ($tweet->media != '' && !str_contains($tweet->media,'assets'))
            @php
                echo "not str";
            @endphp
                <img src='{{ asset("storage/$tweet->media") }}' alt="" class="tweet-photo" />
            @elseif($tweet->media != '' && str_contains($tweet->media,'assets'))
                    <img src='{{ $tweet->media }}' alt="" class="tweet-photo" />    
            @else
            <img src='' alt="" class="tweet-photo" />    
            @endif
            <ul class="tweet-action-buttons">
                <li>
                    <a href="#">
                        <i class="fa fa-reply"></i>
                        <span class="like-count">{{ $tweet->likes }}</span>
                        likes
                    </a>

                    {{-- <button class="like-button" data-tweet-id="{{ $tweet->id }}">Like</button> --}}

                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-retweet"></i>
                        <span>{{ count($tweet->comments) }}</span>
                        comments
                    </a>
                </li>
                @auth
                <form action="{{ route('add-comment', $tweet->id) }}" method="post">
                    @csrf
                    <input type="text" name="comment" placeholder="Add a comment...">
                    <button type="submit">Comment</button>
                </form>
                @endauth
                

                
                {{-- <li>
                    <a href="#">
                        <i class="fa fa-star"></i>
                        <span></span>
                        like
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-ellipsis-h"></i>
                    </a>
                </li> --}}
            </ul>
        </div>
        <div class="clear"></div>
        <div class="comments-section">
            <h4>Comments</h4>
            <ul class="comments-list" id="comments-list-{{ $tweet->id }}">
                @foreach ($tweet->comments as $comment)
                    <li>
                        <div class="user-profile-picture">
                            <img class='profile-picture-small' src="{{ asset("storage/{$comment->user->profile_picture}") }}" alt="Profile Picture">
                        </div>
                        <div class="comment-content">
                            <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                        </div>
                    </li>
                @endforeach
            </ul>
            <button class="load-more-comments" data-tweet-id="{{ $tweet->id }}">Load More Comments</button>
        </div>
    </li>
    @empty
    <p class="text-center mt-4" style="display:none">No Results Found.</p>
@endforelse



        
    
    