<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

class PostController extends Controller
{
    /**
     * Display the home page, filtered or unfiltered.
     */
    public function home(){

        // Filtering needs checkup
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

        $posts = Post::latest()->filter($request)->paginate(6);
        return view('home', ['posts' => $posts, 'filters' => $filters]);
    }

    /**
     * Display Post Form to users that are logged in.
     * Else show error not logged in.
     */
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

    /**
     * Store post into database on success.
     */
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

    /**
     * Store image in storage with unique id.
     * Return unique id name to store function to be stored in database.
     */
    private function storeImage($request){
        $newImageName = uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        return $newImageName;
    }

    /**
     * Delete post from database.
     * Delete image from storage.
     */
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

    /**
     * Display single post with details including Liked or Not liked.
     */
    public function viewPost(String $username, int $id){
        if(Auth::check()){
            $authUser = Auth::user();
            if(Post::where('username', $username)->where('id', $id)->exists()){
                if(User::where('username', $username)->exists()){
                    $user = User::where('username', $username)->get();
    
                    $previous = Post::where('username', $username)->where('id', '<', $id)->max('id');
    
                    $current = Post::where('username', $username)->where('id', $id)->get();
        
                    $next = Post::where('username', $username)->where('id', '>', $id)->min('id');
        
                    $like = 'false';

                    if(Like::where('username', $authUser->username)->where('post_id', $id)->exists()){
                        $like = 'true';
                    }

                    $link = NULL;
                    if($current[0]->location_address != 'N/A'){
                        $string = $current[0]->location_address;
                        $link = 'https://www.google.com/maps/search/?api=1&query=' . str_replace(' ', '+', $string);
                    }

                    return view('/singlepost', ['user' => $user,'previous' => $previous, 'current' => $current, 'next' => $next, 'like' => $like, 'link' => $link]);
                } else{
                    //User not found
                    $errorCode = 1001;
                    return view('/errors', ['errorCode' => $errorCode]);
                }
            } else{
                // Post does not exists --> That post may not be from Earth
                $errorCode = 404;
                return view('/errors', ['errorCode' => $errorCode]);
            }
            
        } else {
            if (Post::where('username', $username)->where('id', $id)->exists()){
                if(User::where('username', $username)->exists()){
                    $user = User::where('username', $username)->get();
    
                    $previous = Post::where('username', $username)->where('id', '<', $id)->max('id');
    
                    $current = Post::where('username', $username)->where('id', $id)->get();
        
                    $next = Post::where('username', $username)->where('id', '>', $id)->min('id');

                    $link = NULL;
                    if($current[0]->location_address != 'N/A'){
                        $string = $current[0]->location_address;
                        $link = 'https://www.google.com/maps/search/?api=1&query=' . str_replace(' ', '+', $string);
                    }
        
                    return view('/singlepost', ['user' => $user,'previous' => $previous, 'current' => $current, 'next' => $next, 'link' => $link]);
                    
                } else{
                    //User not found
                    $errorCode = 1001;
                    return view('/errors', ['errorCode' => $errorCode]);
                }
            } else{
                // Post does not exists --> That post may not be from Earth (joke)
                $errorCode = 404;
                return view('/errors', ['errorCode' => $errorCode]);
            }
        }
    }

    /**
     * Like post and store in database.
     */
    public function likePost(Request $request, int $postID){
        if(Auth::check()){
            $authUser = Auth::user();
            if(Post::where('id', $postID)->exists()){
                Like::create([
                    'username' => $authUser->username, 
                    'post_id' => $postID]);

                $like = 'true';
                return $like;
            } else{
                // Liked Post does not exists
                $errorCode = 404;
                return view('/errors', ['errorCode' => $errorCode]);
            }
        } else{
            //User not logged in!
            $errorCode = 401;
            return view('/errors', ['errorCode' => $errorCode]);
        }
    }

    /**
     * Deletes liked post (post becomes unliked by the user).
     */
    public function unlikePost(Request $request, int $postID){
        if(Auth::check()){
            $authUser = Auth::user();
            if(Like::where('post_id', $postID)->exists()){
                Like::where('username', $authUser->username)->where('post_id', $postID)->delete();
                
                $like = 'false';
                return $like;
            } else{
                // Liked Post does not exists
                $errorCode = 404;
                return view('/errors', ['errorCode' => $errorCode]);
            }
        } else{
            //User not logged in!
            $errorCode = 401;
            return view('/errors', ['errorCode' => $errorCode]);
        }
    }

    /**
     * Display all liked/favourited post to the user.
     */
    public function favouritePosts(String $username){
        if(Auth::check() && Auth::user()->username == $username){
            $user = Auth::user();
            if(Like::where('username', $username)->exists()){
                $post_ids = [];
                $likes = Like::where('username', $username)->latest()->get();
                foreach ($likes as $like){
                    array_push($post_ids, $like->post_id);
                }

                $posts = Post::whereIn('id', $post_ids)->paginate(3);

                return view('/favourite', ['posts' => $posts, 'user' => $user]);
            }
        } else if(!Auth::check()){
            //User not logged in!
            $errorCode = 401;
            return view('/errors', ['errorCode' => $errorCode]);
        } else {
            //Page can't be found
            $errorCode = 404;
            return view('/errors', ['errorCode' => $errorCode]);
        }
    }

    /**
     * View liked/favourited post in single view.
     */
    public function viewFavouritePost(String $username, int $id){
        if(Auth::check() && Auth::user()->username == $username){
            $authUser = Auth::user();
            if(Like::where('username', $username)->where('post_id', $id)->exists()){
                if(User::where('username', $username)->exists()){
                    $user = User::where('username', $username)->get();
    
                    $current = Post::where('id', $id)->get();
                    
                    $currentLike = Like::where('username', $username)->where('post_id', $id)->get()[0]->id;

                    $previousLike = Like::where('username', $username)->where('id', '>', $currentLike)->min('id');
                    
                    $previous = null;
                    
                    if($previousLike !== null){
                        $previous = Like::where('id', $previousLike)->get()[0]->post_id;
                    }

                    $nextLike = Like::where('username', $username)->where('id', '<', $currentLike)->max('id');

                    $next = null;

                    if($nextLike !== null){
                        $next = Like::where('id', $nextLike)->get()[0]->post_id;
                    }

                    $like = 'false';

                    if(Like::where('username', $authUser->username)->where('post_id', $id)->exists()){
                        $like = 'true';
                    }

                    return view('/favouritesinglepost', ['user' => $user,'previous' => $previous, 'current' => $current, 'next' => $next, 'like' => $like]);
                } else{
                    //User not found
                    $errorCode = 1001;
                    return view('/errors', ['errorCode' => $errorCode]);
                }
            } else{
                //Posts not found
                $errorCode = 404;
                return view('/errors', ['errorCode' => $errorCode]);
            }
        } else if(!Auth::check()){
            //User not logged in!
            $errorCode = 401;
            return view('/errors', ['errorCode' => $errorCode]);
        } else {
            //Page can't be found
            $errorCode = 404;
            return view('/errors', ['errorCode' => $errorCode]);
        }
    }
}
