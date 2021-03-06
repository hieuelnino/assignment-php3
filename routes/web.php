<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('logout', [LogOutController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('home.cate');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('home.detail');
