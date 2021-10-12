<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

// Home
Route::get('/', function () {
    return view('home');
});
Route::get('home', 'HomeController@index')->name('home');

// Post
Route::get('posts', 'PostController@index')->name('post.index');
Route::get('post/show/{post}', 'PostController@show')->name('post.show');
Route::get('post/rate/{post}/{rate}', 'PostController@rate')->name('post.rate')->middleware('auth');


Route::middleware(['auth'])->group(function () {

    // Logout
    Route::get('logout', function () {
        auth()->logout();
        return redirect()->route('home');
    })->name('custom.logout');

});

// Admin
Route::middleware(['auth', 'can.access.admin'])->prefix('admin')->name('backend.')->namespace('Admin\\')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::get('dashboard', 'DashboardController')->name('dashboard');

    // Profile
    Route::get('edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('update', 'ProfileController@update')->name('profile.update');
    Route::get('password', 'ProfileController@passwordChange')->name('password.change');
    Route::post('password', 'ProfileController@passwordUpdate')->name('password.update');

    // Post
    Route::get('posts', 'PostController@index')->name('post.index')->middleware('can:viewAny,App\Models\Post');
    Route::get('post/create', 'PostController@create')->name('post.create')->middleware('can:create,App\Models\Post');
    Route::get('post/edit/{post}', 'PostController@edit')->name('post.edit')->middleware('can:update,post');

});

