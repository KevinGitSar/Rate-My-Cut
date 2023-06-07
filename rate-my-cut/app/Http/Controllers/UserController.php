<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Following;
use App\Models\Post;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display Home Page.
     */
    public function index(){
        return redirect('/');
    }

    /**
     * Display Login Page.
     * If user is logged in, log them out.
     * And return them to the login view.
     * Else return the login view.
     */
    public function login(Request $request){
        if(Auth::check()){

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return view('/login');

        } else{

            return view('/login');

        }
    }

    /**
     * Display Signup Page.
     * If user is logged in, log them out.
     * And return the sign up view.
     * Else return the sign up view for new users.
     */
    public function signup(Request $request){
        if(Auth::check()){

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return view('/signup');

        } else{

            return view('/signup');
        }
    }


    /**
     * Returns a user's profile page
     */
    public function profile(String $username){
        if(Auth::check()){
            if(User::where('username', $username)->exists()){
                $user = User::where('username', $username)->first();

                //Number of followers that the searched user has.
                $followers = Following::where('following_user', $user->username)->get()->count();
                //Number of follows that the searched user is following.
                $follows = Following::where('username', $user->username)->get()->count();

                //Get Authenticated User
                $auth = Auth::user();

                $userPosts = null;
                if(Post::where('username', $user->username)->exists()){
                    $userPosts = Post::where('username', $user->username)->get();
                }

                //Check if authenticated user is following other user.
                //USER IS FOLLOWING
                if(Following::where('username', $auth->username)->where('following_user', $user->username)->exists()){
                    $following = 'true';
                    return view('/profile', ['user' => $user, 'following' => $following, 'followers' => $followers, 'follows' => $follows, 'posts' => $userPosts]);
                } 
                //USER IS NOT FOLLOWING
                else{
                    $following = 'false';
                    return view('/profile', ['user' => $user, 'following' => $following, 'followers' => $followers, 'follows' => $follows, 'posts' => $userPosts]);
                }
                //return view('/profile', compact('user'));
            } else{
                //User not found
                return view('/');
                //return view('/errorpage');
            }
        } else{
            if(User::where('username', $username)->exists()){
                $user = User::where('username', $username)->first();

                //Number of followers that the searched user has.
                $followers = Following::where('following_user', $user->username)->get()->count();
                //Number of follows that the searched user is following.
                $follows = Following::where('username', $user->username)->get()->count();

                $userPosts = null;
                if(Post::where('username', $user->username)->exists()){
                    $userPosts = Post::where('username', $user->username)->get();
                }

                return view('/profile', ['user' => $user, 'followers' => $followers, 'follows' => $follows, 'posts' => $userPosts]);
            }
        }
    }

    /**
     * Display setting's page for authenticated users only.
     * Or
     * Display Error Page
     */
    public function setting(){
        if(Auth::check()){

            $user = Auth::user();

            return view('/setting', compact('user'));

        } else{

            return redirect('/login');
        }
    }

    /**
     * Display password change page for authenticated users only.
     * Or
     * Display Error Page
     */
    public function password(){
        if(Auth::check()){

            return view('/password');

        } else{

            return redirect('/login');
        }
    }

    /**
     * Account Registration
     * 
     * Validate registration
     * On success store user account and direct to login page.
     * On failure refresh current page with error message and previous user input.
     */
    //Revise validation for country, city, postal code.
    //Add 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/' to password for UPPERCASE, LOWERCASE, 1 DIGIT, NON-ALPHANUMERIC, UNICODE CHARACTERS
    public function store(Request $request){
        $form = $request->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'birthdate' => ['required', 'before:18 years ago'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'country' => ['required'],
            'city' => ['required', 'min:2'],
            'province' => ['required', 'min:2', 'max:2'],
            'postal_code' => ['required', 'regex:/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVXY][ -]?\d[ABCEGHJKLMNPRSTVXY]\d$/i'],
            'username' => ['required', 'min:6', 'max:30', Rule::unique('users','username')],
            'password' => ['required', 'min:8', 'confirmed']
        ],
            //Custom error messages.
            ['birthdate.before' => 'You must be at least 18 years of age.']);

        //Re-format birthdate to year month day.
        $form['birthdate'] = Carbon::parse($form['birthdate'])->format('Y-m-d');
        //Encrypt password
        $form['password'] = bcrypt($form['password']);
        
        $user = User::create($form);

        return redirect('/login');
    }

    //Make usernames unique
    public function updateUser(Request $request){
        if(Auth::check()){
            if($request->input('update') == 'save'){
                $user = Auth::user();
                $form = $request->validate([
                    'first_name' => ['required', 'min:2'],
                    'last_name' => ['required', 'min:2'],
                    'birthdate' => ['required', 'before:18 years ago'],
                    'email' => ['required', 'email', Rule::unique('users','email')->ignore($user->id)],
                    'country' => ['required'],
                    'city' => ['required', 'min:2'],
                    'province' => ['required', 'min:2', 'max:2'],
                    'postal_code' => ['required', 'regex:/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVXY][ -]?\d[ABCEGHJKLMNPRSTVXY]\d$/i'],
                    'username' => ['required', 'min:6', 'max:30', Rule::unique('users','username')->ignore($user->id)],
                    'bio' => ['max:160'],
                ],
                    //Custom error messages.
                    ['birthdate.before' => 'You must be at least 18 years of age.']);
                
                //Re-format birthdate to year month day.
                $form['birthdate'] = Carbon::parse($form['birthdate'])->format('Y-m-d');

                if($request->profile !== null){
                    $user->profile = $this->storeImage($request);
                }
                $user->first_name = $form['first_name'];
                $user->last_name = $form['last_name'];
                $user->birthdate = $form['birthdate'];
                $user->email = $form['email'];
                $user->country = $form['country'];
                $user->city = $form['city'];
                $user->province = $form['province'];
                $user->postal_code = $form['postal_code'];
                $user->username = $form['username'];
                $user->bio = $form['bio'];

                $user->save();

                return redirect('/settings')->with('notification', 'Information Change Successful!');
            } else{
                return view('/password');
            }
        } 
    }

    private function storeImage($request){
        $auth = Auth::user();
        
        if($request->profile !== null){

            if(User::where('username', $auth->username)->where('profile', $auth->profile)->exists()){
                
                if(File::exists(public_path('images/' . $auth->profile))){
                    File::delete(public_path('images/' . $auth->profile));
                }
            }

            $newImageName = uniqid() . '.' . $request->profile->extension();
            $request->profile->move(public_path('images'), $newImageName);
            return $newImageName;
        }
    }

    public function updatePassword(Request $request){
        if(Auth::check()){
            
            $user = Auth::user();
            $form = $request->validate([
                'password_old' =>['required'],
                'password' =>['required', 'min:8', 'confirmed'],
                'password_confirmation' =>['required']
            ]);

            $userPassword = $user->password;

            if(Hash::check($form['password_old'], $userPassword)){
                $user->password = bcrypt($form['password']);

                $user->save();
                return redirect('/settings')->with('notification', 'Password Change Successful!');
            } else{
                return redirect('/settings')->with('notification', 'Password Change Failed!');
            }

        } 
    }

    /**
     * Authenticate the user
     * On success the user is logged in and redirected to the home page.
     */
    public function authenticate(Request $request){
        $form = $request -> validate([
            'username' =>['required'],
            'password' =>['required']
        ]);

        if(auth()->attempt($form)){
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['username' => 'Invalid Username or Password.'])->onlyInput('username');
    }

    /**
     * Show the search page
     * Available to guests and authenticated users
     */
    public function search(){
        return view('search');
    }

    public function userSearch(){
        $users = User::filter(request(['search']))->get();
        return view('/search', ['users' => $users]);
    }

    /**
     * Logout the user.
     * On success the user is logged out and will need to log back in to access their profile.
     */
    public function logout(Request $request): RedirectResponse{
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
