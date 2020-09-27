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
Route::get('/reports/{id}', 'ReportController@index')->name('reports.index');
Route::get('/reports/{id}/display', 'ReportController@display')->name('reports.display');

Route::get('/reports/{id}/export','ReportController@exportPDF')->name('exports.export');
Route::get('/reports/{id}/full','ReportController@exportFullPDF')->name('exports.exportFull');

//Calculator
Route::get('/calculator', 'CalculatorController@index')->name('calculator.index');
Route::post('/calculator/create', 'CalculatorController@store')->name('calculator.store');
Route::get('/reports/{id}', 'ReportController@index')->name('calculator.report');

//Events
Route::get('/events', 'EventController@index')->name('events.index');
Route::get('/events/list', 'EventController@list')->name('events.list');
Route::post('/events/store', 'EventController@store')->name('events.store');
Route::get('/events/history','EventController@history')->name('events.history');

//Statistics
Route::get('/stats','StatsController@index')->name('stats.index');

//Databindings
Route::get('/home', 'BookingController@booking')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
