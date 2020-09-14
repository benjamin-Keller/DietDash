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
Route::group(['middleware' => 'auth'], function() {
    // For Usage, see https://github.com/KieranGateley/awp-2-KieranGateley/blob/master/routes/web.php
    // All routes inside this function will require the user to be logged in
    // Can work for any middleware
});

//Welcome
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::post('/', 'WelcomeController@index')->name('welcome');
Route::get('/about-us', 'WelcomeController@about')->name('landing.about');

Auth::routes();

//Home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/action', 'HomeController@action')->name('home.action');


//Patients
Route::get('/patients', 'PatientController@index')->name('patients.index');
Route::get('/patients/action', 'PatientController@action')->name('patients.action');
Route::get('/patients/create', 'PatientController@create')->name('patients.create');
Route::post('/patients/create', 'PatientController@store')->name('patients.store');
Route::get('/patients/edit/', 'PatientController@edit')->name('patients.edit');
Route::get('/patients/edit/{id}', 'PatientController@edit')->name('patients.edit');
Route::patch('/patients/update/{id}', 'PatientController@update')->name('patients.update');

Route::get('/patients/deleted', 'PatientController@deleted')->name('patients.deleted');
Route::get('/patients/deleted/action', 'PatientController@deletedAction')->name('patients.deletedAction');
Route::get('/patients/delete/{id}', 'PatientController@softDelete')->name('patients.delete');
Route::get('/patients/restore/{id}', 'PatientController@restore')->name('patients.restore');

//Reports
Route::get('/reports', 'ReportController@index')->name('reports.index');
Route::get('/reports/{id}', 'ReportController@show')->name('reports.show');
Route::get('/reports/{id}/display', 'ReportController@display')->name('reports.display');

Route::get('/reports/{id}/export','ReportController@exportPDF')->name('reports.export');
Route::get('/reports/{id}/full','ReportController@exportFullPDF')->name('reports.exportFull');

//Calculator
Route::get('/calculator', 'CalculatorController@index')->name('calculator.index');
Route::post('/calculator/create', 'CalculatorController@store')->name('calculator.store');
Route::get('/reports/{id}', 'ReportController@show')->name('calculator.report');

//Bookings
Route::get('/bookings','BookingController@index')->name('bookings.index');
Route::get('/bookings/today','BookingController@today')->name('bookings.today');
Route::get('/bookings/history','BookingController@history')->name('bookings.history');

Route::post('/bookings','BookingController@addBooking')->name('bookings.add');

//Payments
Route::get('/payments', 'PaymentsController@index')->name('payments.index');
Route::get('/payments/action', 'PaymentsController@action')->name('payments.action');
Route::get('/payments/create', 'PaymentsController@create')->name('payments.create');
Route::post('/payments/create', 'PaymentsController@store')->name('payments.store');
Route::get('/payments/{id}/export','PaymentsController@exportPDF')->name('payments.export');

//Help
Route::get('/help','HelpController@index')->name('help.index');

//Databindings
Route::get('/home', 'BookingController@booking')->name('home');
