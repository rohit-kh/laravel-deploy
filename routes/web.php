<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogoutController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\RedirectIfUserAuthenticated;

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


Route::middleware([RedirectIfUserAuthenticated::class])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);
    Route::get('signin', [WelcomeController::class, 'showSigninForm']);
    Route::get('signup', [WelcomeController::class, 'showSignupForm']);
});

Route::middleware([EnsureTokenIsValid::class])->group(function () {
    Route::get('products', [ProductController::class, 'showProducts']);
    Route::get('product/create', [ProductController::class, 'showProductFrom']);
    Route::get('product/{productId}', [ProductController::class, 'showProductDetails']);
    Route::get('user/logout', [LogoutController::class, 'logout']);
});
