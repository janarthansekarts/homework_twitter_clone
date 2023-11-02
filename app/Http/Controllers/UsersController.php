<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_user = Auth::user();
		$auth_user_id = $auth_user->id;

        $users = User::query();

        $query = $users
				->where('users.id', '!=',
					$auth_user_id
				)
                ->orderBy('created_at', 'desc');

                
        $perPage = 10; 
        $users_list = $query->paginate($perPage);

        return view('users.index', compact('users_list'));
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {        
        $user = Auth::user();
        
        return view('users.edit', compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            // 'email' => 'required|email|unique:users,email',
            'password' => 'same:confirm-password',
            'name' => 'required|min:3|max:25',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'description'=>'nullable|string'
                ]);

        if(!empty($validated['password']) && $validated['password'] != null){
			$validated['password'] = Hash::make($validated['password']);
		}else{
			$validated['password'] = $user->password;
		}
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imagePath = $image->store('profile_pictures', 'public');
            $validated['profile_picture'] = $imagePath;
    
            // If you want to delete the old profile picture, you can do it here.
            // Storage::disk('public')->delete($user->profile_picture);
        }

        // if(request('profile_picture')){
        //     $validated['profile_picture'] = request('profile_picture')->store('profile_picture');
        // }

        // if ($request->has('image')) {
        //     $imagePath = $request->file('image')->store('profile', 'public');
        //     $validated['image'] = $imagePath;

        //     Storage::disk('public')->delete($user->image ?? '');
        // }
// dd($validated);
        $user->update($validated);
        // return redirect(route('users.show', $user));
        return redirect(route('homepage'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser()
{
    return view('users.delete-user-confirm');
}

public function confirmDeleteAccount()
{
    $user = Auth::user();

    
    $del_user = $user->deleteWithRelatedData();
// dd($del_user);
    // if($del_user){
    // Auth::logout();

    // }
    

    return redirect('/homepage');
}


public function followUser(User $user)
{
    $isFollowing = auth()->user()->follows($user);
    if(!$isFollowing){
        auth()->user()->followings()->attach($user);
    }
    // return redirect('users.followers-profile', compact('user', 'isFollowing'));


    return redirect()->back();


}

public function unFollowUser(User $user)
{
    // $isFollowing = auth()->user()->follows($user);

    auth()->user()->followings()->detach($user);
    $isFollowing = auth()->user()->follows($user);

    // return redirect('users.followers-profile', compact('user', 'isFollowing'));
    return redirect()->back();



}

public function followerProfile(User $user)
{
    // dd($user);
    $isFollowing = auth()->user()->follows($user);
// dd($isFollowing);
    return view('users.followers-profile', compact('user', 'isFollowing'));
}

}
