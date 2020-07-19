<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testhome', 'HomeController@home')->name('testhome');

Route::namespace('Admin')->prefix('admin')->middleware('auth')->name('admin.')->group(function(){
Route::resource('/users', "UsersController");

Route::get('/ConsRequest', function(){

    return view('admin.ConsRequest');
})->name('ConsRequest');
});

