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
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md" id="nav_home" src="{{URL::asset('img/HealthLife_v2.png')}}">
        <div class="container-fluid"><img class="logo_img" src="{{URL::asset('img/HealthLife_v2.png')}}" /><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li role="presentation" class="nav-item"><a class="nav-link active" href="{{route('patient-home', $accountid)}}">Home</a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="#">My Record</a></li>
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
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab-1">
                        <div>
                            <p id="text_name_about">About</p>
                            <form action="" method="put">
                                <div class="div_about">
                                    <div class="div_info_name div_name">
                                        <p class="text_about">Name</p><input type="text" class="form-control-sm input_about input_name_card" placeholder="Name" value="{{$patient->PatientName}}"/></div>
                                    <div class="div_info_name div_name">
                                        <p class="text_about">Identify Card</p><input type="text" class="form-control-sm input_about input_name_card" placeholder="Identify Card" value="{{$patient->IdentifyCard}}"/></div>
                                    <div class="div_info_name div_name">
                                        <p class="text_about">Date of Birth</p><input type="text" class="form-control-sm input_about input_name_card" placeholder="Year/Month/Year" value="{{$patient->Age}}"/></div>
                                    <div>
                                        <p class="div_info_name text_about">Gender</p><input type="text" class="form-control-sm input_about input_name_card" placeholder="Gender" value="{{$patient->Gender}}"/></div>
                                </div>
                                <button class="btn btn-primary" type="submit" style="margin-top:5%; margin-left:40%;">Save</button>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-2">
                        <div>
                            <p id="text_name_contact">Contact Infomation</p>
                            <form action="" method="put">
                                <div>
                                    <div class="div_info_name">
                                        <p class="text_contact">Email</p><input type="text" class="form-control-sm input_contact" placeholder="Email" value="{{$accountemail}}"/></div>
                                    <div class="div_info_name">
                                        <p id="text_phone" class="text_contact">Phone</p>
                                        <div><input type="text" class="form-control-sm input_contact" placeholder="Phone number" value="{{$patient->PhoneNumber}}"/></div>
                                    </div>
                                    <div class="div_info_name">
                                        <p id="text_phone" class="text_contact">Address<br /></p>
                                        <div><input type="text" class="form-control-sm input_contact" placeholder="Address" value="{{$patient->Address}}"/></div>
                                    </div>
                                    <div class="div_info_name">
                                        <p id="text_phone" class="text_contact">City/Province<br /></p>
                                        <div><input type="text" class="form-control-sm input_contact" placeholder="City" value="{{$patient->City}}"/></div>
                                    </div>
                                    <div class="div_info_name">
                                        <p id="text_phone" class="text_contact">District/<br /></p>
                                        <div><input type="text" class="form-control-sm input_contact" placeholder="Province" value="{{$patient->District}}"/></div>
                                    </div>
                                    <div class="div_info_name">
                                        <p id="text_phone" class="text_contact">Country/Region<br /></p>
                                        <div><input type="text" class="form-control-sm input_contact" placeholder="Country" value="{{$patient->Country}}"/></div>
                                    </div>
                                    <div>
                                        <p class="text_address">Emergency contact<br /></p>
                                        <div><input type="text" class="form-control-sm address input_emergency" placeholder="Name" value="{{$emergencycontact->EmergencyContactName}}"/><input type="text" class="form-control-sm address input_emergency" placeholder="Phone" value="{{$emergencycontact->EmergencyPhoneNumber}}"/><input type="text" class="form-control-sm address input_emergency"
                                            placeholder="Relationship" value="{{$emergencycontact->RelationShip}}"/></div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit" style="margin-top:5%; margin-left:40%;">Save</button>
                            </form>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-3">
                        <div>
                            <p id="text_name_insurance">Insurace</p>
                            <form action="" method="put">
                                <div>
                                    <div class="div_insurance_name">
                                        <p class="text_insurance">Health Insurance Card Code</p><input type="text" class="form-control-sm input_insurance" placeholder="Card Code" value="{{$healthinsurance->HealthInsuranceCardCode}}"/></div>
                                    <div class="div_info_name">
                                        <p class="text_insurance">Hospital Register</p><input type="text" class="form-control-sm input_insurance" placeholder="Hopital" value="{{$healthinsurance->HospitalRegister}}"/></div>
                                    <div class="div_insurance_name">
                                        <p class="text_insurance">Health Insurance MFD<br /></p><input type="text" class="form-control-sm input_insurance" placeholder="Year/Month/Day" value="{{$healthinsurance->HealthInsuranceMFD}}"/></div>
                                    <div class="div_insurance_name">
                                        <p class="text_insurance">Health Insurance EXP<br /></p><input type="text" class="form-control-sm input_insurance" placeholder="Year/Month/Day" value="{{$healthinsurance->HealthInsuranceEXP}}"/></div>
                                </div>
                                <button class="btn btn-primary" type="submit" style="margin-top:5%; margin-left:40%;">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>