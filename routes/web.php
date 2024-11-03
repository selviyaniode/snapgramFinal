<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    HomeController,
    AlbumController,
    PhotoController,
    ProfileController,
};
// redirect root url login
Route::redirect('/','/auth/login');
Route::controller(AuthController::class)->group(function () {

//authentication routes
});
Route::controller(AuthController::class)->group(function () {
    Route::get('auth/login', 'showLoginForm')->name('login')->middleware('guest');
    Route::post('auth/login', 'postLogin')->name('postLogin');
    Route::post('logout', 'logout')->name('logout');
    Route::get('auth/register', 'showRegistrationForm')->name('register.form');
    Route::post('auth/register', 'register')->name('register');
});
//routes that require authenticar
Route::middleware('auth')->group(function ( ) {
    //home route
    Route::get('home',[HomeController::class, 'index'])->name('home');
    //album resoure route
    Route::resource('albums', AlbumController::class);
    //photos routes
    Route::resource('photos', PhotoController::class);

    Route::get('/albums/{album}/photos',[PhotoController::class,'index'])
        ->name('albums.photos');
    Route::post('photos/{photo}/like/', [PhotoController::class, 'like'])
        ->name('photos.like');
    Route::get('/photos/{photo}/comments', [PhotoController::class, 'showComments'])
        ->name('photos.comments');
    Route::post('/photos/{photo}/comments', [PhotoController::class, 'storeComment'])
        ->name('photos.comment.store');

        //profile routes
    Route::get('profile',[ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile',[ProfileController::class, 'update'])->name('profile.update');
});