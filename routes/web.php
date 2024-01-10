<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/user-login',[UserController::class, 'login']);
Route::post('/user-register',[UserController::class, 'register']);
Route::get('/user-profile',[UserController::class, 'profile'])->middleware('auth:sanctum');
Route::post('/user-profile-update',[UserController::class, 'update'])->middleware('auth:sanctum');
Route::get('/user-logout',[UserController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/user-send-otp',[UserController::class, 'sendOtp']);
Route::post('/verify-otp',[UserController::class, 'verifyOtp']);
Route::post('/user-reset-password',[UserController::class, 'resetPassword'])->middleware('auth:sanctum');




//Categories Web Routes
Route::post('/create-category',[CategoryController::class, 'createCategory'])->middleware('auth:sanctum');
Route::post('/update-category',[CategoryController::class, 'updateCategory'])->middleware('auth:sanctum');
Route::post('/delete-category',[CategoryController::class, 'deleteCategory'])->middleware('auth:sanctum');
Route::post('/category-by-id',[CategoryController::class, 'categoryById'])->middleware('auth:sanctum');
Route::get('/list-category',[CategoryController::class, 'categoryList'])->middleware('auth:sanctum');


Route::view('/login', 'admin.pages.auth.login')->name('login');
Route::view('/register', 'admin.pages.auth.register')->name('register');
Route::view('/sent-otp', 'admin.pages.auth.sent-otp')->name('sent-otp');
Route::view('/verify-otp', 'admin.pages.auth.verify-otp')->name('verify-otp');
Route::view('/reset-password', 'admin.pages.auth.reset-password')->name('reset-password');
Route::view('/profile', 'admin.pages.auth.profile')->name('profile');



//Categories View Routes

Route::view('/category-create', 'admin.pages.category.category-create')->name('categories');
Route::view('/category-list', 'admin.pages.category.category-list')->name('category-list');


Route::view('/dashboard', 'admin.pages.dashboard.main')->name('dashboard');
