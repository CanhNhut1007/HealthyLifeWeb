<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Health Record Detail</title>
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
    <div id="main_div">
        <div id="main_home">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p id="text_username">Patient: {{$patientname}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content_div">
        <div id="content_home"><small class="form-text text-muted name_table" id="text_name_table">Health Record Detail</small>
            @if($errors->any())
                <div class="alert alert-danger" text-align="right" style="margin-left:5%; margin-right:5%;">
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
                    </div>
            @endif
            <form action="{{route('doctor-recorddetail1', [$accountid, $accountpatientid, $healthrecordid])}}" method="POST">
                @csrf()
                <div id="table_last_result">
                    <div class="col-4" id="column_name">
                        <p class="text_name">Health Record ID<br /></p>
                        <p class="text_name">Date<br /></p>
                        <p class="text_name">Doctor<br /></p>
                        <p class="text_name">Description<br /></p>
                        <p class="text_name">Diagnosis<br /></p>
                        <p class="text_name">Result<br /></p>
                        <p class="text_name">Notes<br /></p>
                        <p class="text_name">TotalFee<br /></p>
                    </div>
                    <div class="col" id="column_detail">
                        <p style="border:none; width:100%; border-radius:20px; font-size:18px; background-color:#ffffff; padding-left:5%; text-align:center;">{{$healthrecordetail->HealthRecordID}}</p>
                        <p style="border:none; width:100%; border-radius:20px; font-size:18px; background-color:#ffffff; padding-left:5%; text-align:center;">{{$healthrecordetail->HealthRecorDateTime}}</p>
                        <p style="border:none; width:100%; border-radius:20px; font-size:18px; background-color:#ffffff; padding-left:5%; text-align:center;">{{$healthrecordetail->EmployeeID}}</p>
                        <input name="Description" type="text" class="text_edit_detail_record" style="border:none; width:100%; border-radius:20px; margin-bottom:2.1%; font-size:18px; background-color:#ffffff; padding-left:5%; text-align:center;" value="{{$healthrecordetail->Description}}"/><br>
                        <input name="Diagnosis" type="text" class="text_edit_detail_record" style="border:none; width:100%; border-radius:20px; margin-bottom:2.1%; font-size:18px; background-color:#ffffff; padding-left:5%; text-align:center;" value="{{$healthrecordetail->Diagnosis}}"/><br>
                        <input name="Result" type="text" class="text_edit_detail_record" style="border:none; width:100%; border-radius:20px; margin-bottom:2.1%; font-size:18px; background-color:#ffffff; padding-left:5%; text-align:center;" value="{{$healthrecordetail->Result}}"/><br>
                        <input name="Notes" type="text" class="text_edit_detail_record" style="border:none; width:100%; border-radius:20px; margin-bottom:2.1%; font-size:18px; background-color:#ffffff; padding-left:5%; text-align:center;" value="{{$healthrecordetail->Notes}}"/><br>
                        <input name="TotalFee" type="text" class="text_edit_detail_record" style="border:none; width:100%; border-radius:20px; margin-bottom:2.1%; font-size:18px; background-color:#ffffff; padding-left:5%; text-align:center;" value="{{$healthrecordetail->TotalFee}}"/><br>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary btn_save_record" type="submit" style="margin-top:4%; margin-left:45%;">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
</body>