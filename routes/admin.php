<?php

use App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin'],function(){
    Route::get('ff',function(){
        return 'hi admin';
    });
});
Route::get('ff',function(){
    return 'hi admin';
});
Route::group(['namespace' => 'Dashboard'],function(){
    
});
