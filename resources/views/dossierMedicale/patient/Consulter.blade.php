<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>

    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('css/style1.css')}}" rel="stylesheet">
    <script src="{{asset('js/modernizr.js')}}"></script>

	<style>
	/* body {font-family: "Gill Sans", sans-serif; } */
	body {font-family: "Poppins", Helvetica, sans-serif; }
	button.print-button {width: 10rem !important ;height: 7rem !important;}
</style>

<style>
	button.print-button {
	width: 100px;
	height: 100px;
	}
	span.print-icon, span.print-icon::before, span.print-icon::after, button.print-button:hover .print-icon::after {
	border: solid 4px #333;
	}
	span.print-icon::after {
	border-width: 2px;
	}

	button.print-button {
	position: relative;
	padding: 0;
	border: 0;
	
	border: none;
	background: transparent;
	}

	span.print-icon, span.print-icon::before, span.print-icon::after, button.print-button:hover .print-icon::after {
	box-sizing: border-box;
	background-color: #fff;
	}

	span.print-icon {
	position: relative;
	display: inline-block;  
	padding: 0;
	margin-top: 20%;

	width: 60%;
	height: 35%;
	background: #fff;
	border-radius: 20% 20% 0 0;
	}

	span.print-icon::before {
	content: " ";
	position: absolute;
	bottom: 100%;
	left: 12%;
	right: 12%;
	height: 110%;

	transition: height .2s .15s;
	}

	span.print-icon::after {
	content: " ";
	position: absolute;
	top: 55%;
	left: 12%;
	right: 12%;
	height: 0%;
	background: #fff;
	background-repeat: no-repeat;
	background-size: 70% 90%;
	background-position: center;
	background-image: linear-gradient(
		to top,
		#fff 0, #fff 14%,
		#333 14%, #333 28%,
		#fff 28%, #fff 42%,
		#333 42%, #333 56%,
		#fff 56%, #fff 70%,
		#333 70%, #333 84%,
		#fff 84%, #fff 100%
	);

	transition: height .2s, border-width 0s .2s, width 0s .2s;
	}

	button.print-button:hover {
	cursor: pointer;
	}

	button.print-button:hover .print-icon::before {
	height:0px;
	transition: height .2s;
	}
	button.print-button:hover .print-icon::after {
	height:120%;
	transition: height .2s .15s, border-width 0s .16s;
	}

	.cd-section {
    /* background-image: url(https://images.pexels.com/photos/3985296/pexels-photo-3985296.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260) !important; */
    background-image: url({{ asset('img/HappyNurse.png') }}) !important;
    background-repeat: no-repeat;
	background-size: cover;
	/* filter: hue-rotate(-15deg); */
	}


	strong {font-weight: bolder; font-size: 2rem;}
	div {color:#fff}
	/* .cd-modal-content > div > a {color : #e74e84;} */
	.cd-modal-content > div > a {color : #ff3f83;}

	.btn
	{
		background : #696bc6 !important;
		color : #fff !important;
	}


</style>


<!-- NAV -->



	<title>Dossier Medical</title>
</head>
<body>



	<header style="color : #fff ;background: #3F4079; background: -webkit-linear-gradient(to left, #827FFE, #3F4079);background: linear-gradient(to left, #827FFE, #3F4079);">
	    @foreach ($data as $key => $item)
		<h1 style="font-size: 2.5vw;">Dossier Medical : {{$item->Objet}}</h1>
		<input id="idc" value="{{$item->id}}" hidden></input>
		@endforeach	
	</header>

	<section class="cd-section" id="classToggle">


		<div class="cd-modal-action">
			<a href="#" class="btn" data-type="modal-trigger" id="btn" >Radio Analyse <i  class="fas fa-microscope" ></i></a>
			<span class="cd-modal-bg"></span>
		</div> <!-- cd-modal-action -->
		
		&nbsp;&nbsp;
        
        <div class="cd-modal-action">
			<a href="#" class="btn" data-type="modal-trigger" id="btn1">Rapport <strong><i class="fas fa-file-prescription" ></i></strong> </a>
			<span class="cd-modal-bg"></span>
		</div> <!-- cd-modal-action -->
		
		&nbsp;&nbsp;
        
        <div class="cd-modal-action">
			<a href="#" class="btn" data-type="modal-trigger" id="btn3">Ordonnance <strong><i class="fas fa-mortar-pestle" ></i></strong></a>
			<span class="cd-modal-bg"></span>
		</div> <!-- cd-modal-action -->
		
		&nbsp;&nbsp;
        
        <div class="cd-modal-action">
			<a href="#" class="btn" data-type="modal-trigger" id="btn2">Conseil <strong> <i class="fas fa-comment-medical" ></i> </strong></a>
			<span class="cd-modal-bg"></span>
		</div> <!-- cd-modal-action -->

		&nbsp;&nbsp;

        <div class="cd-modal-action">
			<a style="font-weight: 100 !important;" href="#" class="btn" data-type="modal-trigger" id="btn4">Controle / Consultation <strong><i class="fas fa-stethoscope"></i></strong></a>
			<span class="cd-modal-bg"></span>
		</div> <!-- cd-modal-action -->
		
		&nbsp;&nbsp;
        
        <div class="cd-modal-action">
			<a href="#" class="btn" data-type="modal-trigger" id="btn5">Redirection <strong><i class="fas fa-directions" ></i></strong></a>
			<span class="cd-modal-bg"></span>
		</div> <!-- cd-modal-action -->





		<div class="cd-modal" id="myDiv">
			<div class="cd-modal-content">
			    @foreach ($rapport as $key => $item)
				@if($item->isDeleted == 0)
					<p align="center">Titre: {{$item->titre}}</p>
					<p>
				        <!-- Description : {{$item->description}} -->
				        Description : 
								@php
									echo htmlspecialchars_decode($item->description);
								@endphp
			     	</p>

				@endif
				@endforeach	
				<!-- <button id="butt1" style="color:#fff" class="print-button" onclick="window.print()"><span class="print-icon"></br></br>Imprimer</button> -->
				<button id="butt1" style="color:#fff" class="print-button" onclick="myFunction() , window.print() "><span class="print-icon"></br></br>Imprimer</button>
			</div> <!-- cd-modal-content -->
        </div> <!-- cd-modal -->

        
        <div class="cd-modal" id="myDiv1">
			<div class="cd-modal-content">
			    @foreach ($RadioAnalyse as $key => $item)
				@if($item->isDeleted == 0)
					<p align="center">Titre : {{$item->titre}}</p>
					<p>
				    Description : {{$item->description}}
					</p>
					@if($item->type == 0)       
					    <p >Type : Analyse</p>
					@else
						<p >Type : Radio</p>
					@endif

					@isset($files)
					 @foreach ($files as $key => $fl)
					 @if($fl->isDeleted == 0)
					 @if($item->id == $fl->radioAnalyse_id)
					 <p>
					  <a href="{{$fl->src}}">Download</a>
			     	</p>
					@endif
					@endif
                    @endforeach	
					@endisset
				@endif
				@endforeach	
			</div> <!-- cd-modal-content -->
		</div> <!-- cd-modal -->
		
		<div class="cd-modal" id="myDiv2">
			<div class="cd-modal-content">
				@foreach ($Conseil as $key => $item)
				@if($item->isDeleted == 0)
				<div align="center">
					<audio controls>
                        <source src="{{$item->conseil}}" type="audio/ogg">
					</audio>
				</div>
				@endif
				@endforeach	
			</div> <!-- cd-modal-content -->
        </div> <!-- cd-modal -->

		<div class="cd-modal" id="myDiv3">
			<div class="cd-modal-content">
			    @foreach ($Ordennance as $key => $item)
				@if($item->isDeleted == 0)
					<p>
				        <!-- Médicaments : {{$item->medicamentsModeEmploi}} -->
				        Médicaments :
						@php
							echo htmlspecialchars_decode($item->medicamentsModeEmploi);
						@endphp
			     	</p>
				@endif
				@endforeach	
				<button style="color:#fff" class="print-button" onclick="window.print()"><span class="print-icon"></br></br>Imprimer</button>

			</div> <!-- cd-modal-content -->
        </div> <!-- cd-modal -->

		<div class="cd-modal" id="myDiv4">
			<div class="cd-modal-content">
			    @foreach ($Controle as $key => $item)
				@if($item->isDeleted == 0)
				    @if($item->type == 0)       
					    <p align="center">Type : Cnotrole</p>
					@else
						<p align="center">Type : Consultation</p>
					@endif					
					<p>
				        Date : {{$item->dateControleConsultation}}
			     	</p>
				@endif
				@endforeach	
			</div> <!-- cd-modal-content -->
        </div> <!-- cd-modal -->

		<div class="cd-modal" id="myDiv5">
			<div class="cd-modal-content">
			    @foreach ($Redirection as $key => $item)
				@if($item->isDeleted == 0)
					<p align="center">Spécialité : {{$item->nomSpecialite}}</p>
					<p>
				        Description : {{$item->description}}
			     	</p>
				@endif
				@endforeach	
			</div> <!-- cd-modal-content -->
        </div> <!-- cd-modal -->
        

		<a href="#" class="cd-modal-close">Close</a>

    </section> <!-- .cd-section -->
    

    

<script src="{{asset('js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('js/velocity.min.js')}}"></script>
<script src="{{asset('js/main1.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    $('#btn').click(function(){
		$('#myDiv').hide();
		$('#myDiv2').hide();
		$('#myDiv3').hide();
		$('#myDiv4').hide();
	 $('#myDiv5').hide();
	 $('#myDiv1').show();
	 
	});
	
	$('#btn1').click(function(){
		$('#myDiv').show();
	 $('#myDiv1').hide();
	 $('#myDiv2').hide();
	 $('#myDiv3').hide();
	 $('#myDiv4').hide();
	 $('#myDiv5').hide();
	});

	$('#btn2').click(function(){
	 $('#myDiv2').show();
	 $('#myDiv').hide();
	 $('#myDiv1').hide();
	 $('#myDiv3').hide();
	 $('#myDiv4').hide();
	 $('#myDiv5').hide();
	});

	$('#btn3').click(function(){
	 $('#myDiv3').show();
	 $('#myDiv').hide();
	 $('#myDiv1').hide();
	 $('#myDiv2').hide();
	 $('#myDiv4').hide();
	 $('#myDiv5').hide();
	});

	$('#btn4').click(function(){
	 $('#myDiv4').show();
	 $('#myDiv').hide();
	 $('#myDiv1').hide();
	 $('#myDiv2').hide();
	 $('#myDiv3').hide();
	 $('#myDiv5').hide();
	});

	$('#btn5').click(function(){
	 $('#myDiv5').show();
	 $('#myDiv').hide();
	 $('#myDiv1').hide();
	 $('#myDiv2').hide();
	 $('#myDiv3').hide();
	 $('#myDiv4').hide();
	});
	
</script>

<script>

$(document).on("click", '#btn2', function (){
                var id = $("#idc").val();
                read(id);


        function read(id){
        // alert(" t = " + t + " d = " + d + " id = " + id);

        axios.put('rdmp3', {
            id:id,
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
    };
});
</script>


<script src="https://kit.fontawesome.com/47fac39c42.js" crossorigin="anonymous"></script>

<script>
function myFunction() {
  var x = document.getElementById("butt1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

</body>
@include('langagues')
</html>