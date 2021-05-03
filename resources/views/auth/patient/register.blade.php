<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/47fac39c42.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet' type='text/css'>

    <!-- Nav -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/menu.css')}}" rel="stylesheet">
	<link href="{{asset('css/vendors.css')}}" rel="stylesheet">
	<link href="{{asset('css/icon_fonts/css/all_icons_min.css')}}" rel="stylesheet">
	

    <style>
        .row{margin-left :0px;}
        body{font-family: 'Roboto Mono', monospace;}
        .form-control:focus { border-color: red; }        
        .form-control:focus { box-shadow: 0 0 0 0rem rgba(0,0,0,0); }
    </style>

    <style>
		#botmanWidgetRoot > div > div {background : #3F4079 !important;}
		.desktop-closed-message-avatar {background:rgba(255, 255, 255, 0) !important; box-shadow:none !important}
		.desktop-closed-message-avatar > img {    border-radius: 0px !important; }
		#botmanWidgetRoot > div {left:2rem;}
		/* #botmanWidgetRoot div { left: 0.5vw;}
		#botmanWidgetRoot > div { right: null !important;} */
		.desktop-closed-message-avatar {left: 0px; !important}
		body {line-height: 2;}
		.main-menu > ul > li > a { font-size: 0.975rem !important;}
		.main-menu ul ul li a { font-size: 0.9125rem !important;}
        body {font-size: 1rem !important;}
        .btn {margin-top : 1.5rem;}
	</style>

    </head>
    <body style="background:#F6F6F6;font-size:12px; color:#495057">
        <div id="nav"></div>

        <div class="col-md-12" style="background: #3F4079; background: -webkit-linear-gradient(to left, #827FFE, #3F4079);background: linear-gradient(to left, #827FFE, #3F4079);" >
            </br>
                    <div data-aos="fade-up" class="mx-auto" style="width: 200px;" ><h1 style="color:#fff;font-size: 3rem;">Register</h1></div>
            </br>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card" style="margin-top:25px; margin-bottom:25px">
                    <div class="card-header" style="background:white; color: #3F4079" ><i class="fas fa-hospital-user"></i> <strong>Patient Registration</strong></div>
                    <div class="card-body">
                        <div class="mx-auto" style="width:80%">
                            <div style="margin-bottom:2rem;" id="pr" data="{{$data}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./../../js/app.js" ></script>


    <!-- comonScript -->
    <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('js/common_scripts.min.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    
</body>

@include('langagues')
</html>