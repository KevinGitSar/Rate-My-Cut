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

    public function store(Request $request, String $username){
        $form = $request->validate([
            'image' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
            'hair_length' => ['required'],
            'hair_type' => ['required'],
            'hair_style' => ['required'],
        ]);
    }
}
