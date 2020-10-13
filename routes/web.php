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
Route::get('/address/{id}/show','AddressController@show');
Route::post('address','AddressController@store');
Route::delete('/address/{id}','AddressController@destroy');
Route::get('/password/{id}/show','passwordController@show');
Route::put('/password/{id}','passwordController@update');

Route::group(['middleware' => 'cors'], function() {
    Route::get('/address/{id}/show','AddressController@show');
    //Route::post(‘/login’, ‘AuthController@login’);
    //Route::post(‘/register’, ‘AuthController@register’);
    });
Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/employee/{id}/edit','adminController@edit');
});




/*Route::get('/email/{id}',function($id){
    Mail::to('$id'.'@gmail.com')->send(new WelcomeMail());
    return views('home');
});*/


