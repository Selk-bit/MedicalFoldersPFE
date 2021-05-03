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

</head>
<body id="page-top">

<div id="dash" data="{{$data}}" ></div>
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


<!-- charts goes here -->

<!-- chart 1  -->
<!-- <div class="container">
      <div class="col-md-10" style="margin: 0 auto 0 auto;">
              <div class="row">
                    <div class="col-md-6"  style="margin: 0 auto 0 auto;">
                        <canvas id="myChart" width="600" height="600"></canvas>
                    </div> 
                    <div class="col-md-5 text-md-right"  style="margin: 0 auto 0 auto;">
                      <canvas id="doughnut-chart" width="500" height="500"></canvas>
                    </div> 
      </div>

        <div class="row">
              <div class="col-md-8" style="margin: 0 auto 0 auto;">
                  <canvas id="bar-chart-horizontal" width="800" height="300"></canvas>
              </div>
            
              <div class="col-md-8" style="margin: 0 auto 0 auto;">
                  <canvas id="bar-chart-horizontal2" width="800" height="300"></canvas>
              </div>
              
              <div class="col-md-8" style="margin: 0 auto 0 auto;">
                  <div class="col-md-12" style="margin: 0 auto 0 auto;">
                      <canvas id="line-chart" width="1600" height="900"></canvas>
                  </div>
              </div>
      </div>
</div> -->


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

  axios.put('/Diagrame', {
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
          label: '# nombre de vos dossiers médicaux par semaine',
          // data: [arr[5], arr[4], arr[3], arr[2], arr[1], arr[0]],
          // data: [0, 0, 0, 0, 0, 6],
          data: arr,
          fill: false,
          backgroundColor: [
                // 'rgba(35,75,191)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                //  'rgba(75, 192, 192, 0.2)',
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
</script>



<!-- end chart 1  -->


<!-- start chart 2  -->

<script>
let lab = [];
let prcntg = [];
updater2();
function updater2(){

  axios.get('/Diagrame2')
  .then(function (response) {
    // console.log('response = ');
    // console.log(response.data);

    for(let i = 0; i < response.data.length; i++)
    {
      lab[i] = response.data[i].nom;
      prcntg[i] = response.data[i].pourcentage;
    }
    forceChange2();
  })
  .catch(function (error) {
    console.log(error);
  });
}

function forceChange2()
{

  new Chart(document.getElementById("doughnut-chart"), {
      // type: 'doughnut',
      type: 'pie',
      data: {
        // labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
        labels: lab,
        datasets: [
          {
            label: "le pourcentage des spécialité par dossiers (%)",
            backgroundColor: ["rgb(35,75,191)", "rgb(255,26,106)","rgb(60,186,159)","#e8c3b9","#c45850"],
            // data: [2478,5267,734,784,433]
            data: prcntg
          }
        ]
      },
      options: {
        title: {
          display: true,
          text: 'le pourcentage des spécialité par dossiers (%)'
        }
      }
  });
}
</script>
<!-- end chart2  -->

<!-- chart 3 star -->
<script>

let lab2 = [];
let data2 = [];
updater3();
function updater3(){

  axios.get('/Diagrame3')
  .then(function (response) {
    // console.log('response = ');
    // console.log(response.data);

    for(let i = 0; i < response.data.length; i++)
    {
      lab2[i] = response.data[i].nom;
      data2[i] = response.data[i].tot;
    }
    forceChange3();
  })
  .catch(function (error) {
    console.log(error);
  });
}

function forceChange3()
{
  new Chart(document.getElementById("bar-chart-horizontal"), {
      type: 'horizontalBar',
      data: {
        // labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
        labels: lab2,
        datasets: [
          {
            label: "Nombre de Patients Par Specialite",
            backgroundColor: ["rgb(35,75,191)", "rgb(255,26,106)","rgb(60,186,159)","#e8c3b9","#c45850"],
            // data: [2478,5267,734,784,433]
            data: data2
          }
        ]
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: 'Top Maladies'
        },
        scales: {
        xAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
      }
  });
}
</script>
<!-- chart 3 end -->

<!-- chart 4 start -->
<script>

let lab3 = [];
let data3 = [];
updater4();
function updater4(){

  axios.get('/Diagrame4')
  .then(function (response) {
    // console.log('response = ');
    // console.log(response.data);

    for(let i = 0; i < response.data.length; i++)
    {
      lab3[i] = response.data[i].medName;
      data3[i] = response.data[i].tot;
    }
    forceChange4();
  })
  .catch(function (error) {
    console.log(error);
  });
}

function forceChange4()
{
  new Chart(document.getElementById("bar-chart-horizontal2"), {
      type: 'horizontalBar',
      data: {
        labels: lab3,
        datasets: [
          {
            label: "Ce medecin a (dossiers)",
            backgroundColor: ["rgb(35,75,191)", "rgb(255,26,106)","rgb(60,186,159)","#3e95cd","#c45850"],
            data: data3
          }
        ]
      },
      options: {
        legend: { display: false },
        title: {
        display: true,
        text: 'Top médecins ( dossiers )'
        },
        scales: {
        xAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
      }
  });
}
</script>
<!-- chart 4 end -->

<!-- start chat 5  -->
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

  axios.get('/Diagrame5')
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
        label: "l\Le nombre de vos dossiers dans le domaine : " + SpeName,
        borderColor: "rgb(35,75,191)",
        fill: false
      }, { 
        // data: [282,350,411,502,635,809,947,1402,3700,5267],
        data: data44,
        label: "Le nombre total de dossiers",
        borderColor: "#e74e84",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'votre contribution dans le domaine : ' + SpeName
    }
  }
});
}
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

@include('langagues')
</body>
</html>