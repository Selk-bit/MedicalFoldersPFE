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
    <link href="{{asset('css/main.css')}}" rel="stylesheet">

	
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .row{margin-left :0px;}
        body{font-family: 'Roboto Mono', monospace;}
        .form-control:focus {
            border-color: red !important;
        }        
        .form-control:focus {
            box-shadow: 0 0 0 0rem rgba(0,0,0,0) !important; 
        }

        .focus, :focus {
            outline: 0;
            box-shadow: 0 0 0 0rem rgba(0,0,0,0);
        }

        button:hover {
            color: #fff !important;
        }
        .btn-link:hover {
            text-decoration: red;
            background-color: #6D6CD5;
            border-color: transparent;
        }

        .btn-outline-secondary:hover {
            background-color: #6D6CD5;
            border-color: #fff;
        }
    </style>

<style>
textarea.d {
    width: 38rem;
}
</style>


</head>
<body style="background:rgb(246, 246, 246)">

<div id="navsp" ></div>
<!-- <div id="nav"></div> -->
<div style="background:#fff" class="col-md-12"></br></div>
<div class="col-md-12" style="background: #3F4079; background: -webkit-linear-gradient(to left, #827FFE, #3F4079);background: linear-gradient(to left, #827FFE, #3F4079);" >
    </br></br>
            <div style="width: 100%;" ><h2 style="color:#fff;width: 50%; margin: 0 auto 0 auto;text-align: center;">Panaux de Controle</h2></div>
    </br></br>
</div>

<div class="d-flex justify-content-center mt-2"><a href="javascript:history.back()" class="col-md-4 btn btn-outline-success">Go Back to Dashboard</a></div>
        
<div class="container col-md-10">
<div class="card" style="margin-top:25px;">
@foreach ($objet as $key => $item)
  <h5 class="card-header" style="background:white; color: #3F4079"><i class="fas fa-folder-open"></i> : {{$item->Objet}}</h5>
  @endforeach	
  <div class="card-body">
    </div>
    <div class="mx-auto col-md-9" style="padding-bottom: 20px">
        <div class="row mx-auto" style="margin-top: 20px;">
            <button class="col-md-4 btn btn-outline-secondary" style="font-size: 1.65vw; color:#3F4079" data-toggle="modal" data-target="#exampleModal1" ><strong>Radio-Analyse <i class="fas fa-microscope" ></i></strong></button>
            <div class="col-md-1"></div>
            <button class="col-md-3 btn btn-outline-secondary" style="font-size: 1.65vw; color:#3F4079" data-toggle="modal" data-target="#exampleModal2"><strong>Rapport <i class="fas fa-file-prescription" ></i></strong></button>
            <div class="col-md-1"></div>
            <button class="col-md-3 btn btn-outline-secondary ml-auto" style="font-size: 1.5vw; color:#3F4079 " data-toggle="modal" data-target="#exampleModal3" > <strong>Redirection <i class="fas fa-directions" ></i></strong></button>
        </div>
            </br>
        <div class="row mx-auto">
            <div class="col-md-1"></div>
            <button class="col-md-4 btn btn-outline-secondary" style="font-size: 1.65vw; color:#3F4079"  data-toggle="modal" data-target="#exampleModal4" id="bannedMeds"><strong>Ordennance <i class="fas fa-mortar-pestle" ></i></strong></button>
            <div class="col-md-1"></div>
            <button class="col-md-4 btn btn-outline-secondary ml-auto" style="font-size: 1.65vw; color:#3F4079 "  data-toggle="modal" data-target="#exampleModal5"><strong>Conseil <i class="fas fa-comment-medical" ></i> </strong></button>
            <div class="col-md-1"></div>
        </div>
            </br>
        <div class="row"></div>
        <div class="row mx-auto">
            <div class="col-md-1"></div>
            <button class="col-md-6 btn btn-outline-secondary mx-auto"  style="font-size: 1.3vw; color:#3F4079 " data-toggle="modal" data-target="#exampleModal6" ><strong>Controle-Nouvelle Consultation <i class="fas fa-stethoscope"></i></strong></button>
            <div class="col-md-1"></div>
        </div>
    </div>  
