<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Following;
use App\Models\User;

class FollowingController extends Controller
{
    
    public function follow(Request $request, String $usertoFollow){
        if(Auth::check()){
            $authUser = Auth::user();
            Following::create(['username' => $authUser->username, 'following_user' => $usertoFollow]);

            $following = 'true';
            return $following;
        } else{
            //return error page user not logged in.
        }
    }

    public function unfollow(Request $request, String $usertoUnfollow){
        if(Auth::check()){

            $authUser = Auth::user();
            Following::where('username', $authUser->username)->where('following_user', $usertoUnfollow)->delete();
            
            $following = 'false';
            return $following;
        } else{
            //return error page user not logged in.
        }
    }
}
