<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>HealthLife Setting</title>
    <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn_cancel1').click(function() {
                $('#id_loginemail').val("");
                $('#id_emailpass').val("");
            });

            $('#btn_cancel2').click(function() {
                $('#id_currentpass').val("");
                $('#id_newpass').val("");
                $('#id_confirmpass').val("");
            });
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md" id="nav_home" src="{{URL::asset('img/HealthLife_v2.png')}}">
        <div class="container-fluid"><img class="logo_img" src="{{URL::asset('img/HealthLife_v2.png')}}"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="{{route('patient-home', $accountid)}}">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('patient-myrecord', $accountid)}}">My Record</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('patient-notification', $accountid)}}">Notifications</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('patient-account', $accountid)}}">Account</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="untitled.html"></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="{{route('patient-profile', $accountid)}}">Profile</a><a class="dropdown-item" role="presentation" href="{{route('patient-setting', $accountid)}}">Settings</a><a class="dropdown-item" role="presentation" href="{{route('patient-support', $accountid)}}">Support</a><a class="dropdown-item" role="presentation"
                                href="#">Log out</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content_div">
        <div id="content_main" class="main_content_div"><small class="form-text text-muted name_table" id="text_name_table">Account Settings</small></div>
        <div class="main_content_div">
            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Your Email</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Your Password<br></a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">About HealthLife<br></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                        <div>
                            <p id="text_name_insurance">Your Email</p>
                            <div>
                                <div class="div_insurance_name div_curent_email">
                                    <p class="para_current_mail">Curent login email<br></p>
                                    <p id="text_current_mai_login" class="para_current_mail text_mail_login" placeholder="Login Email">{{$accountemail}}</p>
                                </div>
                                <form action="#" method="put">
                                    <div class="div_insurance_name">
                                        <p class="text_setting">Enter your new login email<br></p><input class="form-control-sm input_setting" type="text" placeholder="Login Email" id="id_loginemail"></div>
                                    <div class="div_info_name">
                                        <p class="text_setting">Enter password to change your login email<br></p><input class="form-control-sm input_setting" type="password" placeholder="Password" id="id_emailpass"></div>
                                    <div class="button_save_cancel">
                                        <button class="btn btn-primary" type="submit" style="margin-top:5%; margin-left:40%;">Save</button>
                                        <button class="btn btn-primary" type="button" style="margin-top:4%; margin-left:20%;" id="btn_cancel1">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-2">
                        <div>
                            <p id="text_name_insurance">Your Password</p>
                            <form action="#" method="put">
                                <div>
                                    <div class="div_insurance_name">
                                        <p class="para_current_mail">Enter current password<br></p><input class="form-control-sm input_setting" type="password" placeholder="Current Password" id="id_currentpass"></div>
                                    <div class="div_insurance_name">
                                        <p class="text_setting">Enter new password<br></p><input class="form-control-sm input_setting" type="password" placeholder="New Password" id="id_newpass"></div>
                                    <div class="div_info_name">
                                        <p class="text_setting">Confirm new password<br></p><input class="form-control-sm input_setting" type="password" placeholder="Confirm Password" id="id_confirmpass"></div>
                                    <div class="button_save_cancel">
                                        <button class="btn btn-primary" type="submit" style="margin-top:5%; margin-left:40%;">Save</button>
                                        <button class="btn btn-primary" type="button" style="margin-top:4%; margin-left:20%;" id="btn_cancel2">Cancel</button>
                                    </div>                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-3">
                        <div>
                            <p id="text_name_insurance">About HealthLife</p>
                            <div>
                                <div class="div_insurance_name"><a class="about_health" href="#"><br>Terms of Service<br><br></a><a class="about_health" href="#">Privacy Policy</a></div>
                            </div>
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