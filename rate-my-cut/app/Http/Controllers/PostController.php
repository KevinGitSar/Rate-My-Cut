<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
//use App\Models\User;
use App\Models\Post;

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
        if(Auth::check()){
            $form = $request->validate([
                'image' => ['required'], //, File::image()->max(2000)
                'description' => ['required'],
                'category' => ['required'],
                'hair_length' => ['required'],
                'hair_type' => ['required'],
                'hair_style' => ['required'],
            ],
            //Custom error messages.
            [
                'image.required' => 'Upload your haircut/hairstyle to show off!',
                // 'image.max' => 'File size must be less than 2mb.',
                'description.required' => 'Describe it however you like!',
                'category.required' => 'Help them find what you have!',
                'hair_length.required' => 'What is the hair length?',
                'hair_type.required' => 'What is your hair type?',
                'hair_style.required' => 'If it is new, name it!'

            ]);

            Post::create([
                'username' => $username,
                'image' => $this->storeImage($request),
                'description' => $form['description'],
                'category' => $form['category'],
                'hair_length' => $form['hair_length'],
                'hair_style' => $form['hair_style'],
                'hair_type' => $form['hair_type']
            ]);

            return redirect('/' . $username);
        }
    }

    private function storeImage($request){
        $newImageName = uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        return $newImageName;
    }

    public function destroy($filename){
        
        $auth = Auth::user();
        if(Post::where('username', $auth->username)->where('image', $filename)->exists()){
            if(File::exists(public_path('images/' . $filename))){
                File::delete(public_path('images/' . $filename));
                Post::where('username', $auth->username)->where('image', $filename)->delete();

                return redirect('/' . $auth->username);
            }
        }
        

    }
}
