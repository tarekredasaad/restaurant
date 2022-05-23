<?php

use App\Http\Controllers;
// use App\Http\Controllers;

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

Route::get('admn', function () {
    return view('adminhome');
});

Route::get('/','App\Http\Controllers\HomeController@index');

Route::get('redirects','App\Http\Controllers\HomeController@redirects');

Route::get('users','App\Http\Controllers\AdminController@users');

Route::get('deleteuser/{id}','App\Http\Controllers\AdminController@deleteuser');

Route::get('food','App\Http\Controllers\AdminController@food');

Route::get('controlfood','App\Http\Controllers\AdminController@controlfood');

Route::get('deletefood/{id}','App\Http\Controllers\AdminController@deletefood');

Route::get('updateview/{id}','App\Http\Controllers\AdminController@updateview');

Route::post('food','App\Http\Controllers\AdminController@store')->name('admin.food');

Route::post('admin.update/{id}','App\Http\Controllers\AdminController@updatefood')->name('update');

Route::post('reservation','App\Http\Controllers\HomeController@reservation')->name('reservation');

Route::get('reservation','App\Http\Controllers\AdminController@reservation');

Route::get('deletereservation/{id}','App\Http\Controllers\AdminController@deletereservation');

Route::get('foodchef','App\Http\Controllers\AdminController@foodchef');

Route::post('chefs','App\Http\Controllers\AdminController@chefs')->name('chefs');

Route::get('controlchef','App\Http\Controllers\AdminController@controlchef');

Route::get('deletechef/{id}','App\Http\Controllers\AdminController@deletechef');

Route::get('updatechef/{id}','App\Http\Controllers\AdminController@updatechefview');

Route::post('/updatechef/{id}','App\Http\Controllers\AdminController@updatechef')->name('/updatechef/{id}');

Route::post('/addcard/{id}','App\Http\Controllers\HomeController@addcard')->name('/addcard/{id}');

Route::get('/showcard/{id}','App\Http\Controllers\HomeController@showcard');

Route::get('/remove/{id}','App\Http\Controllers\HomeController@remove');

Route::post('/orderconfirm','App\Http\Controllers\HomeController@orderconfirm')->name('/orderconfirm');

Route::get('orders','App\Http\Controllers\AdminController@orders');

Route::get('/search','App\Http\Controllers\AdminController@search');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
