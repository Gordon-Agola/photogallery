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


Route::get('/', 'App\Http\Controllers\GalleryController@index');
Route::resource('gallery','App\Http\Controllers\GalleryController');
Route::resource('photos','App\Http\Controllers\PhotoController');
Route::get('/gallery/show/{id}', 'App\Http\Controllers\GalleryController@show');