<?php

use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\LuotXemController;
use App\Http\Controllers\UserController;
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
Route::resource('user', UserController::class)->parameter('user', 'id')->middleware('auth');
Route::resource('danh-muc', DanhmucController::class)->parameter('danh-muc', 'id')->middleware('auth');
Route::resource('bai-viet', BaiVietController::class)->middleware('auth')->parameter('bai-viet', 'id');
Route::resource('luot-xem', LuotXemController::class)->middleware('auth');
Route::get('/', function () {
    return view('admin.index');
})->name('admin.index')->middleware('auth');
