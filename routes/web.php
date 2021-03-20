<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//ログイン時に使用
Auth::routes();

Route::get('/', 'IndexController@index')->name('index');
Route::get('/search', 'IndexController@search')->name('search');
//ログインしていないとログインページに飛ぶ
Route::group(['middleware' => ['auth']], function(){
    //投稿画面と処理のルート
    Route::resource('post', PostController::class)->only([
        'create',
        'store'
    ]);
});
//山の詳細ページのルートです
Route::get('show_mountain/{mt}', 'ShowMontainController@showMontain')->name('show_mountain');

// 投稿の詳細画面
Route::get('show/{id}', 'ShowController@show')->name('show');
Route::post('show', 'ShowController@store')->name('store');

