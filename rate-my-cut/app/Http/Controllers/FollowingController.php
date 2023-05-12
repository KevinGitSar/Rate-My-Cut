<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowingController extends Controller
{
    public function follow(Request $request, String $usertoFollow){
        return 'Follow';
    }

    public function unfollow(Request $request, String $usertoUnfollow){
        return 'Unfollow';
    }
}
