


<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>Historique</title>

  <!-- Custom fonts for this template -->
  <link href="{{asset('css/all.min.css')}}" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  


  <!-- Custom styles for this template -->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">


  <!-- Custom styles for this page -->
  <link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<!-- styyle for dataTable -->
  <style>   
  .select-css {
    display: block;
    font-size: 16px;
    font-family: sans-serif;
    font-weight: 700;
    color: #444;
    line-height: 1.3;
    
    padding: .6em 1.4em .5em .8em;
    width: 90%;
    max-width: 100%; /* useful when width is set to anything other than 100% */
    box-sizing: border-box;
    margin: 50px;
    border: 1px solid #aaa;
    box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
    border-radius: .5em;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    background-color: #fff;
    /* note: bg image below uses 2 urls. The first is an svg data uri for the arrow icon, and the second is the gradient. 
        for the icon, if you want to change the color, be sure to use `%23` instead of `#`, since it's a url. You can also swap in a different svg icon or an external image reference
        
    */
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
      linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
    background-repeat: no-repeat, repeat;
    /* arrow icon position (1em from the right, 50% vertical) , then gradient position*/
    background-position: right .7em top 50%, 0 0;
    /* icon size, then gradient */
    background-size: .65em auto, 100%;
  }
      /* Hide arrow icon in IE browsers */
      .select-css::-ms-expand {
          display: none;
      }
      /* Hover style */
      .select-css:hover {
          border-color: #888;
      }
      /* Focus style */
      .select-css:focus {
          border-color: #aaa;
          /* It'd be nice to use -webkit-focus-ring-color here but it doesn't work on box-shadow */
          box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
          box-shadow: 0 0 0 3px -moz-mac-focusring;
          color: #222; 
          outline: none;
      }

      /* Set options to normal weight */
      .select-css option {
          font-weight:normal;
      }

      /* Support for rtl text, explicit support for Arabic and Hebrew */
      *[dir="rtl"] .select-css, :root:lang(ar) .select-css, :root:lang(iw) .select-css {
          background-position: left .7em top 50%, 0 0;
          padding: .6em .8em .5em 1.4em;
      }

      /* Disabled styles */
      .select-css:disabled, .select-css[aria-disabled=true] {
          color: graytext;
          background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22graytext%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
            linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
      }

      .select-css:disabled:hover, .select-css[aria-disabled=true] {
          border-color: #aaa;
      }

  </style>


<!-- removing shadows -->
  <style>
      body {color : black}
      .text-gray-600 {color: black !important;}
      .shadow { box-shadow: none !important;}
      #wrapper #content-wrapper {background-color: #fff;}
  </style>
<!-- my own colors -->
<style>
  .bg-gradient-primary {background-color: #234BBF !important;}
  #content { background : rgb(237, 240, 245)}
  .btn-primary {background-color: rgb(35,75,191) !important;}
  .page-item.active .page-link { background-color: rgb(35,75,191) !important; }
  .select-css { background: #fff !important; color:#234BBF !important; border: 0px solid red;     border-radius: 0px;}
  .select-css:focus { box-shadow: 0 0 0px 2px rgb(255, 0, 0);}
</style>


<!-- imported styling -->




</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        <img src="{{asset('img/dosssswhite.png')}}"></img>
        </div>
        <div class="sidebar-brand-text mx-3">FEML</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="/medcine/homeMS">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Go Back to Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">





    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <div class="input-group-append">

                           <h3 style="font-family: courier,arial,helvetica; font-size: 2vw">
                             Consulter / Modiffier Les Dossiers Médicaux
                           </h3> 

              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @foreach ($nom as $key => $item)
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$item->nom}} {{$item->prenom}}</span>
                <img class="img-profile rounded-circle" src="{{$item->src}}">
              @endforeach
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item"  href="/profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
              </div>
            </li>

          </ul>

        </nav>

    <input id="rsv" type="number" value="{{$id}}" hidden>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
    <form action="" method="post" id="sp">
    @csrf

    @foreach ($data as $key => $item)
    <input class="form-control{{ $errors->has('patient') ? ' is-invalid' : '' }}" id="idsp" type="number"  name="patient" value="{{$item->patient}}" hidden>
    @endforeach

    @if ($errors->has('patient'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('patient') }}</strong>
                </span>
    @endif

    
    <select class="select-css form-control{{ $errors->has('spe') ? ' is-invalid' : '' }}" id="spe" name="spe"  >
    <option>--Select One--</option>
    @foreach ($data as $key => $item)
            <option>{{$item->nom}}</option>
    @endforeach

    </select>

    
    @if ($errors->has('spe'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('spe') }}</strong>
                </span>
    @endif

    <button type="submit" class="btn btn-primary" hidden>
                        {{ __('Post') }}
    </button>
    </form>

        <div class="container-fluid">



          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Les Dossiers Médicaux de : <span id="target"></span></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Object</th>
                      <th>AnalyseRequis</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                     <tr>
                      <th>ID</th>
                      <th>Object</th>
                      <th>AnalyseRequis</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody id='tbd'>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>


        <div class="container-fluid">



