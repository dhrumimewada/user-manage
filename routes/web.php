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

Route::get('/employee', 'EmployeeController@index')->name('employee');

Route::get('/addEmp', function () {return view('addemployee');})->name('addEForm');
Route::get('create_emp', 'EmployeeController@CreateEmp')->name('create_emp');
Route::post('post_emp', 'EmployeeController@postEmp')->name('post_emp');
Route::post('put_emp', 'EmployeeController@putEmp')->name('put_emp');
/*Route::post('postE', 'EmployeeController@addNewEmployee')->name('PostEmp');*/
Route::get('view_emp/{id}', 'EmployeeController@viewEmp')->name('view_emp');
//Route::post('deleteproperty', 'HomeController@deleteProperties');*/
