<?php

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
//token练习
Route::get('/test/getwxtoken','Test\TestController@getwxtoken');
Route::get('/test/getwxtoken2','Test\TestController@getwxtoken2');
Route::get('/test/getwxtoken3','Test\TestController@getwxtoken3');
//接口
Route::get('/test/apiinit','Test\TestController@apiinit');
//加密
Route::get('/test/encrypt','Test\TestController@encrypt');
//非对称加密
Route::get('/test/no_encrypt','Test\TestController@no_encrypt');
Route::any('/test/no_decrypt','Test\TestController@no_decrypt');
//签名
Route::get('/test/name1','Test\TestController@name1');
//签名加密
Route::get('/test/nam_encrypt','Test\TestController@nam_encrypt');

//H5商城练习
Route::any('index/reg','Index\IndexController@reg');//注册1
Route::any('index/regdo','Index\IndexController@regdo');//注册2
Route::get('index/login','Index\IndexController@login');//登录1
Route::post('index/logindo','Index\IndexController@logindo');//登录2
Route::get('index/index','Index\IndexController@index');//首页
