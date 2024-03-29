<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('update', 'AuthController@update');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::group([
    'middleware' => 'api',
    'namespaces' => 'App\Http\Controllers',
    'prefix' => 'doctor'
], function () {

    Route::get('/', 'DoctorController@index')->name('doctor.index')->middleware('isAdmin');
    Route::get('/get_diseases', 'DoctorController@get_diseases');

    Route::delete('/{doctor}', 'DoctorController@destroy')->name('doctor.destroy');

    Route::match(['put', 'patch'], '/{doctor}', 'DoctorController@update')->name('doctor.update');
    Route::match(['get', 'head'], '/{doctor}', 'DoctorController@show')->name('doctor.show');
    
    Route::post('/', 'DoctorController@store')->name('doctor.store');
    Route::post('/add_receipt', 'DoctorController@add_receipt')->name('doctor.add_receipt');
    Route::post('/add_disease_to_patient', 'DoctorController@add_disease')->name('doctor.add_disease');


    
});


Route::group([
    'middleware' => 'api',
    'namespaces' => 'App\Http\Controllers',
    'prefix' => 'patient'
], function () {
    Route::get('/', 'PatientController@index')->name('patient.index');
    Route::get('/get_patient_doctors', 'PatientController@get_doctors')->name('patient.get_doctors');

    Route::post('/add_doctor_to_patient', 'PatientController@add_doctor')
        ->name('patient.add_doctor')
        ->middleware('isPatient');
    Route::delete('/{patient}', 'PatientController@destroy')->name('patient.destroy');
    Route::match(['put', 'patch'], '/{patient}', 'PatientController@update')->name('patient.update');
    Route::match(['get', 'head'], '/{patient}', 'PatientController@show')->name('patient.show');

    
    Route::post('/', 'PatientController@store')->name('patient.store');
    Route::post('/see_receipts', 'PatientController@see_receipts')->name('patient.see_receipts');
});


Route::group([
    'middleware' => 'api',
    'namespaces' => 'App\Http\Controllers',
    'prefix' => 'chat'
], function () {

    Route::get('/', 'ChatController@index')->name('chats.index');
    Route::match(['get', 'head'], '/{receiver}', 'ChatController@show')->name('chats.show');
    Route::post('/', 'ChatController@store')->name('chats.store');
    Route::post('/refresh', 'ChatController@refresh')->name('chats.refresh');
    Route::post('/change_contact', 'ChatController@change_contact')->name('chats.change_contact');
});
