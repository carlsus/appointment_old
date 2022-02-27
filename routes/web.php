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

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/login/appointee', 'Auth\LoginController@showAppointeeLoginForm')->name('login.appointee');
Route::get('/login/teacher', 'Auth\LoginController@showTeacherLoginForm')->name('login.teacher');
Route::get('/register/appointee', 'Auth\RegisterController@showAppointeeRegisterForm')->name('register.appointee');

Route::post('/login/appointee', 'Auth\LoginController@appointeeLogin');
Route::post('/register/appointee', 'Auth\RegisterController@createAppointee')->name('register.appointee');
Route::post('/login/teacher', 'Auth\LoginController@teacherLogin');


Route::view('/home', 'home')->middleware('auth');
Route::resource('departments', 'DepartmentController');
Route::get('allDepartments', 'DepartmentController@allDepartments' )->name('allDepartments');
Route::post('departments/update', 'DepartmentController@update')->name('departments.update');
Route::get('getDepartment', 'DepartmentController@getDepartment' )->name('getDepartment');

Route::resource('teachers', 'TeacherController');
Route::get('allTeachers', 'TeacherController@allTeachers' )->name('allTeachers');
Route::post('teachers/update', 'TeacherController@update')->name('teachers.update');

Route::resource('users', 'UserController');
Route::get('allUsers', 'UserController@allUsers' )->name('allUsers');
Route::post('users/update', 'UserController@update')->name('users.update');

Route::resource('qrscan', 'QrScanController');

// Route::resource('appointments', 'AppointmentController');

Route::resource('registration', 'RegistrationController');
Route::resource('appointees', 'AppointeeController');
Route::group(['middleware' => ['auth:appointee,teacher']], function() {
    Route::resource('appointments', 'AppointmentController');
  });
Route::group(['middleware' => 'auth:appointee'], function () {

    Route::view('/appointee', 'appointee');
    Route::get('myappointment', 'AppointmentController@myappointment' )->name('myappointment');
    Route::post('appointments/update', 'AppointmentController@update')->name('appointments.update');

});

Route::group(['middleware' => 'auth:teacher'], function () {

    Route::view('/teacher', 'teacher');
    Route::get('teacherappointment', 'AppointmentController@teacherappointment' )->name('teacherappointment');
    Route::get('showappointment', 'AppointmentController@showappointment' )->name('showappointment');
    Route::post('appointments/show/{id}', 'AppointmentController@show' );
    Route::patch('appointments/updateStatus/{id}', 'AppointmentController@updateStatus');
});
