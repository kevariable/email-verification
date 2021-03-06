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

Auth::routes();

Route::get('auth/activate', 'Auth\ActivationController')->name('auth.activate');

Route::get('auth/activate/resend', 'Auth\ResendActivationController@index')->name('auth.activate.resend');
Route::post('auth/activate/resend', 'Auth\ResendActivationController@resendActivation')->name('auth.activate.resend');

Route::get('/home', 'HomeController@index')->name('home');
