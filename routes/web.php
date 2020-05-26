<?php

use Illuminate\Support\Facades\Route;
use function foo\func;
use RealRashid\SweetAlert\Facades\Alert;

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
    Alert::success('Welcome');
    return view('user/logout/dashboard');
});
//Route::post('test','Client\Logged\AppoinmentTest@test');
//login
Route::middleware('auth')->group(function (){
    Route::get('dashboard', 'Client\Logged\DashboardController@index');
    Route::get('appoinment', 'Client\Logged\AppoinmentController@create');
    Route::post('appoinment/store','Client\Logged\AppoinmentController@store');

    Route::post('appoinment/test/save','Client\logged\AppoinmentTest@store');

    Route::post('appoinment/test/delete/{id}', 'Client\Logged\AppoinmentTest@destroy');
    Route::get('requested', 'Client\Logged\RequestedController@index');
    Route::get('profileedit','Client\ClientController@index');
    Route::get('service/{id}','Client\Logged\ServiceController@index');
    Route::post('service/cancel/{id}','Client\Logged\ServiceController@cancel');
    Route::post('client/update/{id}','Client\ClientController@update');
});

//login
//logout
Route::get('login','Client\Logout\LoginController@index')->name('login');
Route::post('client/login','Client\Logout\LoginController@login');

Route::get('home', 'Client\Logged\DashboardController@logout');
Route::post('home', 'Client\Logged\DashboardController@logout');

    Route::get('client/register','Client\ClientController@create');
Route::post('client/store','Client\ClientController@store');
//logout
Route::get('aboutus', 'AboutusController@index');
Route::get('available/tests', 'AboutusController@available');
Route::get('available/test', 'AboutusController@availablelogged');
    Route::get('logout/aboutus','AboutusController@indexl');
Route::get('contractus', 'ContractusController@index');
    Route::get('logout/contractus', 'ContractusController@indexl');
Route::get('healthtips', 'HealthtipsController@index');
    Route::get('logout/healthtips', 'HealthtipsController@indexl');

//MTP
Route::get('mtp','Mtp\LoginController@index');
Route::post('mtp/login','Mtp\LoginController@login');

Route::middleware('auth')->group(function (){
    Route::get('mtphome','Mtp\HomeController@index');
    Route::get('clientrequests','Mtp\ClientReqController@index');
    Route::get('clientrequests/pending','Mtp\ClientReqController@pending');
    Route::post('clientrequests/pending/update/{id}','Mtp\ClientReqController@updatepen');
    Route::post('clientrequests/processing/update/{id}','Mtp\ClientReqController@updatepro');
    Route::get('clientrequests/processing','Mtp\ClientReqController@processing');
    Route::get('clientrequests/completed','Mtp\ClientReqController@completed');
    Route::get('service/mtp/pen/{id}','Mtp\ClientReqController@showpen');
    Route::get('service/mtp/pro/{id}','Mtp\ClientReqController@showpro');
    Route::get('service/mtp/com/{id}','Mtp\ClientReqController@showcom');

    Route::get('tests','Mtp\TestController@index');
    Route::get('test/add','Mtp\TestController@create');
    Route::post('test/store','Mtp\TestController@store');
    Route::post('test/destroy/{id}','Mtp\TestController@destroy');
    Route::post('test/edit/{id}','Mtp\TestController@edit');
    Route::post('test/update/{id}','Mtp\TestController@update');
    Route::get('hospitals','Mtp\HospitalController@index');
    Route::get('hospital/add','Mtp\HospitalController@create');
    Route::post('hospital/store','Mtp\HospitalController@store');
    Route::post('hospital/destroy/{id}','Mtp\HospitalController@destroy');
    Route::post('hospital/edit/{id}','Mtp\HospitalController@edit');
    Route::post('hospital/update/{id}','Mtp\HospitalController@update');

    Route::get('hospital/test/{id}','Mtp\HospitalTestController@index');
    Route::get('hospitaltest/add','Mtp\HospitalTestController@create');
    Route::post('hospitaltest/store','Mtp\HospitalTestController@store');
    Route::post('hospitaltest/destroy/{id}','Mtp\HospitalTestController@destroy');
    Route::post('hospitaltest/edit/{id}','Mtp\HospitalTestController@edit');
    Route::post('hospitaltest/update/{id}','Mtp\HospitalTestController@update');
});
//MTP


