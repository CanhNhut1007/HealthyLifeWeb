<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AccountModel;
use App\Model\EmployeeModel;
use App\Model\PatientModel;
use App\Model\HealthRecordModel;
use App\Model\HealthInsuranceModel;
use App\Model\EmergencyContactModel;

class GetDataPatientController extends Controller
{
    function PatientSupport($accountid)
    {
        return view('patient/support', ['accountid'=>$accountid]);
    }

    function PatientSetting($accountid){
        $accountemail = AccountModel::where('AccountID', $accountid)->value('AccountEmail');
        return view('patient/setting', ['accountid'=>$accountid, 'accountemail'=>$accountemail]);
    }

    function PatientAccount($accountid) 
    {
        $patientname = PatientModel::where('AccountID', $accountid)->value('PatientName');
        return view('patient/account', ['patientname'=>$patientname, 'accountid'=>$accountid]);
    }

    function PatientProfile($accountid) 
    {
        $patient = PatientModel::where('AccountID', $accountid)->first();
        $emergencycontact = EmergencyContactModel::where('PatientID', $patient->PatientID)->first();
        $healthinsurance = HealthInsuranceModel::where('PatientID', $patient->PatientID)->first();
        $accountemail = AccountModel::where('AccountID', $accountid)->value('AccountEmail');
        return view('patient/profile', ['accountid'=>$accountid, 'accountemail'=>$accountemail, 'patient'=>$patient, 'emergencycontact'=>$emergencycontact, 'healthinsurance'=>$healthinsurance]);
    }

    function PatientNotification($accountid) 
    {
        return view('patient/notification', ['accountid'=>$accountid]);
    }
/////////////////////////////
    function DoctorProfile($accountid, $accountdoctorid)
    {
        $employee = EmployeeModel::where('AccountID', $accountdoctorid)->first();
        return view('patient/doctorprofile', ['accountid'=>$accountid, 'employee'=>$employee, 'accountdoctorid'=>$accountdoctorid]);
    }

    function PatientSearch($accountid)
    {
        $patientname = PatientModel::where('AccountID', $accountid)->value('PatientName');
        $employee = EmployeeModel::all();
        return view('patient/home', ['accountid'=>$accountid, 'employee'=>$employee, 'patientname'=>$patientname]);
    }

    function SearchDoctor(Request $request, $accountid)
    {
        $patientname = PatientModel::where('AccountID', $accountid)->value('PatientName');
        $employee = EmployeeModel::where( 'EmployeeName', 'like', '%' . $request->q . '%' )->orWhere ( 'Speciality', 'like', '%' . $request->q . '%' )->orWhere ( 'EmployeeID', 'like', '%' . $request->q . '%' )->get ();
        if (count ( $employee ) > 0)
            return view('patient/home', ['accountid'=>$accountid, 'employee'=>$employee, 'patientname'=>$patientname]);
        else
            return view ('patient/home')->withMessage ( 'No Result found. Try to search again !' );
    }
}
