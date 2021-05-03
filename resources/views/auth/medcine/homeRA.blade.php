<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- Custom fonts for this template-->
  <link href="{{asset('dash/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/47fac39c42.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('dash/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{asset('dash/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<style>
  .page-item.active .page-link {background-color: #234BBF;}
  a {color: #234BBF}
  #content {background: #fff !important;}
  .text-gray-600 {color: #000000!important;}
  body { padding-right: 0 !important }
</style>

<style>
  #pushDown 
  {
    margin-bottom: 2vw;
  }
</style>

<style>
#pdf {
    height: calc(2em + .75rem + 2px) !important;
    
    background: #827FFE !important;
	-webkit-border-radius: 15px !important;
	-moz-border-radius: 15px !important;
	border-radius: 15px !important;
	color: #fff !important; 
    }

  .pdfMod
    {
      height: calc(2em + .75rem + 2px) !important;
    background: #827FFE !important;
	-webkit-border-radius: 15px !important;
	-moz-border-radius: 15px !important;
	border-radius: 15px !important;
	color: #fff !important; 
    }
</style>


</head>
<body id="page-top">


<div id="dashRA" data="{{$data}}" ></div>

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




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
  $(document).ready(function() {
    $('table.display').DataTable();
  });
</script>

<script>
   $(document).on("click", '#clc', function (){
                var a = $(this).closest("td").find("input[id='hell']").val();
                var b = $(this).closest("td").find("input[id='hell1']").val();
                console.log(a);
                console.log(b);
                $("#ipat").val(a);
                $("#rai").val(b);


});
</script>

</script>

<script>
   $(document).on("click", '#clc1', function (){
                var a = $(this).closest("td").find("input[id='mdf']").val();
                var b = $(this).closest("td").find("input[id='mdf1']").val();
                $("#ipatm").val(a);
                $("#raimd").val(b);
});
</script>

<script>
   $(document).on("click", '#clc2', function (){
                var a = $(this).closest("td").find("input[id='mdf2']").val();
                var b = $(this).closest("td").find("input[id='mdf1']").val();
                $("#fid").val(a);
                $("#raisp").val(b);


});
</script>

<script>
$('#exampleModal').on('hidden.bs.modal', function (e) {
  document.getElementById("pdf").value = null ;
})
$('#exampleModal1').on('hidden.bs.modal', function (e) {
  document.getElementById("pdf1").value = null ;
})
</script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js" ></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
let tomorrow = moment().add(1, 'day').format('YYYY-MM-DD');
let today = moment().format('YYYY-MM-DD');
let yesterday = moment().subtract(1, 'day').format('YYYY-MM-DD');
let yesterdayx2 = moment().subtract(2, 'day').format('YYYY-MM-DD');
let yesterdayx3 = moment().subtract(3, 'day').format('YYYY-MM-DD');
let yesterdayx4 = moment().subtract(4, 'day').format('YYYY-MM-DD');
let yesterdayx5 = moment().subtract(5, 'day').format('YYYY-MM-DD');
let yesterdayx6 = moment().subtract(6, 'day').format('YYYY-MM-DD');
console.log('today = ');
console.log(today);
let arr = [];

updater();
function updater(){

  axios.put('/DiagrameRadio01', {
    tomorrow:tomorrow,
    today: today,
    yesterday: yesterday,
    yesterdayx2: yesterdayx2,
    yesterdayx3: yesterdayx3,
    yesterdayx4: yesterdayx4,
    yesterdayx5: yesterdayx5,
    yesterdayx6: yesterdayx6,
  })
  .then(function (response) {
    console.log(response.data);
    arr = response.data;
    forceChange();
  })
  .catch(function (error) {
    console.log(error);
  });
}

function forceChange()
{

  
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [yesterdayx5, yesterdayx4, yesterdayx3, yesterdayx2, yesterday, today],
        datasets: [{
          label: '# le nombre de vos fichiers uploadés cette semaine',
          // data: [arr[5], arr[4], arr[3], arr[2], arr[1], arr[0]],
          // data: [0, 0, 0, 0, 0, 6],
          data: arr,
          fill: false,
          backgroundColor: [
                // 'rgb(35,75,191)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(255, 159, 64, 0.2)'
            ],
          borderColor: [ 
            'rgb(35,75,191)',
                // '#e74e84',
                // 'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                // 'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 3,
          
        }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
});
}

document.getElementById("clicker").addEventListener('click',function ()
// document.getElementById("sidebarToggle").addEventListener('click',function ()
  {
    // alert('1');
    setTimeout(function(){
      // alert('1');
      updater();
    }, 1000);
  }  
);
</script>


<!-- start chat 2  -->
<script>
let thisMonth = moment().format('MMMM');
let thisMonth1 = moment().subtract(1, 'month').format('MMMM');
let thisMonth2 = moment().subtract(2, 'month').format('MMMM');
let thisMonth3 = moment().subtract(3, 'month').format('MMMM');
let thisMonth4 = moment().subtract(4, 'month').format('MMMM');
let thisMonth5 = moment().subtract(5, 'month').format('MMMM');
let thisMonth6 = moment().subtract(6, 'month').format('MMMM');
let thisMonth7 = moment().subtract(7, 'month').format('MMMM');
let thisMonth8 = moment().subtract(8, 'month').format('MMMM');
let thisMonth9 = moment().subtract(9, 'month').format('MMMM');
let thisMonth10 = moment().subtract(10, 'month').format('MMMM');
let thisMonth11 = moment().subtract(11, 'month').format('MMMM');

let lab4 = [];
let data4 = [];
let data44 = [];

let SpeName;
updater5();
function updater5(){

  axios.get('/updateRadio02')
  .then(function (response) {
    // console.log('response = ');
    // console.log(response.data[0]);

    for(let i = 0; i < response.data.length - 1; i++)
    {
      i%2 ? data44.push(response.data[i]) : data4.push(response.data[i]);
    }

    data44 = data44.reverse();
    data4 = data4.reverse();
    
    SpeName =  response.data[response.data.length - 1];
    
    forceChange5();
  })
  .catch(function (error) {
    console.log(error);
  });
}

function forceChange5()
{
  
  new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
      // labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
      labels: [thisMonth,thisMonth1,thisMonth2,thisMonth3,thisMonth4,thisMonth5,thisMonth6,thisMonth7,thisMonth8,thisMonth9 , thisMonth10 , thisMonth11],
      datasets: [{ 
        data: data4,
        // data: [86,114,106,106,107,111,133,221,783,2478],
        label: "total de vos fichiers uploadés ",
        borderColor: "rgb(35,75,191)",
        fill: false
      }, { 
        // data: [282,350,411,502,635,809,947,1402,3700,5267],
        data: data44,
        label: "total des fichiers uploadés",
        borderColor: "#e74e84",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'votre contribution ( fichiers uploadés )'
    }
  }
});
}


// document.getElementById("clicker").addEventListener('click',function ()
//   {
//     updater5(); 
//     // alert('2');
//   }  
// );

document.getElementById("clicker").addEventListener('click',function ()
{
  // alert('1');
  setTimeout(function(){
    // alert('1');
        updater5(); 
    // updater();
    }, 1000);
  }  
);
</script>
<!-- end chat 5  -->


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
    body {color : black}
    .text-gray-600 {color: black !important;}
    .shadow { box-shadow: none !important;}
    #wrapper #content-wrapper {background-color: #fff;}
    .text-gray-400 { color: #234BBF !important; }
    a.dropdown-item {color : black !important}
  </style>


@include('langagues')
</body>
</html>