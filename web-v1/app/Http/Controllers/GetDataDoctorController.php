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
        $employeeid = EmployeeModel::where('AccountID', $accountid)->value('EmployeeID');
        $patients = PatientModel::join('healthrecord', 'patient.PatientID', '=', 'healthrecord.PatientID')->where('EmployeeID', $employeeid)->get();
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
            return view('doctor/recorddetailedit', ['accountid'=>$accountid, 'accountpatientid'=>$accountpatientid, 'patientname'=>$patientname, 'healthrecordetail'=>$healthrecordetail, 'healthrecordid'=>$healthrecordid]);
        }
        else
        {
            return view('doctor/recorddetail', ['accountid'=>$accountid, 'accountpatientid'=>$accountpatientid, 'patientname'=>$patientname, 'healthrecordetail'=>$healthrecordetail, 'healthrecordid'=>$healthrecordid]);
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
        $request->validate([
            'HealthRecordID'=>'required',
            'HealthRecorDateTime'=>'required|date',
            'PatientID'=>'required',
            'EmployeeID'=>'required',
            'Description'=>'required',
            'Diagnosis'=>'required',
            'Result'=>'required',
            'Notes'=>'required',
            'TotalFee'=>'required'
        ]);
        $healthrecord = new HealthRecordModel;
        $healthrecord->HealthRecordID = $request->HealthRecordID;
        $healthrecord->HealthRecorDateTime = $request->HealthRecorDateTime;
        $healthrecord->PatientID = $request->PatientID;
        $healthrecord->EmployeeID = $request->EmployeeID;
        $healthrecord->Description = $request->Description;
        $healthrecord->Diagnosis = $request->Diagnosis;
        $healthrecord->Result = $request->Result;
        $healthrecord->Notes = $request->Notes;
        $healthrecord->TotalFee = $request->TotalFee;
        $healthrecord->save();
        $patientid = PatientModel::where('AccountID', $accountpatientid)->value('PatientID');
        $healthrecord = HealthRecordModel::where('PatientID', $patientid)->get();
        $patientname = PatientModel::where('AccountID', $accountpatientid)->value('PatientName');
        //return view('welcome');
        return view('doctor/patientrecord', ['accountid'=>$accountid, 'healthrecord'=>$healthrecord, 'patientname'=>$patientname, 'accountpatientid'=>$accountpatientid]);
    }

    function UpdateProfileAboutDoctor(Request $request, $accountid)
    {
        EmployeeModel::where('AccountID', $accountid)->update(['EmployeeName'=>$request->employeename, 'IdentifyCard'=>$request->identifycard, 'DayOfBirth'=>$request->dayofbirth, 'Gender'=>$request->gender, 'PhoneNumber'=>$request->phonenumber]);
        $employee = EmployeeModel::where('AccountID', $accountid)->first();
        return view('doctor/profile', ['accountid'=>$accountid, 'employee'=>$employee]);
    }

    public function UpdateDoctorProfile(Request $request, $accountid)
    {
        $request->validate([
            'EmployeeName'=>'required',
            'IdentifyCard'=>'required',
            'DayOfBirth'=>'required|date',
            'Gender'=>'required',
            'Phonenumber'=>'required',
            'Degree'=>'required',
            'Speciality'=>'required',
            'MedicalSchool'=>'required',
            'YearOfDegree'=>'required',
            'LicenseNumber'=>'required',
            'LicenseCountry'=>'required',
            'LicenseExp'=>'required|date'
        ]);
        EmployeeModel::where('AccountID', $accountid)->update(['EmployeeName'=>$request->EmployeeName, 'IdentifyCard'=>$request->IdentifyCard, 'DayOfBirth'=>$request->DayOfBirth, 'Gender'=>$request->Gender, 'PhoneNumber'=>$request->Phonenumber,
                                                                'Degree'=>$request->Degree, 'Speciality'=>$request->Speciality, 'MedicalSchool'=>$request->MedicalSchool, 'YearOfDegree'=>$request->YearOfDegree,
                                                                'LicenseNumber'=>$request->LicenseNumber, 'LicenseCountry'=>$request->LicenseCountry, 'LicenseEXP'=>$request->LicenseExp]);
        $employee = EmployeeModel::where('AccountID', $accountid)->first();
        return view('doctor/profile', ['accountid'=>$accountid, 'employee'=>$employee]);
    }

    public function UpdateDoctorEmail(Request $request, $accountid)
    {
        $request->validate([
            'degree'=>'required',
            'speciality'=>'required',
            'medicalschool'=>'required',
            'yearofdegree'=>'required'
        ]);
        EmployeeModel::where('AccountID', $accountid)->update(['Degree'=>$request->degree, 'Speciality'=>$request->speciality, 'MedicalSchool'=>$request->medicalschool, 'YearOfDegree'=>$request->yearofdegree]);
        $employee = EmployeeModel::where('AccountID', $accountid)->first();
        return view('doctor/profile', ['accountid'=>$accountid, 'employee'=>$employee]);
    }

    public function ViewListPatient($accountid)
    {
        $employeeid = EmployeeModel::where('AccountID', $accountid)->value('EmployeeID');
        $patients = HealthRecordModel::join('patient', 'patient.PatientID', '=', 'healthrecord.PatientID')->select('patient.PatientID', 'patient.PatientName', 'patient.IdentifyCard', 'patient.AccountID', 'healthrecord.EmployeeID')->where('EmployeeID', $employeeid)->distinct()->get();
        return view('doctor/mypatient', ['accountid'=>$accountid, 'patients'=>$patients]);
    }

    public function UpdateHealthRecord(Request $request, $accountid, $accountpatientid, $healthrecordid)
    {
        $request->validate([
            'Description'=>'required',
            'Diagnosis'=>'required',
            'Result'=>'required',
            'Notes'=>'required',
            'PatientView'=>'required',
            'TotalFee'=>'required'
        ]);
        HealthRecordModel::where('HealthRecordID', $healthrecordid)->update(['Description'=>$request->Description, 'Diagnosis'=>$request->Diagnosis, 'Result'=>$request->Result, 'Notes'=>$request->Notes, 'PatientView'=>$request->PatientView, 'TotalFee'=>$request->TotalFee]);
        $patientname = PatientModel::where('AccountID', $accountpatientid)->value('PatientName');
        $healthrecordetail = HealthRecordModel::where('HealthRecordID', $healthrecordid)->first();
        return view('doctor/recorddetailedit', ['accountid'=>$accountid, 'accountpatientid'=>$accountpatientid, 'patientname'=>$patientname, 'healthrecordetail'=>$healthrecordetail, 'healthrecordid'=>$healthrecordid]);
    }


}
