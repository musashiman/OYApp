<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Following;

class FollowController extends Controller
{
    //
    
    public function follow(Request $request)
    {
        $user_id = auth()->user()->id;//フォローをするユーザーのID
        $followed_id = $request->input("following_user_id");//フォローされるユーザーのID
        $followed_user = User::find($followed_id);
        
        if(!$followed_user)
        {
            abort(404);
        }
        
        $followed_user->followers()->attach($followed_id);
        
        return redirect()->back();
    }
    
    public function unfollow(Request $request)
    {
        $user_id = auth()->user()->id;//フォローを解除するユーザーのID
        $followed_id = $request->inputt("following_user_id");
        $followed_user = User::find($followed_id);
        
        if(!$followed_user)
        {
            abort(404);
        }
        
        $followed_user->followers()->detach($user_id);
        
        return redirect()->back();
        
    }
    
    public function user_followers($id)
    {
        $user = User::findOrFail($id);
        $followers = $user->followers;
        
        return view("follows/index",compact("followers"));
    }
}
