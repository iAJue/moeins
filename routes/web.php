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

Route::get('/', 'IndexController@index');
Route::get('/search','IndexController@search');
Route::get('/{type}/list/{cat?}/{year?}/{area?}/{page?}', 'IndexController@lists');
Route::get('/play/{url}', 'IndexController@play');
Route::post('/api', 'IndexController@api');
Route::get('/{type}/{id}', 'IndexController@detail');