<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Medicaments Etulisé Sans Ordenances : </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered display" id="dataTable2" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nom du Medicament</th>
            <th>Acheté le</th>
            <th>Pharmacien</th>
          </tr>
        </thead>
        <tfoot>
           <tr>
              <th>Nomdu Medicament</th>
              <th>Acheté le</th>
              <th>Pharmacien</th>
          </tr>
        </tfoot>
        <tbody >
        @foreach ($meds as $key => $item)
        <tr>
            <td>{{$item->Nom}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->pharmacien}}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


  <!-- Core plugin JavaScript-->
  <script src="{{asset('js/jquery.easing.min.js')}}"></script>


  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>


  <!-- Page level plugins -->
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

  <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>


  <!-- Page level custom scripts -->
  <script src="{{asset('js/datatables-demo.js')}}"></script>

  

<script>

$(document).ready(function() {
  $('#spe').on('change', function() {
    var $form = $(this).closest('form');
    $form.find('button[type=submit]').click();
  });
});


function TargetChanger(x , y)
{
  $('#target').html(x+" " + y) ;
}


    function thisGetdossiers(response)
    {

                console.log(response.data.dmss);
                var myTable = $('#dataTable1').DataTable();
                myTable.clear().draw();
                var arr = response.data.dmss;
                TargetChanger(arr[0].nom ,arr[0].prenom );
                var tr;
                for (var i = 0; i < arr.length; i++) {
                  console.log(arr[i].id);
                  if(arr[i].medcine == $('#rsv').val() && !arr[i].dateFin) {
                  myTable.row.add(
                  [
                     arr[i].id,
                     arr[i].objet,
                     arr[i].analyseRequis,
                     '<form action="/mdf" method="post" id="spp"><input value=' + arr[i].id + ' name="id" hidden><button type="submit" class="btn btn-primary" >Modifier</button></form>'
                  ]
                 ).draw();
                }
                else {
                  myTable.row.add(
                  [
                     arr[i].id,
                     arr[i].objet,
                     arr[i].analyseRequis,
                     '<form action="/cnslt" method="post" id="spp"><input value=' + arr[i].id + ' name="id" hidden><button type="submit" class="btn btn-primary" >Consulter</button></form>'
                  ]
                 ).draw();
                }
              }
    }
 


    document.getElementById('sp').addEventListener('submit', performPostRequest);
    function performPostRequest(e) {
        var nom = document.getElementById('spe').value;
        var id = document.getElementById('idsp').value;

        
        axios.post('DMS', {
            nom : nom,
            id : id
        })
        .then(function (response) {
            console.log('response = ');
            console.log(response);
            thisGetdossiers(response);            
        })
        .catch(function (error) {
            console.log(error);
        });
        e.preventDefault();
    }
</script>

<script>
  $(document).ready(function() {
    $('table.display').DataTable();
  });
</script>


</body>
@include('langagues')
</html>