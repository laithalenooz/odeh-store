<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StarterKitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\FrontController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\TermsAndConditionsController;
use App\Http\Controllers\Admin\BrandsController;

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap'])->name('language');

Auth::routes(['verify' => true]);


Route::group(['prefix' => 'admin'], function () {

  // Login routes
  Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');

  // Logout route
  Route::post('/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');

  // dashboard Routes
  Route::middleware('auth:admin')->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('settings', SiteSettingsController::class);
    Route::resource('termsandconditions', TermsAndConditionsController::class);
    Route::resource('brands', BrandsController::class);
  });
});
