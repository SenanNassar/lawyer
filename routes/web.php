<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;
use Illuminate\Http\Request;

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
Route::resource('users','UserController');
 Route::get('users/{id}/edit/','UserController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testhome', 'HomeController@home')->name('testhome');

Route::namespace('Admin')->prefix('admin')->middleware('auth')->name('admin.')->group(function(){
Route::resource('/users', "UsersController");

Route::get('/ConsRequest', function(){
    return view('admin.ConsRequest');
})->name('ConsRequest');



});


Route::prefix('admin')->name('admin.')->group(function(){

    Route::resource('/consRequst', 'ConsultativeController' );


});

Route::post('/send-mail',function(Request $rq){


    $details = [
        'title'=> 'رسالة مك مكتب الظفيري للمحاماة',
        'body' => $rq->txtCons
    ];

    \Mail::to('senan.edu@gmail.com')->send(new \App\Mail\SendMail($details));

    return redirect()->route('admin.consRequst.index')->with('status', 'تم ارسال الرسالة بنجاح');

} )->name('SendMail');
