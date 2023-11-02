


<form action="{{ route('store-tweet') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- <input type="text" name="content" placeholder="What's happening?" />
    <button type="submit">Tweet</button> --}}
    <li class="new-tweet">
        @if (auth()->user()->profile_picture)
        <img src='{{ asset("storage/".auth()->user()->profile_picture); }}' alt="" class="profile-picture-small" />

        @else
        <img src="assets/avatars/2.png" alt="" class="profile-picture-small" />
            
        @endif
        <div class="tweet-input-wrap">
            <input type="text" name="tweet" placeholder="What's happening?" />

        </div>
        <div class="">
            <label 
              class=""
              for="media" 
              >Media</label>
              {{-- <input type="f ile" name="media" id="media"> --}}
              <input name="media" class="" type="file">
              {{-- @if (isset($tweet->media))
                <img src="{{ asset("storage/$tweet->media") }}" alt="Your profile picture" width="40"/>
              @endif --}}
              
                @error('media')
              <span class="">{{$message}}</p>
                @enderror
        </div>
    <button type="submit">Tweet</button>

    </li>
</form>