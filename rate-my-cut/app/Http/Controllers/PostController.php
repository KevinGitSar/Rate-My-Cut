<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $user = Auth::user();

            return view('/post', ['user' => $user]);
        } else{
            //show error page not logged in
        }
    }
}
