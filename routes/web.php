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

Route::get('/', 'IndexController@index')->name('SiteIndex');

Route::resource('users', 'UserController');
Route::get('users/{id}/edit/', 'UserController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testhome', 'HomeController@home')->name('testhome');

// Route::namespace('Admin')->prefix('admin')->middleware('auth')->name('admin.')->group(function () {
//     Route::resource('/users', "UsersController");
// });


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

  Route::resource('/consRequst', 'ConsultativeController');
  Route::resource('/employee', 'EmployeeController');
  // Route::get('/', function(){
  //   return view('admin.siteInfo');
  // });

  Route::get('/','SiteInfoController@index' )->name('index');
  Route::post('siteinfo', 'SiteInfoController@store')->name('siteinfo.post');
  
});
Route::post('/cons/store', 'ConsultativeController@store')->name('cons.store');


//*********Sending Email */
Route::post('/send-mail', function (Request $rq) {


    $details = [
        'title' => 'رسالة مك مكتب الظفيري للمحاماة',
        'body' => $rq->txtCons
    ];

    \Mail::to($rq->to)->send(new \App\Mail\SendMail($details));

    return redirect()->route('admin.consRequst.index')->with('status', 'تم ارسال الرسالة بنجاح');
})->name('SendMail');


Route::post('/send-contact', function (Request $rq) {


    $details = [
        'title' => $rq->title,
        'body' => $rq->body
    ];

    $s =  Config::get('mail.from.address');

    \Mail::to($s)->send(new \App\Mail\SendMail($details));


 return Response::json($rq);

});


Route::get('ajax-pagination', 'EmployeeController@ajaxPagination')->name('ajax.pagination');
Route::get('test', 'EmployeeController@cleanup');







