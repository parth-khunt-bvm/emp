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
Route::match(['get', 'post'], '/', ['as' => 'home', 'uses' => 'frontend\home\HomeController@home']);

// services
Route::match(['get', 'post'], 'services', ['as' => 'services', 'uses' => 'frontend\services\ServicesController@services']);

// gallery
Route::match(['get', 'post'], 'portfolio', ['as' => 'portfolio', 'uses' => 'frontend\gallery\GalleryController@gallery']);

// Blog
Route::match(['get', 'post'], 'blog', ['as' => 'blog', 'uses' => 'frontend\blog\BlogController@blog']);
Route::match(['get', 'post'], 'blogs/{id}', ['as' => 'blogs', 'uses' => 'frontend\blog\BlogController@blogs']);
Route::match(['get', 'post'], 'blogdetail/{id}', ['as' => 'blogdetail', 'uses' => 'frontend\blog\BlogController@blogdetail']);

// contact-us
Route::match(['get', 'post'], 'contact-us', ['as' => 'contact-us', 'uses' => 'frontend\contactus\ContactusController@contactus']);

// about-us
Route::match(['get', 'post'], 'about-us', ['as' => 'about-us', 'uses' => 'frontend\aboutus\AboutusController@aboutus']);

// career
Route::match(['get', 'post'], 'career', ['as' => 'career', 'uses' => 'frontend\career\CareerController@career']);
Route::match(['get', 'post'], 'careerdetail/{id}', ['as' => 'careerdetail', 'uses' => 'frontend\career\CareerController@careerdetail']);

// faqs
Route::match(['get', 'post'], 'faqs', ['as' => 'faqs', 'uses' => 'frontend\faqs\FaqsController@faqs']);

// faqs
Route::match(['get', 'post'], 'our-team', ['as' => 'our-team', 'uses' => 'frontend\team\TeamController@team']);

// Admin
Route::match(['get', 'post'], 'admin', ['as' => 'admin', 'uses' => 'backend\LoginController@admin']);

// testing-mail
Route::match(['get', 'post'], 'testing-mail', ['as' => 'testing-mail', 'uses' => 'backend\LoginController@testingmail']);

//servicedetails
Route::match(['get', 'post'], 'service-details/{id}', ['as' => 'service-details', 'uses' => 'frontend\services\ServicesController@servicedetails']);

Route::match(['get', 'post'], 'salaryslip-download/{id}', ['as' => 'salaryslip-download', 'uses' => 'backend\employee\salaryslip\SalaryslipController@download']);
