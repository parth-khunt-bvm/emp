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
// Home
Route::match(['get', 'post'], '/', ['as' => 'admin', 'uses' => 'backend\LoginController@admin']);

// testing-mail
Route::match(['get', 'post'], 'testing-mail', ['as' => 'testing-mail', 'uses' => 'backend\LoginController@testingmail']);

//servicedetails
Route::match(['get', 'post'], 'service-details/{id}', ['as' => 'service-details', 'uses' => 'frontend\services\ServicesController@servicedetails']);

Route::match(['get', 'post'], 'salaryslip-download/{id}', ['as' => 'salaryslip-download', 'uses' => 'backend\employee\salaryslip\SalaryslipController@download']);
