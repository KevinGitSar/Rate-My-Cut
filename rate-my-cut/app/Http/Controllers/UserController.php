<?php

namespace App\Http\Controllers;

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

    //Revise validation for country, city, postal code.
    //Add 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/' to password for UPPERCASE, LOWERCASE, 1 DIGIT, NON-ALPHANUMERIC, UNICODE CHARACTERS
    public function store(Request $request){
        $form = $request->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'birthdate' => ['required'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'country' => ['required'],
            'city' => ['required', 'min:2'],
            'province' => ['required', 'min:2', 'max:2'],
            'postal_code' => ['required', 'regex:/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVXY][ -]?\d[ABCEGHJKLMNPRSTVXY]\d$/i'],
            'username' => ['required', 'min:6', 'max:30'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        //Re-format birthdate to year month day.
        $form['birthdate'] = Carbon::parse($form['birthdate'])->format('Y-m-d');
        //Encrypt password
        $form['password'] = bcrypt($form['password']);
        
        $user = User::create($form);

        

        return redirect('/login');
    }
}
