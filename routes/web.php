<?php

use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\MessagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/message', [MessagesController::class, 'index']);

Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit']);
Route::get('/profile/{user}/edit_p_image', [ProfilesController::class, 'edit_p_image']);
Route::get('/profile/{user}/edit_logo', [ProfilesController::class, 'edit_logo']);
Route::patch('/profile/{user}/p_image', [ProfilesController::class, 'update_p_image']);
Route::patch('/profile/{user}/logo', [ProfilesController::class, 'update_logo']);
Route::patch('/profile/{user}', [ProfilesController::class, 'update']);
Route::get('/profile/{user}', [ProfilesController::class, 'index']);

Route::get('/p/create', [PostsController::class, 'create']);
Route::get('/search', [PostsController::class, 'search']);
Route::get('/p/{post}', [PostsController::class, 'show']);
Route::post('/p', [PostsController::class, 'store']);
Route::get('/', [PostsController::class, 'index']);

Route::post('/follow/{user}', [FollowsController::class, 'store']);

Route::get('/email', function(){
    return new NewUserWelcomeMail();
});
