<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dashboard</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
  <!-- Custom fonts for this template-->
  <link href="{{asset('dash/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/47fac39c42.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('dash/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{asset('dash/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <style>
    body {color : black}
    .text-gray-600 {color: black !important;}
    .shadow { box-shadow: none !important;}
    #wrapper #content-wrapper {background-color: #fff;}
    .text-gray-400 { color: #234BBF !important; }
    a.dropdown-item {color : black !important}
  </style>
  <!-- navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow -->

<!-- <style>
.abc {
  -webkit-filter: brightness(6.6)contrast(3.4)hue-rotate(217deg)saturate(9.9);
  filter: brightness(12.6)contrast(3.4)hue-rotate(217deg)saturate(9.9);
}
</style> -->

<!-- cards style start -->
<style>
.border-left-success {
    border-left: .25rem solid #4e73df!important;
}
.border-left-info {
    border-left: .25rem solid #4e73df!important;
}
.border-left-warning {
    border-left: .25rem solid #4e73df!important;
}
.text-success {
    color: #4e73df!important;
}
.text-info {
    color: #4e73df!important;
}
.text-warning {
    color: #4e73df!important;
}
</style>
<!-- cards style end -->

<!-- centring second button start -->
<style>
  #spp { margin-left: 1.6vw; }
</style>
<!-- centring second button startEnd -->

<!-- background color start -->
<style>
#content-wrapper #content {background: #fff !important;}
</style>
<!-- background color startEnd -->

<!-- camDimentionsStart -->
<style>
canvas 
{
    height: 2px;
}
</style>
<!-- camDimentionsStartEnd -->



</head>

<body id="page-top">

<div id="dashPha" data="{{$data}}" ></div>
<script src="{{asset('js/widget.js')}}"></script>

<script>
$(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
</script>


<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>



<script src="../../../js/app.js" ></script>



  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('dash/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('dash/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('dash/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('dash/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('dash/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('dash/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('dash/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>


  <!-- Page level custom scripts -->
    <script src="{{asset('dash/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('dash/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('dash/js/demo/datatables-demo.js')}}"></script>
    


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js" ></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<style>
  .btn-primary {background-color: rgb(35,75,191) !important;}
  .page-item.active .page-link {
    background-color: rgb(35,75,191) !important;
  }
  .dropdown-item {

    font-weight: 800;
    color: #000000;
  }
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
		.main-menu > ul > li > a { font-size: 0.975rem;}
		.main-menu ul ul li a { font-size: 0.9125rem;}
	</style>
<!-- <script src="{{asset('js/widget.js')}}"></script> -->




<script src="quagga.min.js"></script>

    <script>
        var _scannerIsRunning = false;
        let a = 0;

        function startScanner() {
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector('#scanner-container'),
                    constraints: {
                        width: 480,
                        height: 320,
                        facingMode: "environment"
                    },
                },
                decoder: {
                    readers: [
                        "code_128_reader",
                        "ean_reader",
                        "ean_8_reader",
                        "code_39_reader",
                        "code_39_vin_reader",
                        "codabar_reader",
                        "upc_reader",
                        "upc_e_reader",
                        "i2of5_reader"
                    ],
                    debug: {
                        showCanvas: true,
                        showPatches: true,
                        showFoundPatches: true,
                        showSkeleton: true,
                        showLabels: true,
                        showPatchLabels: true,
                        showRemainingPatchLabels: true,
                        boxFromPatches: {
                            showTransformed: true,
                            showTransformedBox: true,
                            showBB: true
                        }
                    }
                },

            }, function (err) {
                if (err) {
                    console.log(err);
                    return
                }

                console.log("Initialization finished. Ready to start");
                Quagga.start();

                // Set flag to is running
                _scannerIsRunning = true;
                a = 0;
            });

            Quagga.onProcessed(function (result) {
                var drawingCtx = Quagga.canvas.ctx.overlay,
                drawingCanvas = Quagga.canvas.dom.overlay;

                if (result) {
                    if (result.boxes) {
                        drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                        result.boxes.filter(function (box) {
                            return box !== result.box;
                        }).forEach(function (box) {
                            // Quagga.ImageDebug.drawPath(box, { x: 0, y: 1 }, drawingCtx, { color: "green", lineWidth: 2 });
                        });
                    }

                    if (result.box) {
                        // Quagga.ImageDebug.drawPath(result.box, { x: 0, y: 1 }, drawingCtx, { color: "#00F", lineWidth: 2 });
                    }

                    if (result.codeResult && result.codeResult.code) {
                        // Quagga.ImageDebug.drawPath(result.line, { x: 'x', y: 'y' }, drawingCtx, { color: 'red', lineWidth: 3 });
                    }
                }
            });
            
            

            Quagga.onDetected(function (result) {
                console.log("Barcode detected and processed : [" + result.codeResult.code + "]", result);
                console.log(result.codeResult.code.length); 
                let strFirstThree = result.codeResult.code.substring(0,3);
                let ProbaError = 0;
                if(strFirstThree == 611 && result.codeResult.code.length == 13)
                {
                    ProbaError++;
                    let patId = document.getElementById("hiddenTarget").value;
                    playWav();
                    ProbaError == 1 ? allSet(): 1;

                    function allSet()
                    {
                        if( a == 0 )
                        {
                            const formData = new FormData();
                            formData.append("code", result.codeResult.code);
                            formData.append("patId", patId);
                            const response = axios.post("/codeMed", formData)
                            .then((response) => {
                                console.log(response);
                            })
                            .catch(err => { 
                                console.log(err);   
                            })
                            a = 1;
                            _scannerIsRunning = false;
                            Quagga.stop();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            document.getElementById("btn").click();
                        }
               
                    }
                }


            });
        }


        // Start/stop scanner
        document.getElementById("btn").addEventListener("click", function () {
            if (_scannerIsRunning) {
                Quagga.stop();
            } else {
                startScanner();
            }
        }, false);
    
        function playWav(){ 
          var audio = document.getElementById('sound1'); 
            audio.play(); 
        } 
    </script>
<!-- 
<video src="{{asset('bloop/beep.wav')}}" autostart="false" width="0" height="0" id="sound1"
enablejavascript="true"> -->

<audio id="sound1" > 
    <source src= "{{asset('bloop/beep.wav')}}" type="audio/wav"> 
</audio> 


<script src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


@include('langagues')
</body>
</html>