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
            Following::create([
                'username' => $authUser->username, 
                'following_user' => $usertoFollow]);

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

    public function followerList(String $username){
        if(User::where('username', $username)->exists()){
            if(Following::where('following_user', $username)->exists()){
                // For each follower get follower user information

                // Collect name of all followers
                $listOfFollowers = [];
                $followers = Following::where('following_user', $username)->get();
                
                $total = sizeOf($followers);
                // Store names in an array
                foreach($followers as $follower){
                    array_push($listOfFollowers, $follower->username);
                }
                
                // Store data of followers
                $followerData = [];
                for($index = 0; $index < sizeOf($listOfFollowers); $index++){
                    array_push($followerData, User::where('username', $listOfFollowers[$index])->first());
                }

                return view('followers', ['followerData' => $followerData, 'user' => $username, 'total' => $total]);
            } else{
                // Return User has no followers
            }
        } else{
            // Return Error Page user does not exists.
        }
    }

    public function followingList(String $username){
        if(User::where('username', $username)->exists()){
            if(Following::where('username', $username)->exists()){
               // For each follower get follower user information

                // Collect name of all followers
                $listOfFollowings = [];
                $followings = Following::where('username', $username)->get();
                
                $total = sizeOf($followings);
                // Store names in an array
                foreach($followings as $following){
                    array_push($listOfFollowings, $following->following_user);
                }
                
                // Store data of followers
                $followingData = [];
                for($index = 0; $index < sizeOf($listOfFollowings); $index++){
                    array_push($followingData, User::where('username', $listOfFollowings[$index])->first());
                }

                return view('followings', ['followingData' => $followingData, 'user' => $username, 'total' => $total]);
            } else{
                //Return Error Page This user does not Follow anyone
            }
        } else{
            // Return Error Page user does not exists.
        }
    }
}
