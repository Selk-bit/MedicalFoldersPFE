<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title></title>
	

  <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
	
  <!-- Bootstrap core CSS-->
  <link href="{{asset('resrs/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="{{asset('resrs/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="{{asset('resrs/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <link href="{{asset('resrs/vendor/dropzone.css')}}" rel="stylesheet">
  <!-- Main styles -->
  <link href="{{asset('resrs/css/admin.css')}}" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="{{asset('resrs/css/admin.css')}}" rel="stylesheet">
	

  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/menu.css')}}" rel="stylesheet">
	<link href="{{asset('css/vendors.css')}}" rel="stylesheet">
	<link href="{{asset('css/icon_fonts/css/all_icons_min.css')}}" rel="stylesheet">

<style>
  .btn-primary {border-color: #ffffff !important;}
</style>

<!-- home page style -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/menu.css')}}" rel="stylesheet">
	<link href="{{asset('css/vendors.css')}}" rel="stylesheet">
	<link href="{{asset('css/icon_fonts/css/all_icons_min.css')}}" rel="stylesheet">

</head>

<body class="sticky-footer" id="page-top" style="background: rgb(246, 246, 246)">
  
  <div class="col-md-8 mx-auto" style="margin-top:4%;">
    <div class="container-fluid" >
      <!-- Breadcrumbs-->
      <ol class="breadcrumb" style="background: #fff">
        <li class="breadcrumb-item">
        <!-- <a href="/medcine/homeMS">Dashboard</a> -->
        <script>
          document.write('<a href="' + document.referrer + '">Dashboard</a>');
      </script>
        </li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2  style="color:#3F4079 !important"><i style="color:#3F4079 !important" class="fa fa-user"></i>Profile details</h2>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
                    <label>Votre Image de Profile</label>
                        <form action="{{ route('profile')}}" method="post"  class="dropzone" enctype="multipart/form-data">
                        @csrf
                            <div class="mx-auto" style="width: 80px;" >
                                <label id="editLink" for="image" style="color:red" ><strong>Edit Image</strong></label>
                            </div>
                            <input type="file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg" required>
                            <img id="output" src="{{$data->src}}" alt="" height="120" class="col-md-12 mx-auto">
                            <button id="subButton" type="submit" class="btn btn-primary A mx-auto col-md-12" style="background:#234BBF; color:white; margin-top:10px;">
                                Confirmer
                            </button>
                        </form>
				    </div>
				</div>
				<div class="col-md-8 add_top_30">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
              @if($data->role_id == 1)
                  <label>CIN</label>
                    @if($age > 18)       
                        @if(strlen($data->name) > 8 )         
                            <input id="cin" type="text" class="form-control" placeholder="{{$data->name}}" >
                            <p id="controller" style="color:red">Please Update You CIN</p>
                        @else
                            <input type="text" class="form-control" placeholder="{{$data->name}}" disabled>
                        @endif
                    @else
                        <input type="text" class="form-control" placeholder="{{$data->name}}" disabled>
                    @endif
              @else
                  <label>INP</label>
                  <input type="text" class="form-control" placeholder="{{$data->name}}" disabled>
              @endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Age</label>
                                <input type="text" class="form-control" placeholder="{{$age}} ans" disabled>

							</div>
						</div>
					</div>
					<!-- /row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nom</label>
								<input  id="nom" type="text" class="form-control nomPrenom"  value="{{$data->nom}}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Prenom</label>
								<input id="prenom" type="text" class="form-control nomPrenom"  value="{{$data->prenom}}">
							</div>
						</div>
					</div>
					<!-- /row-->
				</div>
			</div>
		</div>
		
    <footer>
      <div class="container">
        <div class="text-center">
          <small>Copyright © Pour Un Mailleur Maroc  {{date("Y")}}</small>
        </div>
      </div>
    </footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

<script>
// nom et prenom changer 
    $(document).on('focusout','.nomPrenom',function(){

            let nom = $("#nom").val();
            let prenom = $("#prenom").val();

            if(nom.length != 0 && prenom.length != 0)
            { 
              updater(); 
            }else{ 
              Swal.fire({ icon: 'error',title: 'Oops...',text: 'The fields nom and prenom cannot be empty'});
            }

            function updater(x){
                axios.put('/profilenp', {
                  nom:nom,
                  prenom : prenom
                })
                .then(function (response) {
                    console.log(response);
                    Swal.fire({ position: 'top-end', icon: 'success', title: 'records successfully updated', showConfirmButton: false, timer: 1500 });
                })
                .catch(function (error) {
                    console.log(error);
                });
            };
        })
// end nom et prenom changer


// cin changer 

    $(document).on('focusout','#cin',function(){
            var str = $("#cin"). val();
            // console.log('str.length =' + str.length)
            str.length == 8 ? ReadyToPost() : Swal.fire({ icon: 'error',title: 'Oops...',text: 'The CIN Lenght Should be 8 characters '});
  
            function ReadyToPost()
            {
              $('#controller').css('visibility','hidden');
              updater(str);
            }
        })

    function updater(x){
        axios.put('/profile', {
            name:x,
        })
        .then(function (response) {
            console.log(response);
            Swal.fire({ position: 'top-end', icon: 'success', title: 'records successfully updated', showConfirmButton: false, timer: 1500 });
        })
        .catch(function (error) {
            console.log(error);
        });
    };

// end cin changer

document.getElementById("subButton").addEventListener("click", performPostRequest);
function performPostRequest(e) 
{
    e.preventDefault();
  
    let form = new FormData();
    let files = $('#image')[0].files[0];
    form.append('file',files);
    let x = document.getElementById("image").value;
    let flg;
    switch (getFileExtension(x))
    {
      case 'jpeg':
        flg =true;
        break;
      case 'png':
        flg =true;
        break;
      case 'jpg':
        flg =true;
        break;
      default:
      flg =false;
      Swal.fire({ icon: 'error',title: 'Oops...',text: 'Sorry Only jpeg,png,jpg are Supported'});
    }
    flg ? axiosPost() : 1;
    
    function axiosPost()
    {
      let response = axios({ method: 'post', url: 'profile', data: form });
      Swal.fire({ position: 'top-end', icon: 'success', title: 'Profile successfully uploaded', showConfirmButton: false, timer: 1500 })
    }

    function getFileExtension(filename) 
      {
        return filename.split('.').pop();
      }
}

$('document').ready(function () {

    $("#image").change(function () {
      let x = document.getElementById("image").value
      let flg;
      switch (getFileExtension(x)) 
      {
      case 'jpeg':
        flg = true;
        break;
      case 'png':
        flg = true;
        break;
      case 'jpg':
        flg = true;
        break;
      default:
      flg = false;
      Swal.fire({ icon: 'error',title: 'Oops...',text: 'Sorry Only jpeg,png,jpg are Supported'});
    }

      function getFileExtension(filename) 
      {
        return filename.split('.').pop();
      }

      if(flg){
        if(this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#output').attr('src', e.target.result);
          }
          reader.readAsDataURL(this.files[0]);
        }
      }
    });
    });


</script>

</body>
@include('langagues')
</html>
