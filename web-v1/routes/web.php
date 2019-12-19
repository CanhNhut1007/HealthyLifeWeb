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

Route::get('/patient-doctorprofile/{accountid}/{accountdoctorid}', 'GetDataPatientController@ViewDoctorProfile')->name('patient-doctorprofile');

Route::post('/patient-profile/{accountid}', 'GetDataPatientController@UpdatePatientProfile')->name('update-patient-profile');

Route::get('/patient-myrecord/{accountid}', 'GetDataPatientController@ViewMyRecord')->name('patient-myrecord');

Route::get('/patient-recorddetail/{accountid}/{healthrecordid}', 'GetDataPatientController@MyRecordDetail')->name('patient-recorddetail');


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

Route::post('/doctor-profile/{accountid}', 'GetDataDoctorController@UpdateDoctorProfile')->name('update-doctor-profile');

Route::post('/doctor-setting/{accountid}', 'GetDataDoctorController@DoctorSetting')->name('update-email');

Route::get('/doctor-mypatient/{accountid}', 'GetDataDoctorController@ViewListPatient')->name('doctor-mypatient');

Route::post('/doctor-recorddetail/{accountid}/{accountpatientid}/{healthrecordid}', 'GetDataDoctorController@UpdateHealthRecord')->name('doctor-recorddetail1');

//Route::post('/doctor-profile-update-educational/{accountid}', 'GetDataDoctorController@UpdateDoctorEducational')->name('update-educational');

//Route::post('/doctor-profile-update-license/{accountid}', 'GetDataDoctorController@UpdateDoctorLicense')->name('update-license');

