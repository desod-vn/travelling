<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Place\PlaceController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Box\BoxController;
use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\Notification\NotificationController;





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

        // Nhóm chát
            // Thêm, xóa
            Route::resource('/box', BoxController::class)
                ->except(['index', 'show', 'create', 'edit', 'update']);
            // Sửa
            Route::post('/box/{box}', [BoxController::class, 'update'])
                ->name('box.update');
            // Tham gia
            Route::post('/box/join/{box}', [BoxController::class, 'join'])
                ->name('box.join');
            // Phê duyệt
            Route::post('/box/consider/{box}', [BoxController::class, 'joinIn'])
                ->name('box.joinIn');
            // Phê duyệt
            Route::post('/message', [MessageController::class, 'store'])
                ->name('box.message');

        // Lịch trình
            // Thêm, sửa, xóa
            Route::resource('/notification', NotificationController::class)
                ->except(['index', 'show', 'create', 'edit']);

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
    ***Địa danh
    *****
    **********/

        // Tất cả nhóm chát
        Route::get('/box', [BoxController::class, 'index']);

        // Một nhóm chát
        Route::get('/box/{box}', [BoxController::class, 'show']);

    /**********
    *****
    ***Người dùng
    *****
    **********/


});
