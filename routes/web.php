<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('homepage');
});

Route::get('/homepage', [TweetsController::class, 'index'])->name('homepage');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/profile', [UsersController::class, 'edit'])->middleware('auth')->name('profile');
Route::post('/update-profile', [UsersController::class, 'update'])->middleware('auth')->name('update-profile');

Route::get('/delete-profile', [UsersController::class, 'deleteUser'])->name('delete-profile');
Route::post('/confirm-delete-account', [UsersController::class, 'confirmDeleteAccount'])->name('confirm-delete-account');


// Route::post('/like-tweet/{tweet}', [TweetsController::class, 'likeTweet'])->middleware('auth');
Route::post('/add-comment/{tweet}',  [TweetsController::class, 'addComment'])->name('add-comment');

Route::get('/load-more-comments/{tweet}', [TweetsController::class, 'loadMoreComments'])->name('load-more-comments');


Route::post('/follow/{user}', [UsersController::class, 'followUser'])->name('follow-user');
Route::delete('/unfollow/{user}', [UsersController::class, 'unFollowUser'])->name('unfollow-user');
Route::get('/follower-profile/{user}', [UsersController::class, 'followerProfile'])->name('follower-profile');


Route::post('/store-tweet', [TweetsController::class, 'store'])->name('store-tweet');

