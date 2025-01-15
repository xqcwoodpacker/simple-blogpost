<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\LogVisitorGeolocation;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('404');
});

Route::view('/about', 'about')->name('about');

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/post/{post}', [PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function () {
    Route::controller(PostController::class)->group(function () {

        Route::patch('/update/{post}', 'update')->name('updatepost');
        Route::delete('/deletepost/{post}', 'destroy')->name('deletepost');
        Route::get('/addpost', 'create')->name('addpost');
        Route::post('/storepost', 'store')->name('storepost');
        Route::get('/editpost/{post}', 'edit')->name('editpost');
    });

    Route::controller(CommentController::class)->group(function () {

        Route::get('/addcomment', 'create')->name('addcomment');
        Route::delete('/deletecomment/{comment}', 'destroy')->name('deletecomment');
        Route::get('/editcomment/{comment}', 'edit')->name('editcomment');
        Route::patch('/updatecomment/{comment}', 'update')->name('updatecomment');
        Route::post('/storecomment/{id}', 'store')->name('storecomment');
    });

    Route::controller(UserController::class)->group(function () {
        Route::patch('/changepassword', 'changepassword')->name('changepassword');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/logout', 'logout')->name('logout');
        Route::delete('/deleteuser', 'destroy')->name('deleteuser');
    });
});

Route::middleware('guest')->group(function () {
    Route::view('/login', 'login')->name('login');
    Route::view('/register', 'register')->name('register');
    Route::post('/loginuser', [UserController::class, 'login'])->name('loginuser');
    Route::post('/registeruser', [UserController::class, 'registeruser'])->name('registeruser');
});

Route::middleware(isAdmin::class)->prefix('admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'dashboard')->name('dashboard');
        Route::get('/profile', 'profile')->name('admin.profile');
        Route::get('/users', 'getUsers')->name('admin.users');
        Route::get('/editprofile', 'editProfile')->name('admin.editprofile');
        Route::patch('/updateprofile', 'updateProfile')->name('admin.updateprofile');
        Route::patch('/updatepassword', action: 'updatePassword')->name('admin.updatepassword');
        Route::get('/edituser/{user}', 'editUser')->name('admin.edituser');
        Route::patch('/updateuser/{user}', 'updateUser')->name('admin.updateuser');
        Route::delete('/deleteuser/{user}', 'deleteUser')->name('admin.deleteuser');

        Route::get('/posts', 'getPosts')->name('admin.posts');
        Route::get('/editpost/{post}', 'editPost')->name('admin.editpost');
        Route::patch('/updatepost/{post}', 'updatePost')->name('admin.updatepost');
        Route::delete('/deletepost/{post}', 'deletePost')->name('admin.deletepost');

        Route::get('/comments', 'getComments')->name('admin.comments');
        Route::get('/editcomment/{comment}', 'editComment')->name('admin.editcomment');
        Route::patch('/updatecomment/{comment}', 'updateComment')->name('admin.updatecomment');
        Route::delete('/deletecomment/{comment}', 'deleteComment')->name('admin.deletecomment');

        Route::get('/categories', 'getCategories')->name('admin.categories');
        Route::get('/addcategory', 'addCategory')->name('admin.addcategory');
        Route::post('/storecategory', 'storeCategory')->name('admin.storecategory');
        Route::delete('/deletecategory/{category}', 'deleteCategory')->name('admin.deletecategory');

        Route::get('/logs', 'logs')->name('admin.logs');
    });
});

// Route::get('/test',[UserController::class,'test'])->name('test');