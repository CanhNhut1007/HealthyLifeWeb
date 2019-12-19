<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>HealthLife Profile</title>
    <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md" id="nav_home" src="{{URL::asset('img/HealthLife_v2.png')}}">
        <div class="container-fluid"><img class="logo_img" src="{{URL::asset('img/HealthLife_v2.png')}}" /><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li role="presentation" class="nav-item"><a class="nav-link active" href="{{route('patient-home', $accountid)}}">Home</a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="{{route('patient-myrecord', $accountid)}}">My Record</a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="{{route('patient-notification', $accountid)}}">Notifications</a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="{{route('patient-account', $accountid)}}">Account</a></li>
                    <li class="nav-item dropdown"><a data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle nav-link" href="untitled.html"></a>
                        <div role="menu" class="dropdown-menu"><a role="presentation" class="dropdown-item" href="{{route('patient-profile', $accountid)}}">Profile</a><a role="presentation" class="dropdown-item" href="{{route('patient-setting', $accountid)}}">Settings</a><a role="presentation" class="dropdown-item" href="{{route('patient-support', $accountid)}}">Support</a><a role="presentation" class="dropdown-item"
                                href="#">Log out</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content_div">
        <div id="content_main" class="main_content_div"><small class="form-text text-muted name_table" id="text_name_table">Profile</small></div>
        <div class="main_content_div">
            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a role="tab" data-toggle="tab" class="nav-link active" href="#tab-1">About</a></li>
                    <li class="nav-item"><a role="tab" data-toggle="tab" class="nav-link" href="#tab-2">Contact Information<br /></a></li>
                    <li class="nav-item"><a role="tab" data-toggle="tab" class="nav-link" href="#tab-3">Insurance<br /></a></li>
                </ul>
                <form action="{{route('update-patient-profile', $accountid)}}" method="POST">
                    @csrf()
                    <div class="tab-content">               
                        <div role="tabpanel" class="tab-pane active" id="tab-1">
                            <div>
                                <p id="text_name_about">About</p>
                                <div class="div_about">
                                    <div class="div_info_name div_name">
                                        <p class="text_about">Patient Name</p><input name="PatientName" type="text" class="form-control-sm input_about input_name_card" placeholder="Name" value="{{$patient->PatientName}}"/></div>
                                    <div class="div_info_name div_name">
                                        <p class="text_about">Identify Card</p><input name="IdentifyCard" type="text" class="form-control-sm input_about input_name_card" placeholder="Identify Card" value="{{$patient->IdentifyCard}}"/></div>
                                    <div class="div_info_name div_name">
                                        <p class="text_about">Day of Birth</p><input name="DayOfBirth" type="text" class="form-control-sm input_about input_name_card" placeholder="Year/Month/Year" value="{{$patient->DayOfBirth}}"/></div>
                                    <div>
                                        <p class="div_info_name text_about">Gender</p><input name="Gender" type="text" class="form-control-sm input_about input_name_card" placeholder="Gender" value="{{$patient->Gender}}"/></div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab-2">
                            <div>
                                <p id="text_name_contact">Contact Infomation</p>
                                <div>
                                    <div class="div_insurance_name div_curent_email">
                                        <p class="para_current_mail">Email<br></p>
                                        <p id="text_current_mai_login" class="para_current_mail text_mail_login" placeholder="Login Email">{{$accountemail}}</p>
                                    </div>
                                    <div class="div_info_name">
                                        <p id="text_phone" class="text_contact">Phone</p>
                                        <div><input name="Phone" type="text" class="form-control-sm input_contact" placeholder="Phone number" value="{{$patient->PhoneNumber}}"/></div>
                                    </div>
                                    <div class="div_info_name">
                                        <p id="text_phone" class="text_contact">Address<br /></p>
                                        <div><input name="Address" type="text" class="form-control-sm input_contact" placeholder="Address" value="{{$patient->Address}}"/></div>
                                    </div>
                                    <div class="div_info_name">
                                        <p id="text_phone" class="text_contact">City/Province<br /></p>
                                        <div><input name="City" type="text" class="form-control-sm input_contact" placeholder="City" value="{{$patient->City}}"/></div>
                                    </div>
                                    <div class="div_info_name">
                                        <p id="text_phone" class="text_contact">District/<br /></p>
                                        <div><input name="District" type="text" class="form-control-sm input_contact" placeholder="Province" value="{{$patient->District}}"/></div>
                                    </div>
                                    <div class="div_info_name">
                                        <p id="text_phone" class="text_contact">Country/Region<br /></p>
                                        <div><input name="Country" type="text" class="form-control-sm input_contact" placeholder="Country" value="{{$patient->Country}}"/></div>
                                    </div>
                                    <div>
                                        <p class="text_address">Emergency contact<br /></p>
                                        <div><input name="EmergencyContactName" type="text" class="form-control-sm address input_emergency" placeholder="Name" value="{{$emergencycontact->EmergencyContactName}}"/><input name="EmergencyContactPhone" type="text" class="form-control-sm address input_emergency" placeholder="Phone" value="{{$emergencycontact->EmergencyPhoneNumber}}"/><input name="EmergencyContactRelationship" type="text" class="form-control-sm address input_emergency"
                                            placeholder="Relationship" value="{{$emergencycontact->RelationShip}}"/></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab-3">
                            <div>
                                <p id="text_name_insurance">Insurace</p>
                                <div>
                                    <div class="div_insurance_name">
                                        <p class="text_insurance">Health Insurance Card Code</p><input name="HealthInsuranceCode" type="text" class="form-control-sm input_insurance" placeholder="Card Code" value="{{$healthinsurance->HealthInsuranceCardCode}}"/></div>
                                    <div class="div_info_name">
                                        <p class="text_insurance">Hospital Register</p><input name="HospitalRegister" type="text" class="form-control-sm input_insurance" placeholder="Hopital" value="{{$healthinsurance->HospitalRegister}}"/></div>
                                    <div class="div_insurance_name">
                                        <p class="text_insurance">Health Insurance MFD<br /></p><input name="HealthInsuranceMfd" type="text" class="form-control-sm input_insurance" placeholder="Year/Month/Day" value="{{$healthinsurance->HealthInsuranceMFD}}"/></div>
                                    <div class="div_insurance_name">
                                        <p class="text_insurance">Health Insurance EXP<br /></p><input name="HealthInsuranceExp" type="text" class="form-control-sm input_insurance" placeholder="Year/Month/Day" value="{{$healthinsurance->HealthInsuranceEXP}}"/></div>
                                </div>
                            </div>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger" text-align="right" style="margin-left:5%; margin-right:5%;">
                            @foreach($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                            </div>
                        @endif
                        <button class="btn btn-primary" type="submit" style="margin-top:5%; margin-left:40%; margin-bottom:5%;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>