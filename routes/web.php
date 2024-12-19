<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Auth;

// Route đăng xuất
Route::post('logout', function () {
    Auth::logout();
    return redirect()->route('login'); // Chuyển hướng về trang login sau khi logout
})->name('logout');

// Route hiển thị form (có thể là form đăng ký hoặc form khác)
Route::get('/form', function () {
    return view('form');
});

// Route lưu dữ liệu
Route::post('/save-data', [DataController::class, 'store'])->name('save.data');

// Route cho tạo người dùng mới (sign-in)
Route::get('sign-in', [AuthController::class, 'showSignInForm'])->name('sign-in');
Route::post('sign-in', [AuthController::class, 'signIn']);

// Route cho login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Route cho trang chủ (chỉ dành cho người đã đăng nhập)
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route cho UserController (các route quản lý người dùng)
Route::get('/create', [UserController::class, 'create']); // Route để hiển thị form
Route::post('/store', [UserController::class, 'store']); // Route để lưu dữ liệu vào DB
Route::post('/users', [UserController::class, 'store']);
