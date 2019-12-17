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
    return view('index');
});

Route::get('/login','MainController@ShowLoginHome')->name('login');

Route::get('/welcome',function() {
    return view('welcome');
});

Route::get('/verify','Auth\VerifyController@ShowVerify')->name('verify');

// Route::post('/verifyresetpassword','Auth\ForgotPasswordController@resetpassword')

Route::get('/forgotpassword','Auth\ForgotPasswordController@ShowResetPasswordForm')->name('showresetpassword');

Route::post('resetpassword','Auth\ForgotPasswordController@resetpassword')->name('resetpassword');

Route::get('/resetpasswordverify','Auth\ForgotPasswordController@Showverifyresetpassword')->name('resetpasswordverify');

Route::post('verifyresetpassword','Auth\ForgotPasswordController@verifycoderesetpassword')->name('verifyresetpassword');

//Route::post('login','Auth\LoginController@validateLogin');
Route::post('login','MainController@checklogin');

//checklogin

//Route::post('signup','Auth\SignupController@checksignup');

Route::get('/signup','Auth\SignupController@ShowSignupForm');

//Route::get('/register','Auth\RegisterController@ShowRegistrationForm')->name('register');

Route::post('signup','Auth\SignupController@signup');

Route::post('active', 'Auth\VerifyController@activate')->name('active');



