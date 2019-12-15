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
    return view('doctor/a');
})->name('test');

Route::get('/record-1', function () {
    return view('welcome');
})->name('record-1');

Route::get('/patient-account', function () {
    return view('patient/account');
});

Route::get('getdata', function(){
    //$data = DB::table('healthrecord')->first();
    return view('patient/home', ['healthrecordid'=>$data]);
   
});

Route::get('/patient-home/{accountid}', function($accountid){
    $name = DB::table('patient')->where('AccountID', $accountid)->value('PatientName');
    $patientid = DB::table('patient')->where('AccountID', $accountid)->value('PatientID');
    $data = DB::table('healthrecord')->where('PatientID', $patientid)->first();
    return view('patient/home', ['patientname'=>$name,'healthrecord'=>$data, 'accountid'=>$accountid]);
})->name('patient-home');

Route::get('/patient-account/{accountid}', 'GetDataPatientController@PatientAccount')->name('patient-account');

Route::get('/patient-profile/{accountid}', 'GetDataPatientController@PatientProfile')->name('patient-profile');

Route::get('/patient-support/{accountid}', 'GetDataPatientController@PatientSupport')->name('patient-support');

Route::get('/patient-setting/{accountid}', 'GetDataPatientController@PatientSetting')->name('patient-setting');

Route::get('/patient-notification/{accountid}', 'GetDataPatientController@PatientNotification')->name('patient-notification');

Route::get('/patient-home/{accountid}', 'GetDataPatientController@PatientSearch')->name('patient-home');

Route::any('/patient-home/{accountid}', 'GetDataPatientController@SearchDoctor')->name('patient-home1');

Route::get('/patient-doctorprofile/{accountid}/{accountdoctorid}', 'GetDataPatientController@DoctorProfile')->name('patient-doctorprofile');

//Doctor route

Route::get('/doctor-account/{accountid}', 'GetDataDoctorController@DoctorAccount')->name('doctor-account');

Route::get('/doctor-profile/{accountid}', 'GetDataDoctorController@DoctorProfile')->name('doctor-profile');

Route::get('/doctor-notification/{accountid}', 'GetDataDoctorController@DoctorNotification')->name('doctor-notification');

Route::get('/doctor-setting/{accountid}', 'GetDataDoctorController@DoctorSetting')->name('doctor-setting');

Route::get('/doctor-support/{accountid}', 'GetDataDoctorController@DoctorSupport')->name('doctor-support');

Route::get('/doctor-patientrecord/{accountid}/{accountpatientid}', 'GetDataDoctorController@DoctorPatientRecord')->name('doctor-patientrecord');

Route::get('/doctor-recorddetail/{accountid}/{accountpatientid}/{healthrecordid}', 'GetDataDoctorController@RecordDetail')->name('doctor-recorddetail');

Route::get('/doctor-home/{accountid}', 'GetDataDoctorController@DoctorSearch')->name('doctor-home');

Route::any('/doctor-home/{accountid}', 'GetDataDoctorController@SearchPatient')->name('doctor-home1');

