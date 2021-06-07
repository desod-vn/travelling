<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Place\PlaceController;
use App\Http\Controllers\User\UserController;




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

        // Người dùng
            // Thêm, sửa, xóa
            Route::resource('/user', UserController::class)
                ->except(['create', 'edit']);
            // Trang cá nhân
            Route::get('/profile', [UserController::class, 'profile'])
                ->name('profile');
            // Ảnh đại diện
            Route::post('/user/avatar/{user}', [UserController::class, 'avatar'])
                ->name('user.avatar');
            // Đổi mật khẩu
            Route::post('user/password/{user}', [UserController::class, 'password'])
                ->name('user.password');
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
    ***Địa danh
    *****
    **********/

        // Tất cả địa danh
        Route::get('/place', [PlaceController::class, 'index']);

        // Một địa danh
        Route::get('/place/{place}', [PlaceController::class, 'show']);

    /**********
    *****
    ***Người dùng
    *****
    **********/


});
