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

Route::get('/doctor-addhealthrecord/{accountid}/{accountpatientid}', 'GetDataDoctorController@AddHealthRecord')->name('doctor-addhealthrecord');

Route::post('/doctor-patientrecord/{accountid}/{accountpatientid}', 'GetDataDoctorController@SaveHealthRecord')->name('doctor-patientrecord1');

Route::any('/doctor-profile-update-about/{accountid}', 'GetDataDoctorController@UpdateProfileAboutDoctor')->name('doctor-profile1');
