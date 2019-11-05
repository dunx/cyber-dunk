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

// Authentication.
Auth::routes(['register' => false]); // Disable registration.
Route::get('/logout', 'Auth\LoginController@logout');  // Easy logout.

// Homepages.
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('admin_home', [
      'page_title' => 'Cyber-Dunk CRM'
    ]);
})->middleware('auth');

// Companies. Must be logged in.
Route::middleware('auth')->group(function(){
  Route::get('admin/companies', 'CompaniesController@index')->name('company.index');
  Route::post('admin/companies', 'CompaniesController@store')->name('company.store');
  Route::get('admin/company/create', 'CompaniesController@create')->name('company.create');
  Route::get('admin/company/{company}', 'CompaniesController@show')->name('company.show');
  Route::get('admin/company/{company}/edit', 'CompaniesController@edit')->name('company.edit');
  Route::put('admin/company/{company}', 'CompaniesController@update')->name('company.update');
  Route::delete('admin/company/{company}', 'CompaniesController@destroy')->name('company.destroy');
  Route::get('admin/company/{company}/delete', 'CompaniesController@confirmDelete')->name('company.confirmDelete');
});

// Employees. Must be logged in.
Route::middleware('auth')->group(function(){
  Route::get('admin/employees', 'EmployeesController@index')->name('employee.index');
  Route::post('admin/employees', 'EmployeesController@store')->name('employee.store');
  Route::get('admin/employee/create', 'EmployeesController@create')->name('employee.create');
  Route::get('admin/employee/{employee}', 'EmployeesController@show')->name('employee.show');
  Route::get('admin/employee/{employee}/edit', 'EmployeesController@edit')->name('employee.edit');
  Route::put('admin/employee/{employee}', 'EmployeesController@update')->name('employee.update');
  Route::delete('admin/employee/{employee}', 'EmployeesController@destroy')->name('employee.destroy');
  Route::get('admin/employee/{employee}/delete', 'EmployeesController@confirmDelete')->name('employee.confirmDelete');
});
