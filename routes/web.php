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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'] ,function () {
    // 后台登录路由
    Route::get('login', 'LoginController@login');

    // 登录跳转
    Route::post('doLogin', 'LoginController@doLogin');

    // 使用中间件判断是否登录
    Route::group(['middleware' => 'islogin'] ,function () {
        // 主页路由
        Route::get('index', 'LoginController@index');

        // 后台主页欢迎页路由
        Route::get('welcome', 'LoginController@welcome');

        // 后台退出登录路由
        Route::get('logout', 'LoginController@logout');

        // 用户资源路由
        Route::resource('user', 'UserController');


        // 用户资源路由
        Route::resource('user', 'UserController');
    });
});
