@extends('layout.layout')

@section('content')
<div >
<ul class="tweet-feed"  id="page_scroll">
    @auth
    @include('components.create_tweet')
    @endauth
    

    <li class="view-new-tweets">
        <a href={{ route("homepage") }}> <p>Refresh Tweets</p> </a>
    </li>
    
    {{-- {{ dd($tweet->comments) }} --}}
    {{-- <div id="tweets-container" > --}}
    <li class="tweet">
        @include('components.tweet')
    </li>
    {{-- </div> --}}
    <div style="display:none">
        {{ $tweets->links() }}
    </div>
    
            


</ul>
</div>
<input type="hidden" id = "current_page" value="1" />
<script>    
    
    $(document).ready(function() {
        $('.load-more-comments').on('click', function() {
            var tweetId = $(this).data('tweet-id');
            var commentList = $('#comments-list-' + tweetId);
            var skip = commentList.find('li').length; // Number of existing comments

            $.ajax({
                url: '/load-more-comments/' + tweetId + '?skip=' + skip,
                method: 'GET',
                success: function(response) {
                    commentList.append(response.commentsHtml);
                    if (!response.hasMoreComments) {
                        $('.load-more-comments[data-tweet-id="' + tweetId + '"]').hide();
                    }
                }
            });
        });
    });




    
</script>
<script type="text/javascript">



    $(document).ready(function () {

      
      
         let nextPageUrl = '{{ $tweets->nextPageUrl() }}';
         console.log(nextPageUrl);
         $(window).scroll(function(){
            console.log("okk")
            if($(window).scrollTop() + $(window).height() >= $(document).height() - 100){
              
                next_page= parseInt($('#current_page').val())+1;
                // console.log("inside");
                // console.log("comp: "+ $(window).scrollTop());
                // console.log("win height:" + $(window).height());
                // console.log("height: "+ $(document).height());
        console.log("inside nextPageUrl: "+nextPageUrl);
        
                 if(next_page){
                     ajaxLoad(next_page);
                 }
             }
         });
         function ajaxLoad(next_page){
             $.ajax({
                url: "{{ route('homepage') }}?page="+next_page,
                type: "get",
                async: false,
                beforeSend: function (){
                    nextPageUrl = '';
                },
                success: function (data){
                    $('#current_page').val(next_page);
                    console.log(data);
                    // if(data.data.next_page_url){
                    //     nextPageUrl = data.data.next_page_url+1;
                    // }else{
                    //     nextPageUrl = data.data.last_page_url;
                    // }
                    $("#page_scroll").append(data);
                },
                error: function(xhr, status, error){
                    console.log("Error loading the response: "+ error);
                }
             })
         }
         
 
    });

    


    // $(document).ready(function() {
    //     let page = 1;
    //     let url = '/homepage?page=' + page;

    //     $(window).scroll(function() {
    //         if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
    //             page++;
    //             url = '/homepage?page=' + page;

    //             $.get(url, function(data) {
    //                 if (data.length > 0) {
    //                     $('#tweets-container').append(data);
    //                 }
    //             });
    //         }
    //     });
    // });

    
    // $(document).ready(function() {
    //     let page = 1;
    //     let isLoading = false;

    //     function loadMoreTweets() {
    //         console.log("nois loading: "+ isLoading);
    //         if (!isLoading) {
    //             isLoading = true;
    //             console.log("page: "+ page);
    //             $.get('/homepage', { page: page }, function(data) {
    //                 console.log(data);
    //                 if (data.view.length > 0) {
    //                     // data.data.forEach(tweet => {
    //                     //     $('#tweet-container').append('<div>' + tweet.tweet + '</div>');
    //                     // });
    //                     $("#tweets-container").append(data.view);
    //                     page++;
    //                     isLoading = false;
    //                 }
    //             });
    //         }
    //     }

    //     loadMoreTweets(); // Load initial tweets

    //     $(window).scroll(function() {
    //         console.log("scrool");
    //         if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
    //             console.log("inside");
    //             loadMoreTweets();
    //         }
    //     });
    // });
</script>

 






@endsection

