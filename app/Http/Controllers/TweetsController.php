<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Tweet;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Auth;

use App\Models\Comment;

class TweetsController extends Controller
{
    public function show(Tweet $tweet)
    {
        return view('tweets.show', compact('tweet'));
    }

    public function index(Request $request)
    {
        //     $tweets = Tweet::latest()->simplePaginate(5);
        // //     if(request()->has('search')){
        // //         $tweets = $tweets->where('tweet','like', '%' . request()->get('search','') . '%');
        // //     }
        // //     if(request()->has('user_id')){
        // //         $user_id = request()->get('user_id',[]);
        // //         $tweets = $tweets->whereIn('user_id',$user_id);
        // //  }
        // // dd($tweets->nextPageUrl());
        // $next_page_url = $tweets->nextPageUrl();
        //     if(request()->ajax()){
        //         $tweets = Tweet::latest()->simplePaginate(5);
        // // dump($next_page_url);
        //         if(!isset($next_page_url)){
        //             $next_page_url = $tweets->nextPageUrl();

        //         }
        //         // dd($next_page_url);
        //         $resp = view('components.tweet', compact('tweets'))->render();
        //         // dd($tweets);
        //         return Response::json(['view' => $resp, 'nextPageUrl' => $next_page_url]);

        // }
        // return view('homepage',[
        //     'tweets' => $tweets
        // ]);

        $page = $request->input('page', 1);
        $perPage = 2; // Number of tweets to load per page
        $tweets = Tweet::orderBy('created_at', 'desc')
        ->paginate($perPage, ['*'], 'page', $page);
            if(request()->ajax()){
                $resp = view('components.tweet', compact('tweets'))->render();
                //return Response::json(['view' => $resp, 'data'=>$tweets ]);
                return $resp;
            }
        // return response()->json($tweets);
        return view('homepage',[
            'tweets' => $tweets
        ]);
        
    }

    public function create()
    {
        return view('tweets.create');
    }

    public function edit(Tweet $tweet)
{
    return view('tweets.edit', compact('tweet'));
}

    public function store(Request $request)
    {
        $rules = [
            'tweet' => 'required|min:3|max:240',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 

        ];

        $messages = [
            'tweet.required' => "Add a message to tweet!"
        ];

        $validated = $this->validate($request, $rules, $messages);
        if ($request->hasFile('media')) {
            $image = $request->file('media');
            $imagePath = $image->store('medias', 'public');
            $validated['media'] = $imagePath;
    
            // Storage::disk('public')->delete($user->media);
        }
        // dd($validated);
        $input = $validated;

        $input['user_id'] = auth()->id();


        Tweet::create($input);

        return redirect()->route('homepage')->with('success', 'Tweet created successfully !');
    }

    public function destroy(Tweet $tweet)
    {

        $tweet->delete();

        return redirect()->route('dashboard')->with('success', 'Tweet deleted successfully !');
    }



    public function update(Request $request, Tweet $tweet)
    {

        $rules = [
            'tweet' => 'required|min:3|max:240'
        ];

        $messages = [
            'tweet.required'    		=> "Add a message to tweet!"
        ];

        $this->validate($request, $rules, $messages);
        $input = request()->all();
        $tweet->update($input);

        return redirect()->route('tweets.show', $tweet->id)->with('success', "Tweet updated successfully!");
    }

    // public function likeTweet(Request $request, Tweet $tweet)
    //     {
    //         $user = Auth::user();

    //         if ($user->hasLiked($tweet)) {
    //             $user->unlike($tweet);
    //         } else {
    //             $user->like($tweet);
    //         }

    //         return response()->json([
    //             'likeCount' => $tweet->likes,
    //         ]);
    //     }


    public function addComment(Request $request, Tweet $tweet)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string',
        ]);
        $user = Auth::user();

        $comment = new Comment([
            'user_id' => $user->id,
            'comment' => $request->input('comment'),
        ]);

        $tweet->comments()->save($comment);

        return redirect()->back();
    }


    public function loadMoreComments(Request $request, Tweet $tweet)
    {
        // $comments = $tweet->comments()->skip(request('skip'))->take(1)->get();
        // $commentsHtml = view('components.comments', ['comments' => $comments])->render();
        // $hasMoreComments = $comments->count() > 0;

        // return response()->json([
        //     'commentsHtml' => $commentsHtml,
        //     'hasMoreComments' => $hasMoreComments,
        // ]);

        $skip = $request->query('skip', 0);
    $comments = $tweet->comments()->skip($skip)->take(2)->get();
    $commentsHtml = view('components.comments', ['comments' => $comments])->render();
    $hasMoreComments = $comments->count() > 0;

    return response()->json([
        'commentsHtml' => $commentsHtml,
        'hasMoreComments' => $hasMoreComments
    ]);
    }
}
