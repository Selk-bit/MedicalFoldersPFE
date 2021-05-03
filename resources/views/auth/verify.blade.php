<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email verification</title>
    
	<!-- Favicons-->
	<script src="https://kit.fontawesome.com/47fac39c42.js" crossorigin="anonymous"></script>
	
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    
	<!-- BASE CSS -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/menu.css')}}" rel="stylesheet">
	<link href="{{asset('css/vendors.css')}}" rel="stylesheet">
	<link href="{{asset('css/icon_fonts/css/all_icons_min.css')}}" rel="stylesheet">
    
	<!-- YOUR CUSTOM CSS -->
	<!-- <link href="css/custom.css" rel="stylesheet"> -->

	<style>
		#botmanWidgetRoot > div > div {background : #3F4079 !important;}
		.desktop-closed-message-avatar {background:rgba(255, 255, 255, 0) !important; box-shadow:none !important}
		.desktop-closed-message-avatar > img {    border-radius: 0px !important; }
		#botmanWidgetRoot > div {left:2rem;}
		/* #botmanWidgetRoot div { left: 0.5vw;}
		#botmanWidgetRoot > div { right: null !important;} */
		.desktop-closed-message-avatar {left: 0px; !important}
		.main-menu > ul > li > a { font-size: 0.975rem;}
		.main-menu ul ul li a { font-size: 0.9125rem;}
        @media only screen and (max-width: 400px) {
            #media {
                font-size: 1.1rem !important;
            }
        }
        .alert-success {
            color: #ffffff;
            background-color: #e74e84;
            border-color: #ffffff;
            border-radius: 25px;
            font-size: initial;
        }
	</style>

</head>
<body style="background : rgb(246, 246, 246)">

<header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="index.html" title="pfe"></a></h1>
					</div>
				</div>
				<nav class="col-lg-9 col-6">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href=""><span>Menu mobile</span></a>
					<ul id="top_access">
						<li style="color:#19224E" ><i class="fas fa-globe-europe"></i></li>
						<!-- <li><a href="register-doctor.html"><i class="pe-7s-add-user"></i></a></li> -->
					</ul>
					<div class="main-menu">
						<ul>
							<li class="submenu">
								<a href="" class="show-submenu">Home&nbsp;&nbsp;&nbsp;&nbsp;</a>
							</li>

							<li class="submenu">
								<a href="#" class="show-submenu">Authentification<i class="icon-down-open-mini">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
								<ul>
									<li class="third-level"><a href="">Register</a>
										<ul>
											<li><a href="/medcine/register">Medcine</a></li>
                                    		<li><a href="/patient/register">Patient</a></li>
										</ul>
									</li>
									<li class="third-level"><a href="">Login</a>
										<ul>
											<li><a href="/medcine/login">Medcine</a></li>
                                    		<li><a href="/patient/login">Patient</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#PNC">Pourquoi Nous Choisir&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
						</ul>
					</div>
					<!-- /main-menu -->
				</nav>
			</div>
		</div>
		<!-- /container -->
	</header>

<div class="col-md-12" style="background: #3F4079; background: -webkit-linear-gradient(to left, #827FFE, #3F4079);background: linear-gradient(to left, #827FFE, #3F4079);" >
            </br></br>
                    <div style="width: 100%;" ><h2 id="media" style="color:#fff;width: 50%; margin: 0 auto 0 auto;text-align: center;font-size:2rem;">Verification d'Adress Email</h2></div>
            </br></br>
</div>

<div class="container" style="background : rgb(246, 246, 246)">
    <div class="row justify-content-center">
        <div class="col-md-8" style="background : rgb(246, 246, 246)">
            <div class="card" style="background : #fff; margin-top:2rem">
                <h5 class="card-header" style="color:#3F4079"><i class="fas fa-envelope-open-text"></i>&nbsp;Verify Your Email Address</h5>
                <!-- <h5 class="card-header" style="color:rgb(130, 127, 254)"><i class="fas fa-envelope-open-text"></i>&nbsp;Verify Your Email Address</h5> -->

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Click Here to Request</button>.
					</form>
					<br>
					<button class="btn btn-link p-0 m-0 align-baseline collapsed"  data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Click Here to Change Your Email.</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container collapse multi-collapse hide" style="background : rgb(246, 246, 246)" id="multiCollapseExample1">
    <div class="row justify-content-center">
        <div class="col-md-8" style="background : rgb(246, 246, 246)">
            <div class="card" style="background : #fff; margin-top:2rem">
				<h5 class="card-header" style="color:#3F4079"><i class="fas fa-envelope-open-text"></i>&nbsp;Change Your Email Adress</h5>
				<div class="card-body" style="margin-left: 6vw;">

					<form id="email" method="POST" >
						@csrf
						{{ __('Enter Your New Email Here : ') }}

						<input  type="email" id="cng" type="text"  name="cng">
						<button  type="submit" class="btn btn-link p-0 m-0 align-baseline">Change</button>
						<p style="color:red; margin-left:14vw;" id="pa" ></p>
					</form>
					<br>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
	<script src="{{asset('js/common_scripts.min.js')}}"></script>
	<script src="{{asset('js/functions.js')}}"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



	<script>
	document.getElementById('email').addEventListener('submit', performPostRequest);
    function performPostRequest(e) {
        e.preventDefault();
        var cng = document.getElementById('cng').value;

        
        axios.post('/changeemail', {
            cng:cng,

        })
        .then(function (response) {
			console.log(response);
			Swal.fire({ icon: 'success', title: 'Email Modified', text: 'You Email has been modofied successfully',showConfirmButton: false,timer: 1500});
			$('#cng').val('');
			$("#multiCollapseExample1").collapse("hide");
			$('#pa').text('')



        })
        .catch(function (error) {
			console.log(error);
			$('#pa').text('This Email Already exist')

        });
        e.preventDefault();

    }
	</script>
	@include('langagues')
</html>