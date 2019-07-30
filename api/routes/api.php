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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });




// Route::group([
//     'middleware' => 'api', 
//     'namespaces' => 'App\Http\Controllers',
//     'prefix' => 'auth'
// ], function() {

//     Route::post('/register', 'AuthController@register')->name('auth.register');

//     Route::post('/login', 'AuthController@login')->name('auth.login');
    
//     Route::post('/logout', 'AuthController@logout')->name('auth.logout');

//     Route::post('/me', 'AuthController@me')->name('auth.me');
    
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


Route::group([
    'middleware' => 'api',
    'namespaces' => 'App\Http\Controllers',
    'prefix' => 'doctor'
], function(){
    Route::post('/', 'DoctorController@store')->name('doctor.store');
    Route::get('/', 'DoctorController@index')->name('doctor.index');
    Route::delete('/{doctor}', 'DoctorController@destroy')->name('doctor.destroy');
    Route::match(['put', 'patch'], '/{doctor}', 'DoctorController@update')->name('doctor.update');
    Route::match(['get', 'head'], '/{doctor}', 'DoctorController@show')->name('doctor.show');
});


Route::group([
    'middleware' => 'api',
    'namespaces' => 'App\Http\Controllers',
    'prefix' => 'patient'
], function(){
    Route::post('/', 'PatientController@store')->name('patient.store');
    Route::get('/', 'PatientController@index')->name('patient.index');
    Route::delete('/{patient}', 'PatientController@destroy')->name('patient.destroy');
    Route::match(['put', 'patch'], '/{patient}', 'PatientController@update')->name('patient.update');
    Route::match(['get', 'head'], '/{patient}', 'PatientController@show')->name('patient.show');
});


Route::group([
    'middleware' => 'api',
    'namespaces' => 'App\Http\Controllers',
    'prefix' => 'chat'
], function(){
    Route::get('/', 'ChatController@index')->name('chats.index');
    Route::match(['get', 'head'], '/{receiver}', 'ChatController@show')->name('chats.show');
    Route::post('/{receiver}', 'ChatController@store')->name('chats.store');
});