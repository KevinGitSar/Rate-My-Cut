<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Post;

class PostController extends Controller
{
    public function home(){
        $filters = ['category1' => false,'category2' => false,'category3' => false,'category4' => false,
        'length1' => false,'length2' => false,'length3' => false,'length4' => false,'length5' => false,'length6' => false,'length7' => false,'length8' => false,'length9' => false,
        'type1' => false,'type2' => false,'type3' => false,'type4' => false,'style' => ''];

        $request = request(['category1','category2','category3','category4',
        'length1','length2','length3','length4','length5','length6','length7','length8','length9',
        'type1','type2','type3','type4','style']);

        if(sizeOf($request) > 0 ){
            foreach($request as $key => $value){
                if($key == 'style'){
                    $filters[$key] = $value;
                } else{
                    $filters[$key] = true;
                }
            }
        }

        $posts = Post::latest()->filter($request)->get();
        return view('home', ['posts' => $posts, 'filters' => $filters]);
    }
    //
    public function index(){
        if(Auth::check()){
            $user = Auth::user();

            return view('/post', ['user' => $user]);
        } else{
            // User Not Logged In!
            $errorCode = 401;
            return view('/errors', ['errorCode' => $errorCode]);
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

            $locationName = $request['location_name'];
            $locationAddress = $request['location_address'];
            
            if($locationName === 'undefined' || $locationName === null || $locationName === ''){
                $locationName = 'N/A';
            }

            if($locationAddress === 'undefined' || $locationAddress === null || $locationAddress === ''){
                $locationAddress = 'N/A';
            }

            $form['location_name'] = $locationName;
            $form['location_address'] = $locationAddress;

            Post::create([
                'username' => $username,
                'image' => $this->storeImage($request),
                'description' => $form['description'],
                'category' => $form['category'],
                'hair_length' => $form['hair_length'],
                'hair_style' => $form['hair_style'],
                'hair_type' => $form['hair_type'],
                'location_name' => $form['location_name'],
                'location_address' => $form['location_address'],
            ]);

            return redirect('/' . $username);
        } else{
            // User Not Logged In!
            $errorCode = 401;
            return view('/errors', ['errorCode' => $errorCode]);
        }
    }

    private function storeImage($request){
        $newImageName = uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        return $newImageName;
    }

    public function destroy($filename){
        if(Auth::check()){
            $auth = Auth::user();
            if(Post::where('username', $auth->username)->where('image', $filename)->exists()){
                if(File::exists(public_path('images/' . $filename))){
                    File::delete(public_path('images/' . $filename));
                    Post::where('username', $auth->username)->where('image', $filename)->delete();

                    return redirect('/' . $auth->username);
                }
            }
        }else{
            // User Not Logged In!
            $errorCode = 401;
            return view('/errors', ['errorCode' => $errorCode]);
        }
    }
}
