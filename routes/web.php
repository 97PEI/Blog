<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => '/admin/'] ,function () {
    // 后台登录路由
    Route::get('login', 'Admin\LoginController@login');

    // 登录跳转
    Route::post('doLogin', 'Admin\LoginController@doLogin');

    // 主页路由
    Route::get('index', 'Admin\LoginController@index');
});
