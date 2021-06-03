<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Place\PlaceController;



Route::group(['middleware' => 'guest'], function() {

    // Đăng ký
    Route::post('/register', [AuthController::class, 'register'])
        ->name('register');

    // Đăng nhập
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login');

});



Route::group(['middleware' => 'auth:api'], function() {

    // Đăng xuất
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    /**********
    *****
    ***QUẢN LÝ
    *****
    **********/
        // Địa danh
            // Thêm, xóa
            Route::resource('/place', PlaceController::class)
                ->except(['index', 'show', 'create', 'edit', 'update']);
            // Sửa
            Route::post('/place/{place}', [PlaceController::class, 'update'])
                ->name('place.update');
    /**********
    *****
    ***BÀI VIẾT
    *****
    **********/

        // Thêm, xóa
        Route::resource('/post', PostController::class)
            ->except(['index', 'show', 'update', 'create', 'edit']);
        
        // Sửa
        Route::post('/post/{post}', [PostController::class, 'update'])
            ->name('post.update');        
});

Route::group([], function() {

    /**********
    *****
    ***CHUYÊN MỤC
    *****
    **********/

        // Tất cả chuyên mục
        Route::get('/place', [PlaceController::class, 'index']);

        // Một chuyên mục
        Route::get('/place/{place}', [PlaceController::class, 'show']);
    
    /**********
    *****
    ***BÀI VIẾT
    *****
    **********/

        // Tất cả bài viết
        Route::get('/post', [PostController::class, 'index']);

        // Một bài viết
        Route::get('/post/{post}', [PostController::class, 'show']);

    
});