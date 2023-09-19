<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Following;
use App\Models\User;

class FollowingController extends Controller
{
    /**
     * Follow function.
     * Authenticated users can follow a user.
     */
    public function follow(Request $request, String $usertoFollow){
        if(Auth::check()){
            $authUser = Auth::user();
            if(User::where('username', $usertoFollow)->exists()){
                Following::create([
                    'username' => $authUser->username, 
                    'following_user' => $usertoFollow]);

                $following = 'true';
                return $following;
            } else{
                //User does not exist!
                $errorCode = 1001;
                return view('/errors', ['errorCode' => $errorCode]);
            }
        } else{
            //User not logged in!
            $errorCode = 401;
            return view('/errors', ['errorCode' => $errorCode]);
        }
    }

    /**
     * Unfollow function
     * Authenticated user can unfollow a user.
     * */
    public function unfollow(Request $request, String $usertoUnfollow){
        if(Auth::check()){

            $authUser = Auth::user();
            if(User::where('username', $usertoUnfollow)->exists()){
                Following::where('username', $authUser->username)->where('following_user', $usertoUnfollow)->delete();
                
                $following = 'false';
                return $following;
            } else{
                //User does not exist!
                $errorCode = 1001;
                return view('/errors', ['errorCode' => $errorCode]);
            }
        } else{
            //User not logged in!
            $errorCode = 401;
            return view('/errors', ['errorCode' => $errorCode]);
        }
    }

    /**
     * FollowerList Function.
     * Displays a list of followers for an existing user.
     */
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
                $total = 0;
                return view('followers', ['user' => $username, 'total' => $total]);
            }
        } else{
            //User not found
            $errorCode = 1001;
            return view('/errors', ['errorCode' => $errorCode]);
        }
    }

    /**
     * FollowingList Function.
     * Displays a list of existing users that the selected user if following.
     */
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
                $total = 0;
                return view('followings', ['user' => $username, 'total' => $total]);
            }
        } else{
            //User not found
            $errorCode = 1001;
            return view('/errors', ['errorCode' => $errorCode]);
        }
    }
}
