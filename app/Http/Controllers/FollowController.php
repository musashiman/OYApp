<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Following;

class FollowController extends Controller
{
    //
    
    public function show_followers(User $user)
    {
        return view("follows/follow")->with(["users"=>$user->get()]);
    }
}
