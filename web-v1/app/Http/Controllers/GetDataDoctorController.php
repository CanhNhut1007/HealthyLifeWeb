<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccountModel;
use App\Model\EmployeeModel;
use App\Model\PatientModel;
use App\Model\HealthRecordModel;

class GetDataDoctorController extends Controller
{
    

    function DoctorSupport($accountid)
    {
        return view('doctor/support', ['accountid'=>$accountid]);
    }

    function DoctorSetting($accountid){
        $accountemail = AccountModel::where('AccountID', $accountid)->value('AccountEmail');
        return view('doctor/setting', ['accountid'=>$accountid, 'accountemail'=>$accountemail]);
    }

    function DoctorAccount($accountid) 
    {
        $employeename = EmployeeModel::where('AccountID', $accountid)->value('EmployeeName');
        return view('doctor/account', ['accountid'=>$accountid, 'employeename'=>$employeename]);
    }

    function DoctorProfile($accountid) 
    {
        $employee = EmployeeModel::where('AccountID', $accountid)->first();
        return view('doctor/profile', ['accountid'=>$accountid, 'employee'=>$employee]);
    }

    function DoctorNotification($accountid) 
    {
        return view('doctor/notification', ['accountid'=>$accountid]);
    }

    function DoctorPatientRecord($accountid, $accountpatientid)
    {
        $patientid = PatientModel::where('AccountID', $accountpatientid)->value('PatientID');
        $healthrecord = HealthRecordModel::where('PatientID', $patientid)->get();
        $patientname = PatientModel::where('AccountID', $accountpatientid)->value('PatientName');
        return view('doctor/patientrecord', ['accountid'=>$accountid, 'healthrecord'=>$healthrecord, 'patientname'=>$patientname, 'accountpatientid'=>$accountpatientid]);
    }

    function DoctorSearch($accountid)
    {
        $employeename = EmployeeModel::where('AccountID', $accountid)->value('EmployeeName');
        $patient = PatientModel::all();
        return view('doctor/home', ['accountid'=>$accountid, 'patient'=>$patient, 'employeename'=>$employeename]);
    }

    function SearchPatient(Request $request, $accountid)
    {
        $employeename = EmployeeModel::where('AccountID', $accountid)->value('EmployeeName');
        $patient = PatientModel::where( 'PatientName', 'like', '%' . $request->q . '%' )->orWhere ( 'IdentifyCard', 'like', '%' . $request->q . '%' )->orWhere ( 'PatientID', 'like', '%' . $request->q . '%' )->get ();
        if (count ( $patient ) > 0)
            return view('doctor/home', ['accountid'=>$accountid, 'patient'=>$patient, 'employeename'=>$employeename]);
        else
            return view ('doctor/home')->withMessage ( 'No Details found. Try to search again !' );
    }

    function RecordDetail($accountid, $accountpatientid, $healthrecordid)
    {
        $patientname = PatientModel::where('AccountID', $accountpatientid)->value('PatientName');
        $healthrecordetail = HealthRecordModel::where('HealthRecordID', $healthrecordid)->first();
        $employeeid = EmployeeModel::where('AccountID', $accountid)->value('EmployeeID');
        if ($employeeid == $healthrecordetail->EmployeeID)
        {
            return view('doctor/recorddetailedit', ['accountid'=>$accountid, 'accountpatientid'=>$accountpatientid, 'patientname'=>$patientname, 'healthrecordetail'=>$healthrecordetail]);
        }
        else
        {
            return view('doctor/recorddetail', ['accountid'=>$accountid, 'accountpatientid'=>$accountpatientid, 'patientname'=>$patientname, 'healthrecordetail'=>$healthrecordetail]);
        }
    }

    function AddHealthRecord($accountid, $accountpatientid)
    {
        $employeeid = EmployeeModel::where('AccountID', $accountid)->value('EmployeeID');
        $patientname = PatientModel::where('AccountID', $accountpatientid)->value('PatientName');
        $patientid = PatientModel::where('AccountID', $accountpatientid)->value('PatientID');
        return view('doctor/addhealthrecord', ['accountid'=>$accountid, 'employeeid'=>$employeeid, 'accountpatientid'=>$accountpatientid, 'patientname'=>$patientname, 'patientid'=>$patientid]);
    }

    function SaveHealthRecord(Request $request, $accountid, $accountpatientid)
    {
        $healthrecord = new HealthRecordModel;
        $healthrecord->HealthRecordID = $request->healthrecordid;
        $healthrecord->HealthRecorDateTime = $request->date;
        $healthrecord->PatientID = $request->patientid;
        $healthrecord->EmployeeID = $request->employeeid;
        $healthrecord->Description = $request->description;
        $healthrecord->Diagnosis = $request->diagnosis;
        $healthrecord->Result = $request->result;
        $healthrecord->Notes = $request->notes;
        $healthrecord->TotalFee = $request->totalfee;
        $healthrecord->save();
        $patientid = PatientModel::where('AccountID', $accountpatientid)->value('PatientID');
        $healthrecord = HealthRecordModel::where('PatientID', $patientid)->get();
        $patientname = PatientModel::where('AccountID', $accountpatientid)->value('PatientName');
        //return view('welcome');
        return view('doctor/patientrecord', ['accountid'=>$accountid, 'healthrecord'=>$healthrecord, 'patientname'=>$patientname, 'accountpatientid'=>$accountpatientid]);
    }

    function UpdateProfileAboutDoctor(Request $request, $accountid)
    {
        EmployeeModel::where('AccountID', $accountid)->update(['EmployeeName'=>$request->employeename, 'IdentifyCard'=>$request->identifycard, 'Age'=>$request->dateofbirth, 'Gender'=>$request->gender, 'PhoneNumber'=>$request->phonenumber]);
        $employee = EmployeeModel::where('AccountID', $accountid)->first();
        return view('doctor/profile', ['accountid'=>$accountid, 'employee'=>$employee]);
    }
}
