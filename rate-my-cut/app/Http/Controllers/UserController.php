<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
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
            'username' => ['required', 'min:6', 'max:30'],
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
