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

/**
 * タスクダッシュボード表示
 */
Route::get('/','TaskController@index');

/**
 * 新タスク追加
 */
Route::post('/task','TaskController@store');

/**
 * タスク削除
 */
Route::delete('/task/{task}','TaskController@destroy');