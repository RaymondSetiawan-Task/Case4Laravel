<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', 'PageController@formulir');

Route::post('/payment', 'PageController@proses');

Route::get('/payment/process', function () {
    Mail::send(new App\Mail\NewMail());
    return view('payment');
})->name ('sendemail');




