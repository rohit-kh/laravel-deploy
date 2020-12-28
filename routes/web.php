<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\EnsureTokenIsValid;

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

Route::get('/', [WelcomeController::class, 'index']);
Route::get('signin', [WelcomeController::class, 'showSigninForm']);
Route::get('signup', [WelcomeController::class, 'showSignupForm']);

Route::middleware([EnsureTokenIsValid::class])->group(function () {
    Route::get('product', [ProductController::class, 'showProducts']);
    Route::get('product/{productId}', [ProductController::class, 'showProductDetails']);
});