</div>    
  </div>



<!-- importing modals -->
<!-- Radio anamlsye -->
@include('dossierMedicale.patient.modals.radioAnalyse')
<!-- rapport -->
@include('dossierMedicale.patient.modals.rapport')
<!-- redirection -->
@include('dossierMedicale.patient.modals.redirection')
<!-- ordenance -->
@include('dossierMedicale.patient.modals.ordenance')
<!-- conseil -->
@include('dossierMedicale.patient.modals.conseil')
<!-- controle consultation -->
@include('dossierMedicale.patient.modals.ccc')


<div class="accordion mx-auto col-md-8" id="accordionExample" style="margin-bottom: 5vw">
<hr>
  <div class="card"  data-aos="fade-down">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Radio - Analyse de ce Dossier       
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        @include('dossierMedicale.patient.modals.raTable') 
      </div>
    </div>
  </div>



  <div class="card" data-aos="fade-left">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Rapport de ce Dossier
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        @include('dossierMedicale.patient.modals.rTable') 
        </div>
    </div>
  </div>
  <div class="card"  data-aos="fade-right">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Redirection de ce Patient
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      @include('dossierMedicale.patient.modals.reTable') 
      </div>
    </div>
  </div>

  <div class="card"  data-aos="fade-left">
    <div class="card-header" id="heading4">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
          Les Ordenances de ce Dossier
        </button>
      </h2>
    </div>
    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
      <div class="card-body">
      @include('dossierMedicale.patient.modals.oTable')
      </div>
    </div>
  </div>


    <div class="card"  data-aos="fade-up">
    <div class="card-header" id="heading5">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
          Les Controles et Nouveax Consultations de ce Dossier
        </button>
      </h2>
    </div>
    <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
      <div class="card-body">
        @include('dossierMedicale.patient.modals.ccctable')
      </div>
    </div>
  </div>


  <div class="card"  data-aos="fade-up">
    <div class="card-header" id="heading6">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
          Les Conseils de ce Dossier
        </button>
      </h2>
    </div>
    <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionExample">
      <div class="card-body">
        @include('dossierMedicale.patient.modals.conseilTable')
      </div>
    </div>
  </div>


<!-- closing the folder section -->


<hr>
<div class="container">
    <div class="jumbotron jumbotron-fluid" style="background: #fff" data-aos="zoom-in-up">
        <h3 class="display-6">Validation et Fermeture de ce Dossier</h3>
        <p class="lead">Pas Besoin d'une Consultation ou un Controle? Fermer ce Dossier :</p>
    <div class="d-flex justify-content-center mt-2">
        <a class="col-md-5 btn btn-outline-danger" 
            onMouseOver="this.style.color='white'" 
            onMouseOut="this.style.color='red'" 
            style="color:red" 
            id="del"
        >Valider et Fermer ce Dossier</a>
    </div>
    </div>
</div>


</div>


<!-- fermetrure dossier Medciale -->
<script>
    // document.getElementById('del').addEventListener('submit', performPostRequest);
    document.getElementById("del").addEventListener("click", performPostRequest);
    function performPostRequest(e) {
        var id = document.getElementById('idra').value;        
        var today = new Date();
        var dd = today.getDate();

        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();
        if(dd<10) 
        {
            dd='0'+dd;
        } 

        if(mm<10) 
        {
            mm='0'+mm;
        } 
        today = yyyy+'-'+mm+'-'+dd;
        axios.put('CreateCDM', {
            id:id,
            dateFin: today,
        })
        .then(function (response) {
            console.log(response);            
        })
        .catch(function (error) {
            console.log(error);
        });
        e.preventDefault();
        Swal.fire({position: 'top-end',icon: 'success',title: 'Your work has been saved',showConfirmButton: false,timer: 1500})
    }
    
</script>

  










