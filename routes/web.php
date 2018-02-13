<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {
    return App\Employee::find(6);
});

Route::get('/employees/bin', 'EmployeeController@bin')->name('employees.bin');
Route::get('/employees/restore/{id}', 'EmployeeController@restore')->name('employees.restore');
Route::get('/employees/kill/{id}', 'EmployeeController@kill')->name('employees.kill');

Route::get('/payroll', 'PayrollController@index')->name('payroll.index');
Route::get('/payroll/{id}', 'PayrollController@edit')->name('payroll.edit');
Route::post('/payroll/update/{id}', 'PayrollController@update')->name('payroll.update');

Route::resource('departments','DepartmentController');
Route::resource('roles','RoleController');
Route::resource('employees','EmployeeController');



