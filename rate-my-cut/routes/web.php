<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Anyone can see
Route::get('/', function () {
    return view('home');
});

//Edit function - user specific
Route::get('/login', function(){
    return view('login');
});

//Anyone can see
Route::get('/signup', function(){
    return view('signup');
});

//Edit function
Route::get('/profile', function(){
    return view('profile');
});

// On successful, store a user in the database.
Route::post('/signup/user', [UserController::class, 'store']);

// On successful, authenticate and log in the user.
Route::get('/user/authenticate', [UserController::class, 'authenticate']);

Route::get('/user/logout', [UserController::class, 'logout']);

//Edit function - user specific
Route::get('/setting', function(){
    return view('setting');
});

//Edit function - user specific
Route::get('/password', function(){
    return view('password');
});
