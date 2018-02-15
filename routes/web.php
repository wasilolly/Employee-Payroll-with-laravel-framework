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


Route::get('/employees/bin', 'EmployeeController@bin')->name('employees.bin');
Route::get('/employees/restore/{id}', 'EmployeeController@restore')->name('employees.restore');
Route::get('/employees/kill/{id}', 'EmployeeController@kill')->name('employees.kill');


Route::get('/employee/payroll/{id}', 'PayrollController@payrollIndex')->name('payrolls.show');
Route::get('/payrolls/create/{id}', 'PayrollController@create')->name('payrolls.create');
Route::post('/payrolls/{id}', 'PayrollController@store')->name('payrolls.store');
Route::get('/employee/payroll/{id}/edit', 'PayrollController@edit')->name('payrolls.edit');
Route::patch('/payrolls/update/{id}', 'PayrollController@update')->name('payrolls.update');

Route::delete('/payrolls/delete/{id}', 'PayrollController@destroy')->name('payrolls.destroy');
Route::get('/payroll/bin', 'PayrollController@bin')->name('payrolls.bin');
Route::get('/payroll/restore/{id}', 'PayrollController@restore')->name('payrolls.restore');
Route::get('/payroll/kill/{id}', 'PayrollController@kill')->name('payrolls.kill');

Route::get('/payrolls/download/{id}','DownloadController@pdfDownload')->name('payrolls.pdf');
Route::get('/payroll/single/{id}','DownloadController@singlePayroll')->name('singlepayroll.pdf');

Route::resources([
	'departments' => 'DepartmentController',
	'roles' => 'RoleController',
	'employees' => 'EmployeeController',
]);




