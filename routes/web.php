<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ShopSettingController;
use App\Http\Controllers\Backend\ShopCategoriesController;
use App\Http\Controllers\Auth\LoginController;

//DAShBOARD
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//ShopSetting
Route::get('/backend/cau-hinh', [ShopSettingController::class, 'index'])->name('backend.shop_setting.index');
Route::get('/backend/cau-hinh/add', [ShopSettingController::class, 'create'])->name('backend.shop_setting.create');
Route::get('/backend/cau-hinh/{id}', [ShopSettingController::class, 'edit'])->name('backend.shop_setting.edit');
Route::put('/backend/cau-hinh/update/{id}', [ShopSettingController::class, 'update'])->name('backend.shop_setting.update');
Route::delete('/backend/cau-hinh/{id}', [ShopSettingController::class, 'destroy'])->name('backend.shop_setting.destroy');
Route::post('backend/cau-hinh/store', [ShopSettingController::class, 'store'])->name('backend.shop_setting.store');

//ShopCategoriesController
Route::get('/backend/shop-category', [ShopCategoriesController::class, 'index'])->name('backend.shop_category.index');
Route::get('/backend/shop-category/add', [ShopCategoriesController::class, 'create'])->name('backend.shop_category.create');
Route::get('/backend/shop-category/{id}', [ShopCategoriesController::class, 'edit'])->name('backend.shop_category.edit');
Route::put('/backend/shop-category/update/{id}', [ShopCategoriesController::class, 'update'])->name('backend.shop_category.update');
Route::delete('/backend/shop-category/{id}', [ShopCategoriesController::class, 'destroy'])->name('backend.shop_category.destroy');
Route::post('/backend/shop-category/store', [ShopCategoriesController::class, 'store'])->name('backend.shop_category.store');


//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('auth.login.index');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.login.logout');


// // Route cho trang login, chỉ dành cho người dùng chưa đăng nhập
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [LoginController::class, 'index'])->name('auth.login.index');
//     Route::post('/login', [LoginController::class, 'login'])->name('auth.login.login');
// });

// // Route cho logout, chỉ dành cho người dùng đã đăng nhập
// Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('auth.login.logout');