<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\PostController;

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
// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [PostController::class, 'home']);

// Show the login page
Route::get('/login', [UserController::class, 'login']);

// Show the signup page
Route::get('/signup', [UserController::class, 'signup']);

// Show the search page
Route::get('/search', [UserController::class, 'search']);

//
Route::get('/search/user/', [UserController::class, 'userSearch']);

// On successful, store a user in the database.
Route::post('/signup/user', [UserController::class, 'store']);

// On successful, authenticate and log in the user.
Route::get('/user/authenticate', [UserController::class, 'authenticate']);

// Log out the user
Route::get('/user/logout', [UserController::class, 'logout']);

// Authenticated user can view their account settings
Route::get('/settings', [UserController::class, 'setting']);

// Authenticated user can view the page to update their own password
Route::get('/password', [UserController::class, 'password']);

// Authenticated user can update their account settings
Route::post('/settings/update', [UserController::class, 'updateUser']);

// Authenticated user can change their password
Route::post('/settings/passwordUpdate', [UserController::class, 'updatePassword']);

// Athenticated user can follow another user
// Need to add check if already follow don't do anything
Route::get('/follow/{username}', [FollowingController::class, 'follow']);

// Authenticated user can unfollow another user
// Need to add check if not following can not unfollow again.
Route::get('/unfollow/{username}', [FollowingController::class, 'unfollow']);

// Display post creation page.
Route::get('/create/post', [PostController::class, 'index']);

// Authenticated user can store a post
Route::post('/create/post/{username}', [PostController::class, 'store']);

// Authenticated user can delete their post
Route::post('/delete/post/{filename}', [PostController::class, 'destroy']);

Route::get('/upload/profile/{username}',[UserController::class, 'uploadProfile']);

// Return a user's profile view.
Route::get('/{username}', [UserController::class, 'profile']);