<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<!-- raAxios -->
<script>
     function thisGetRadioAnalyse()
    {
        $.ajax({
            type: "GET",
            url: '/RA/{{$id}}',
            success:function(response){
                var data = response.RadioAnalyse;
                var tr, X , Y = 'Analyse' , Z = 'Radio';
                for (var i = 0; i < data.length; i++) {
                    tr = $('<tr class="trra">');
                    data[i].type ==  0 ? X = Y: X = Z;
                    tr.append("<td data-label='ID'><input id='k' value='" + data[i].id + "' disabled></td>");
                    data[i].type ==  0 ? tr.append("<td data-label='Type'><select class='ty' ><option value='" + 0 + "'>" + Y + "</option><option value='"+ 1 + "'>" + Z + "</option></select></td>") : tr.append("<td data-label='Type'><select class='ty' ><option value='" + 1 + "'>" + Z + "</option><option value='"+ 0 + "'>" + Y + "</option></select></td>");
                    tr.append("<td data-label='Titre'><input value='" + data[i].titre + "' class='t'></td>");
                    tr.append("<td data-label='Description'><textarea class='d'>" + data[i].description + "</textarea ></td>");
                    tr.append("<td data-label='Action'><button class='btns btn btn-outline-danger'>Supprimer</button></td>");
                    tr.append("</tr>");
                }
                    $('#racontent').append(tr);
            }
        });
    }
 
    $( "#click" ).click(function() {
        thisGetRadioAnalyse();
    });

    document.getElementById('ra').addEventListener('submit', performPostRequest);
    function performPostRequest(e) {
        var id = document.getElementById('idra').value;
        var objet = document.getElementById('objetra').value;
        var type = document.getElementById('typera').value;
        var titre = document.getElementById('titrera').value;
        var description = document.getElementById('descriptionra').value;
        
        axios.post('CRA', {
            id:id,
            objet: objet,
            type: type,
            titre: titre,
            description: description
        })
        .then(function (response) {
            console.log(response);
            thisGetRadioAnalyse();            
        })
        .catch(function (error) {
            console.log(error);
        });
        e.preventDefault();
        Swal.fire({position: 'top-end',icon: 'success',title: 'Your work has been saved',showConfirmButton: false,timer: 1500})

    }
    
    $(document).on('focusout','.trra',function(){
            var ty = $(this).find(".ty" ).val();
            var t = $(this).find(".t" ).val();
            var d = $(this).find(".d" ).val();
            // alert("ty = ");
            // alert(ty);
            // alert('t = ');
            // alert(t);
            // alert("d = ");
            // alert(d);

            var id = $(this).find("input").val();
            // alert('id = ');
            // alert(id);
            updatera(ty , t , d , id);
        })

    function updatera(ty , t , d , id){
        // alert('ty = ' + ty + " t = " + t + " d = " + d + " id = " + id);

        axios.put('CRA', {
            id:id,
            type: ty,
            titre: t,
            description: d
        })
        .then(function (response) {
            console.log(response);
            Swal.fire({ position: 'top-end', icon: 'success', title: 'records successfully updated', showConfirmButton: false, timer: 1500 })
        })
        .catch(function (error) {
            console.log(error);
        });
    };

    
    $(document).on("click", '.btns', function (){
                var id = $(this).closest("td").closest("tr").find("#k").val();
                $(this).closest("td").closest("tr").hide();
                alert(id);
                supprimer(id);


        function supprimer(id){
        // alert(" t = " + t + " d = " + d + " id = " + id);

        axios.put('CRADelete', {
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

 $(document).on("click", '#rdr', function (){
                var id = $(this).closest("td").find("input[id='idrd']").val();
                console.log(id);
                read(id);


        function read(id){
        // alert(" t = " + t + " d = " + d + " id = " + id);

        axios.put('rdrd', {
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


<!-- rapport axios -->
<script>
    function thisGetRapport()
    {
        $.ajax({
            type: "GET",
            url: '/R/{{$id}}',
            success:function(response){
              console.log(response);
                var data = response.rapports;
                // console.log(data.length);
                for (var i = 0; i < data.length; i++) {
                    tr = $('<tr class="trr">');
                    tr.append("<td data-label='ID'><input id='h' value='" + data[i].id + "' disabled></td>");
                    tr.append("<td data-label='Titre'><input value='" + data[i].titre + "' class='t'></td>");
                    tr.append("<td data-label='Rapport'><textarea class='d'>" + data[i].description + "</textarea ></td>");
                    tr.append("<td data-label='Action'><button class='btnsr btn btn-outline-danger'>Supprimer</button></td>");
                    tr.append("</tr>");
                }
                    $('#rcontent').append(tr);
            }
        });
    }
 
    document.getElementById('r').addEventListener('submit', postr);
    function postr(e) {
        var id = document.getElementById('idr').value;
        var objet = document.getElementById('objetr').value;
        var titreR = document.getElementById('titrer').value;
        var description = document.getElementById('descriptionr').value;

        axios.post('rapportCreate', {
            id:id,
            objet: objet,
            titreR: titreR,
            description: description
        })
        .then(function (response) {
            console.log(response);
            thisGetRapport();            
        })
        .catch(function (error) {
            console.log(error);
        });
        e.preventDefault();
        Swal.fire({position: 'top-end',icon: 'success',title: 'Your work has been saved',showConfirmButton: false,timer: 1500})
    }
    
    $(document).on('focusout','.trr',function(){
            // var ty = $(this).find(".ty" ).val();
            var t = $(this).find(".t" ).val();
            var d = $(this).find(".d" ).val();
            // alert(ty);
            // alert(t);
            // alert(d);

            var id = $(this).find("input").val();
            // alert(id);
            updater( t , d , id);
        })

    function updater( t , d , id){
        // alert(" t = " + t + " d = " + d + " id = " + id);

        axios.put('rapportCreate', {
            id:id,
            titre: t,
            description: d
        })
        .then(function (response) {
            console.log(response);
            Swal.fire({ position: 'top-end', icon: 'success', title: 'records successfully updated', showConfirmButton: false, timer: 1500 })
        })
        .catch(function (error) {
            console.log(error);
        });
    };


    $(document).on("click", '.btnsr', function (){
                var id = $(this).closest("td").closest("tr").find("#h").val();
                $(this).closest("td").closest("tr").hide();
                alert(id);
                supprimer(id);


        function supprimer(id){
        // alert(" t = " + t + " d = " + d + " id = " + id);

        axios.put('rapportDelete', {
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

<!-- rediction axios -->
<script>
    function thisGetRedirection()
    {
        $.ajax({
            type: "GET",
            url: '/RE/{{$id}}',
            success:function(response){
              console.log(response);
                var data = response.redirections;
                // console.log(data.length);
                for (var i = 0; i < data.length; i++) {
                    tr = $('<tr class="trre">');
                    tr.append("<td data-label='ID'><input id='j' value='" + data[i].id + "' disabled></td>");
                    tr.append("<td data-label='Spécialité'><input value='" + data[i].nomSpecialite + "' disabled></td>");
                    tr.append("<td data-label='Description'><textarea class='d'>" + data[i].description + "</textarea ></td>");
                    tr.append("<td data-label='Action'><button class='btnsre btn btn-outline-danger'>Supprimer</button ></td>");
                    tr.append("</tr>");
                }
                    $('#recontent').append(tr);
            }
        });
    }
 
    document.getElementById('re').addEventListener('submit', postre);
    function postre(e) {
        var id = document.getElementById('idr').value;
        var objet = document.getElementById('objetr').value;
        var Specialite = document.getElementById('Specialitere').value;
        var description = document.getElementById('descriptionre').value;

        axios.post('CR', {
            id:id,
            objet: objet,
            Specialite: Specialite,
            description: description
        })
        .then(function (response) {
            console.log(response);
            thisGetRedirection();            
        })
        .catch(function (error) {
            console.log(error);
        });
        e.preventDefault();
        Swal.fire({position: 'top-end',icon: 'success',title: 'Your work has been saved',showConfirmButton: false,timer: 1500})

    }
    
    $(document).on('focusout','.trre',function(){
            // var ty = $(this).find(".ty" ).val();
            // var t = $(this).find(".t" ).val();
            var d = $(this).find(".d" ).val();
            // alert(ty);
            // alert(t);
            // alert(d);

            var id = $(this).find("input").val();
            // alert(id);
            updatere(d , id);
        })

    function updatere(d , id){
        // alert(" d = " + d + " id = " + id);

        axios.put('CR', {
            id:id,
            // titre: t,
            description: d
        })
        .then(function (response) {
            console.log(response);
            Swal.fire({ position: 'top-end', icon: 'success', title: 'records successfully updated', showConfirmButton: false, timer: 1500 })
        })
        .catch(function (error) {
            console.log(error);
        });
    };

    $(document).on("click", '.btnsre', function (){
                var id = $(this).closest("td").closest("tr").find("#j").val();
                $(this).closest("td").closest("tr").hide();
                alert(id);
                supprimer(id);


        function supprimer(id){
        // alert(" t = " + t + " d = " + d + " id = " + id);

        axios.put('CRDelete', {
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

<!-- ordenance axios -->
<script>
    let globaleBannedMeds;

        $( "#bannedMeds" ).click(function() {
            $.ajax({
                    type: "GET",
                    url: '/bannedMeds',
                    success:function(response){
                        console.log(response);
                        const data = response.bms;
                        globaleBannedMeds = response.bms;
                    }
            });
        });

    function isBanned(str , bm)
    {
    for(var i = 0 ; i < bm.length ; i++){
            var res = str.match(bm[i].nom);
            // res ? alert('Le Medicament: ``' + bm[i].nom + '`` est en Repture') : 1;
            res ? Swal.fire({ icon: 'error', title: 'Medicament en Repture', text: 'le `' + bm[i].nom + '` est en repture', footer: 'essayer un autre medicament'}) : 1;
    }
    }

    $(document).ready(function(){
        $("#medicamentsModeEmploio").keyup(function(){
            var val = $(this).val();
            isBanned(val , globaleBannedMeds);
        });
    });

    function thisGetMME()
        {
            $.ajax({
                type: "GET",
                url: '/OM/{{$id}}',
                success:function(response){
                console.log(response);
                    var data = response.ordennance_medicals;
                    // console.log(data.length);
                    for (var i = 0; i < data.length; i++) {
                        tr = $('<tr class="tro">');
                        tr.append("<td data-label='ID'><input id='l' value='" + data[i].id + "' disabled></td>");
                        tr.append("<td data-label='Description'><textarea class='d'>" + data[i].medicamentsModeEmploi + "</textarea ></td>");
                        tr.append("<td data-label='Action'><button class='btnso btn btn-outline-danger'>Supprimer</button ></td>");
                        tr.append("</tr>");
                    }
                        $('#ocontent').append(tr);
                }
            });
        }
    
        document.getElementById('o').addEventListener('submit', posto);
        function posto(e) {
            var id = document.getElementById('ido').value;
            var objet = document.getElementById('objeto').value;
            var medicamentsModeEmploi = document.getElementById('medicamentsModeEmploio').value;

            axios.post('COMME', {
                id:id,
                objet: objet,
                medicamentsModeEmploi: medicamentsModeEmploi,
            })
            .then(function (response) {
                console.log(response);
                thisGetMME();            
            })
            .catch(function (error) {
                console.log(error);
            });
            e.preventDefault();
            Swal.fire({position: 'top-end',icon: 'success',title: 'Your work has been saved',showConfirmButton: false,timer: 1500})

        }
        
        $(document).on('focusout','.tro',function(){
                // var ty = $(this).find(".ty" ).val();
                // var t = $(this).find(".t" ).val();
                var d = $(this).find(".d" ).val();
                // alert(ty);
                // alert(t);
                // alert(d);

                var id = $(this).find("input").val();
                // alert(id);
                updateo(d , id);
            })

        function updateo(d , id){
            // alert(" d = " + d + " id = " + id);

            axios.put('COMME', {
                id:id,
                // titre: t,
                medicamentsModeEmploi: d
            })
            .then(function (response) {
                console.log(response);
                Swal.fire({ position: 'top-end', icon: 'success', title: 'records successfully updated', showConfirmButton: false, timer: 1500 })
            })
            .catch(function (error) {
                console.log(error);
            });
        };

    $(document).on("click", '.btnso', function (){
                var id = $(this).closest("td").closest("tr").find("#l").val();
                $(this).closest("td").closest("tr").hide();
                alert(id);
                supprimer(id);


        function supprimer(id){
        // alert(" t = " + t + " d = " + d + " id = " + id);

        axios.put('COMMED', {
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

      <script src="./../../js/app.js" ></script>


<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script> -->

    <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('js/common_scripts.min.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- <button id="startRecordingButton">Start recording</button>
    <button id="stopRecordingButton">Stop recording</button>
    <button id="playButton">Play</button>
    <button id="downloadButton">Upload</button>
    <button id="resetButton">ReSet</button> -->
    
<!-- axios conseil -->
    <script>

function thisGetConseil(response)
    {

              console.log(response.data.conseils);
                var data = response.data.conseils;
                // console.log(data.length);
                for (var i = 0; i < data.length; i++) {
                    console.log(data[i].id);
                    console.log(data[i].conseil);
                    tr = $('<tr class="trcn">');
                    tr.append("<td data-label='ID'><input id='m' value='" + data[i].id + "' disabled></td>");
                    tr.append("<td data-label='Conseil'><audio controls><source src='" + data[i].conseil + "' type='audio/ogg' ></audio></td>");
                    tr.append("<td data-label='Action'><button class='btnscn btn btn-outline-danger'>Supprimer</button></td>");
                    tr.append("</tr>");
                }
                    $('#conseilcontent').append(tr);
    }


    
        var startRecordingButton = document.getElementById("startRecordingButton");
        var stopRecordingButton = document.getElementById("stopRecordingButton");
        var playButton = document.getElementById("playButton");
        var downloadButton = document.getElementById("downloadButton");
        var resetButton = document.getElementById("resetButton");

        var leftchannel = [];
        var rightchannel = [];
        var recorder = null;
        var recordingLength = 0;
        var volume = null;
        var mediaStream = null;
        var sampleRate = 44100;
        var context = null;
        var blob = null;

        startRecordingButton.addEventListener("click", function () {
            // Initialize recorder
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
            navigator.getUserMedia(
            {
                audio: true
            },
            function (e) {
                console.log("user consent");

                // creates the audio context
                window.AudioContext = window.AudioContext || window.webkitAudioContext;
                context = new AudioContext();

                // creates an audio node from the microphone incoming stream
                mediaStream = context.createMediaStreamSource(e);

                // https://developer.mozilla.org/en-US/docs/Web/API/AudioContext/createScriptProcessor
                // bufferSize: the onaudioprocess event is called when the buffer is full
                var bufferSize = 2048;
                var numberOfInputChannels = 2;
                var numberOfOutputChannels = 2;
                if (context.createScriptProcessor) {
                    recorder = context.createScriptProcessor(bufferSize, numberOfInputChannels, numberOfOutputChannels);
                } else {
                    recorder = context.createJavaScriptNode(bufferSize, numberOfInputChannels, numberOfOutputChannels);
                }

                recorder.onaudioprocess = function (e) {
                    leftchannel.push(new Float32Array(e.inputBuffer.getChannelData(0)));
                    rightchannel.push(new Float32Array(e.inputBuffer.getChannelData(1)));
                    recordingLength += bufferSize;
                }

                // we connect the recorder
                mediaStream.connect(recorder);
                recorder.connect(context.destination);
            },
                        function (e) {
                            console.error(e);
                        });
        });

        stopRecordingButton.addEventListener("click", function () {

            // stop recording
            recorder.disconnect(context.destination);
            mediaStream.disconnect(recorder);

            // we flat the left and right channels down
            // Float32Array[] => Float32Array
            var leftBuffer = flattenArray(leftchannel, recordingLength);
            var rightBuffer = flattenArray(rightchannel, recordingLength);
            // we interleave both channels together
            // [left[0],right[0],left[1],right[1],...]
            var interleaved = interleave(leftBuffer, rightBuffer);

            // we create our wav file
            var buffer = new ArrayBuffer(44 + interleaved.length * 2);
            var view = new DataView(buffer);

            // RIFF chunk descriptor
            writeUTFBytes(view, 0, 'RIFF');
            view.setUint32(4, 44 + interleaved.length * 2, true);
            writeUTFBytes(view, 8, 'WAVE');
            // FMT sub-chunk
            writeUTFBytes(view, 12, 'fmt ');
            view.setUint32(16, 16, true); // chunkSize
            view.setUint16(20, 1, true); // wFormatTag
            view.setUint16(22, 2, true); // wChannels: stereo (2 channels)
            view.setUint32(24, sampleRate, true); // dwSamplesPerSec
            view.setUint32(28, sampleRate * 4, true); // dwAvgBytesPerSec
            view.setUint16(32, 4, true); // wBlockAlign
            view.setUint16(34, 16, true); // wBitsPerSample
            // data sub-chunk
            writeUTFBytes(view, 36, 'data');
            view.setUint32(40, interleaved.length * 2, true);

            // write the PCM samples
            var index = 44;
            var volume = 1;
            for (var i = 0; i < interleaved.length; i++) {
                view.setInt16(index, interleaved[i] * (0x7FFF * volume), true);
                index += 2;
            }

            // our final blob
            blob = new Blob([view], { type: 'audio/wav' });
        });

        playButton.addEventListener("click", function () {
            if (blob == null) {
                return;
            }

            var url = window.URL.createObjectURL(blob);
            var audio = new Audio(url);
            audio.play();
        });

        downloadButton.addEventListener("click",function () {
            if (blob == null) {
                return;
            }
            var id = document.getElementById("idconseil").value;
            var objetconseil = document.getElementById("objetconseil").value;
            
            let form = new FormData();
            form.append('blob', blob);
            form.append('id', id);
            form.append('objetconseil', objetconseil);

            // let response = await axios({ method: 'post', url: 'audio', data: form }); awiat used only with async
            axios({ method: 'post', url: 'blobmp3', data: form }).then(function (response) {
            console.log(response);
            thisGetConseil(response);
            });
            Swal.fire({ position: 'top-end', icon: 'success', title: 'Advice successfully uploaded', showConfirmButton: false, timer: 1500 })

        });
        
        resetButton.addEventListener("click",function () {
            leftchannel = [];
            rightchannel = [];
            recorder = null;
            recordingLength = 0;
            volume = null;
            mediaStream = null;
            sampleRate = 44100;
            context = null;
            blob = null;
            Swal.fire({ position: 'top-end', icon: 'success', title: 'Reset Done', showConfirmButton: false, timer: 1500 })
        });

        function flattenArray(channelBuffer, recordingLength) {
            var result = new Float32Array(recordingLength);
            var offset = 0;
            for (var i = 0; i < channelBuffer.length; i++) {
                var buffer = channelBuffer[i];
                result.set(buffer, offset);
                offset += buffer.length;
            }
            return result;
        }

        function interleave(leftChannel, rightChannel) {
            var length = leftChannel.length + rightChannel.length;
            var result = new Float32Array(length);

            var inputIndex = 0;

            for (var index = 0; index < length;) {
                result[index++] = leftChannel[inputIndex];
                result[index++] = rightChannel[inputIndex];
                inputIndex++;
            }
            return result;
        }

        function writeUTFBytes(view, offset, string) {
            for (var i = 0; i < string.length; i++) {
                view.setUint8(offset + i, string.charCodeAt(i));
            }
        }

        $(document).on("click", '.btnscn', function (){
                var id = $(this).closest("td").closest("tr").find("#m").val();
                $(this).closest("td").closest("tr").hide();
                alert(id);
                supprimer(id);


        function supprimer(id){
        // alert(" t = " + t + " d = " + d + " id = " + id);

        axios.put('dltmp3', {
            id:id,
        })
        .then(function (response) {
            console.log(response);
            Swal.fire({ position: 'top-end', icon: 'success', title: 'record successfully deleted', showConfirmButton: false, timer: 1500 })

        })
        .catch(function (error) {
            console.log(error);
        });
    };
});

    </script>

<!-- controle consulation -->
<script>
        function thisGetCCC()
    {
        $.ajax({
            type: "GET",
            url: '/CCC/{{$id}}',
            success:function(response){
                var data = response.controle_consultations;
                console.log(data);
                var tr, X , Y = 'Controle' , Z = 'Consultation';
                for (var i = 0; i < data.length; i++) {
                    tr = $('<tr class="trccc">');
                    data[i].type ==  0 ? X = Y: X = Z;
                    tr.append("<td data-label='ID'><input id='i' value='" + data[i].id + "' disabled></td>");
                    data[i].type ==  0 ? tr.append("<td data-label='Type'><select class='ty' ><option value='" + 0 + "'>" + Y + "</option><option value='"+ 1 + "'>" + Z + "</option></select></td>") : tr.append("<td data-label='Type'><select class='ty' ><option value='" + 1 + "'>" + Z + "</option><option value='"+ 0 + "'>" + Y + "</option></select></td>");
                    tr.append("<td data-label='Date'><input type='date' value='" + data[i].dateControleConsultation + "' class='t'></td>");
                    tr.append("<td data-label='Action'><button class='btnso btn btn-outline-danger'>Supprimer</button ></td>");
                    // tr.append("<td><textarea class='d'>" + data[i].description + "</textarea ></td>");
                    tr.append("</tr>");
                }
                    $('#ccccontent').append(tr);
            }
        });
    }
    document.getElementById('cccform').addEventListener('submit', performPostRequest);
    function performPostRequest(e) {
        e.preventDefault();
        var id = document.getElementById('idccc').value;
        var objet = document.getElementById('objetccc').value;
        var type = document.getElementById('typeccc').value;
        var newDate = document.getElementById('newDateccc').value;
        
        axios.post('CCC', {
            id:id,
            objet: objet,
            type: type,
            newDate: newDate,
        })
        .then(function (response) {
            console.log(response);
            thisGetCCC();            
        })
        .catch(function (error) {
            console.log(error);
        });
        e.preventDefault();
        Swal.fire({position: 'top-end',icon: 'success',title: 'Your work has been saved',showConfirmButton: false,timer: 1500})

    }
    
    $(document).on('focusout','.trccc',function(){
            var ty = $(this).find(".ty" ).val();
            var t = $(this).find(".t" ).val();
            // var d = $(this).find(".d" ).val();
            // alert("ty = ");
            // alert(ty);
            // alert('t = ');
            // alert(t);
            // alert("d = ");
            // alert(d);

            var id = $(this).find("input").val();
            // alert('id = ');
            // alert(id);
            updateccc(ty , t , id);
        })

    function updateccc(ty , t , id){
        // alert('ty = ' + ty + " t = " + t + " d = " + d + " id = " + id);

        axios.put('CCC', {
            id:id,
            type: ty,
            newDate: t,
        })
        .then(function (response) {
            console.log(response);
            Swal.fire({ position: 'top-end', icon: 'success', title: 'records successfully updated', showConfirmButton: false, timer: 1500 })
        })
        .catch(function (error) {
            console.log(error);
        });
    };

    $(document).on("click", '.btnsc', function (){
                var id = $(this).closest("td").closest("tr").find("#i").val();
                $(this).closest("td").closest("tr").hide();
                alert(id);
                supprimer(id);


        function supprimer(id){
        // alert(" t = " + t + " d = " + d + " id = " + id);

        axios.put('CCCD', {
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

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
@include('langagues')
</html>