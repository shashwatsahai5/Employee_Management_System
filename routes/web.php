<?php

use Illuminate\Support\Facades\Route;
use App\Mail\welcomeMail;
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
    return view('mainpage');
});
Route::get('/employee/{id}/edit','EmployeeController@edit');
Route::resource('employee', 'EmployeeController');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sendmail/{id}/new', 'mailController@index');
Route::post('/sendmail/send', 'mailController@send');

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/admin', 'AdminController@index');
});




/*Route::get('/email/{id}',function($id){
    Mail::to('$id'.'@gmail.com')->send(new WelcomeMail());
    return views('home');
});*/


