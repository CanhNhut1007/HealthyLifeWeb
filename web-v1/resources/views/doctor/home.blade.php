<!DOCTYPE html>
<html>
<head>
    <title>HealthLife Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
    <br/>
    <div class="container box" >
        <div class="panel panel-default">
            <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="form-group">
                        <div id="main_div">
                            <div id="main_home">
                                <div class="container">
                                    <div class="row">
                                        <div class="col"><small class="form-text text-muted" id="text_username">Hi {{$employeename}}</small>
                                            <form action="{{route('doctor-home1', $accountid)}}" method="GET" role="search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="q" placeholder="Search users"> 
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <h3>List Patient: <span id="total_records"></span></h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Patient Name</th>
                                <th>Identify Card</th>
                                <th></th>  
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        @foreach ($patient as $user)
                            <tr>
                                <td>{{$user->PatientID}}</td>
                                <td>{{$user->PatientName}}</td>
                                <td>{{$user->IdentifyCard}}</td>
                                <td><a class="nav-link active" href="{{route('doctor-patientrecord', [$accountid, $user->AccountID])}}">ViewHealthRecord</a></td>
                            </tr>
                        @endforeach
                        </tbody>   
                    </table>
                </div>
            </div>    
        </div>
    </div>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.miranda.js')}}"></script>
 </body>
</html>