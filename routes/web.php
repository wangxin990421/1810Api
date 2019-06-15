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
    phpinfo();
    return view('welcome');
});
Route::get('/curl1','Test\TestController@curl1');
Route::get('/curl2','Test\TestController@curl2');
Route::get('/menu/menu','Test\TestController@menu');
Route::get('/upload/upload','Test\TestController@upload');
Route::get('/upload/updo','Test\TestController@updo');
Route::post('/upload/uploadDo','Test\TestController@uploadDo');
Route::post('/curl3','Test\TestController@curl3');
//数据加密测试
Route::get('/test/ceshi','Test\TestController@ceshi');
//数据加密 对称加密
Route::get('/test/encypt1','Test\TestController@encypt1');

//数据加密 非对称数据   私钥加密
Route::get('/test/encypt2','Test\TestController@encypt2');

//数据加密练习
Route::get('/test/lianxi','Test\TestController@lianxi');
Route::post('/test/lianxi2','Test\TestController@lianxi2');

//支付宝 数据加密 练习
Route::get('/test/alipay','Lianxi\LianxiController@alipay');

