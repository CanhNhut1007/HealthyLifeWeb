<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>HealthLife Profile</title>
    <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md" id="nav_home" src="{{URL::asset('img/HealthLife_v2.png')}}">
        <div class="container-fluid"><img class="logo_img" src="{{URL::asset('img/HealthLife_v2.png')}}"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="{{route('doctor-home', $accountid)}}">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">List Patient</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('doctor-notification', $accountid)}}">Notifications</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('doctor-account', $accountid)}}">Account</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="untitled.html"></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="{{route('doctor-profile', $accountid)}}">Profile</a><a class="dropdown-item" role="presentation" href="{{route('doctor-setting', $accountid)}}">Settings</a><a class="dropdown-item" role="presentation" href="{{route('doctor-support', $accountid)}}">Support</a><a class="dropdown-item" role="presentation"
                                href="#">Log out</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="content_div" class="content_div">
        <div id="content_main" class="main_content_div"><small class="form-text text-muted name_table" id="text_name_table">Profile</small></div>
        <div class="main_content_div">
            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">About</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Educational Background<br></a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">License<br></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                        <div>
                            <p id="text_name_about">About</p>
                            <div class="div_about">
                                <div class="div_info_name div_name">
                                    <p class="text_about">Name</p><input class="form-control-sm input_about input_name_card" type="text" placeholder="Name" value="{{$employee->EmployeeName}}"></div>
                                <div class="div_info_name div_name">
                                    <p class="text_about">Identify Card</p><input class="form-control-sm input_about input_name_card" type="text" placeholder="Identify Card" value="{{$employee->IdentifyCard}}"></div>
                                <div class="div_info_name div_name">
                                    <p class="text_about">Date of Birth</p><input class="form-control-sm input_about input_name_card" type="text" placeholder="Year/Month/Year" value="{{$employee->Age}}"></div>
                                <div>
                                    <p class="div_info_name text_about">Gender</p><input class="form-control-sm input_about input_name_card" type="text" placeholder="Gender" value="{{$employee->Gender}}"></div>
                                <div>
                                    <p class="div_info_name text_about">Phone Number</p><input class="form-control-sm input_about input_name_card" type="text" placeholder="Phone Number" value="{{$employee->PhoneNumber}}"></div>
                            </div><button class="btn btn-primary" type="button">Save</button></div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-2">
                        <div>
                            <p id="text_name_contact">Educational Background</p>
                            <div>
                                <div class="div_info_name">
                                    <p class="text_contact">Degree</p><input class="form-control-sm input_contact" type="text" placeholder="Degree" value="{{$employee->Degree}}"></div>
                                <div class="div_info_name">
                                    <p id="text_phone" class="text_contact">Speciality</p>
                                    <div><input class="form-control-sm input_contact" type="text" placeholder="Speciality" value="{{$employee->Speciality}}"></div>
                                </div>
                                <div class="div_info_name">
                                    <p id="text_phone" class="text_contact">Medical School<br></p>
                                    <div><input class="form-control-sm input_contact" type="text" placeholder="Medical School" value="{{$employee->MedicalSchool}}"></div>
                                </div>
                                <div class="div_info_name">
                                    <p id="text_phone" class="text_contact">Year of Degree<br></p>
                                    <div><input class="form-control-sm input_contact" type="text" placeholder="Year of Degree" value="{{$employee->YearOfDegree}}"></div>
                                </div>
                            </div>
                        </div><button class="btn btn-primary" type="button">Save</button></div>
                    <div class="tab-pane" role="tabpanel" id="tab-3">
                        <div>
                            <p id="text_name_insurance">Insurace</p>
                            <div>
                                <div class="div_insurance_name">
                                    <p class="text_insurance">License Number</p><input class="form-control-sm input_insurance" type="text" placeholder="License Number" value="{{$employee->LicenseNumber}}"></div>
                                <div class="div_info_name">
                                    <p class="text_about">License Contry</p><input class="form-control-sm input_insurance" type="text" placeholder="License Country" value="{{$employee->LicenseCountry}}"></div>
                                <div class="div_info_name">
                                    <p class="text_about">License EXP</p><input class="form-control-sm input_insurance" type="text" placeholder="Year/Month/Day" value="{{$employee->LicenseEXP}}"></div>
                            </div><button class="btn btn-primary" type="button">Save</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>