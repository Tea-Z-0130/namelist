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

/*
ジャンケン
http://localhost:8000/janken
にアクセスすると、JankenControllerのbattle関数を実行する
*/
Route::get('/janken', 'JankenController@battle');

/*
手ごとにアドレスを設定して処理する方法
*/
Route::get('/janken/guu', 'JankenController@guu');
Route::get('/janken/choki', 'JankenController@choki');
Route::get('/janken/paa', 'JankenController@paa');


/*
データベース
ユーザー一覧表示
http://localhost:8000/profile
*/
Route::get('/profile', 'ProfileController@test');
Route::post('/profile', 'ProfileController@test');

/*ユーザー新規登録*/
Route::get('/signup', 'SignupController@index');
Route::post('/signup', 'SignupController@add');

/*ユーザー編集*/
Route::get('/edit/{user_ID}', 'EditController@index');
Route::post('/edit', 'EditController@edit');

/*ユーザー削除*/
Route::get('/delete/{user_ID}', 'DeleteController@index');
Route::post('/delete', 'DeleteController@delete');