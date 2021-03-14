<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');
//投稿画面と処理のルート
Route::resource('post', PostController::class)->only([
    'create',
    'store'
    ]);
//山の詳細ページのルートです
Route::get('show_mountain/{mt}', 'ShowMontainController@showMontain')->name('show_mountain');
// 詳細画面(show)
Route::get('/show', 'ShowController@show');
Route::post('/show', 'ShowController@store');
