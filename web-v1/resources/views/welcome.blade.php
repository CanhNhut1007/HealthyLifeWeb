<!DOCTYPE html>
<html>
 <head>
  <title>Live search in laravel using AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
    <script>
    $(document).ready(function(){
        $(".btn_gotorecord").click(function(){
  alert("The paragraph was clicked.");
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">List Patient</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Notifications</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Account</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="untitled.html"></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Profile</a><a class="dropdown-item" role="presentation" href="#">Settings</a><a class="dropdown-item" role="presentation" href="#">Support</a><a class="dropdown-item" role="presentation"
                                href="#">Log out</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  <br />
  <div class="container box" >
   <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
     <div class="form-group">
     <div id="main_div">
    <div id="main_home">
        <div class="container">
            <div class="row">
                <div class="col"><small class="form-text text-muted" id="text_username">Hi Nguyet</small><input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" /></div>
            </div>
        </div>
    </div>
</div>

     </div>
     <div class="table-responsive">
      <h3>Result Search : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Patient ID</th>
         <th>Patient Name</th>
         <th>Identify Card</th>
         
            <th></th>
        </tr>
       </thead>
       
       <tbody>
            
       </tbody>
       
      </table>
      <input type="text" name="gotorecord" class="gotorecord"/><button class="btn_gotorecord">Hello</button>
     </div>
    </div>    
   </div>
  </div>
  <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.miranda.js')}}"></script>

 </body>
</html>