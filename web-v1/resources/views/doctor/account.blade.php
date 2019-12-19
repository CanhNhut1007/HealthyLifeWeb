<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>HealthLife Account</title>
    <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.min.css')}}">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md" id="nav_home" src="{{URL::asset('img/HealthLife_v2.png')}}">
        <div class="container-fluid"><img class="logo_img" src="{{URL::asset('img/HealthLife_v2.png')}}"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="{{route('doctor-home', $accountid)}}">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('doctor-mypatient', $accountid)}}">My Patients</a></li>
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
        <div id="content_main" class="main_content_div"><small class="form-text text-muted name_table" id="text_name_table">Account</small></div>
        <div class="main_content_div">
            <div id="account-version_div" class="div_parent_acc">
                <div class="col-6 column_acc" id="column_name_account"><img id="icon_acc" src="{{URL::asset('img/icon-account.png')}}" width="64" height="64">
                    <div class="div_chi_acc-ver"><small class="form-text text-muted" id="text_name_account">Dr.{{$employeename}}</small><a id="text_editprofile" class="edit_profile" href="{{route('doctor-profile', $accountid)}}">Edit profile</a></div>
                </div>
                <div class="col column_acc" id="column_healthlife"><img class="img_logo_h" src="{{URL::asset('img/organization_logo_url.png')}}">
                    <div id="div_info_htext" class="div_chi_acc-ver"><small class="form-text text-muted" id="text_healthlife">HealthLife</small><small class="form-text text-muted">Basic Account<br></small></div>
                </div>
            </div>
            <div class="div_parent_acc">
                <div class="col"><small class="form-text text-muted" id="text_language">Display Language</small></div>
                <div class="col"><select class="select_language"><option value="12" selected="">English (US)</option></select></div>
            </div>
            <div class="div_parent_sslt">
                <div>
                    <div class="col column_sslt" src="assets/img/icon-setting.png"><img class="img_sslt" src="{{URL::asset('img/icon-setting.png')}}" width="40" height="40">
                        <div class="div_text_sslt"><a class="link_sslt" href="{{route('doctor-setting', $accountid)}}">Settings</a><small class="form-text text-muted">Configure your account your way</small></div>
                    </div>
                </div>
                <div>
                    <div class="col column_sslt" src="assets/img/icon-setting.png"><img class="img_sslt" src="{{URL::asset('img/icon-help.png')}}" width="40" height="40">
                        <div class="div_text_sslt"><a class="link_sslt" href="{{route('doctor-support', $accountid)}}">Support</a><small class="form-text text-muted">24/7 customer support</small></div>
                    </div>
                </div>
                <div>
                    <div class="col column_sslt" src="assets/img/icon-setting.png"><img class="img_sslt" src="{{URL::asset('img/icon-logout.png')}}" width="40" height="40">
                        <div class="div_text_sslt"><a class="link_sslt" href="#">Log out</a><small class="form-text text-muted">Securely log out of the site</small></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>