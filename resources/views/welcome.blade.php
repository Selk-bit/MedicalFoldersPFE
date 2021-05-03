<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<title>PFE</title>

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
		body {line-height: 2;}
		.main-menu > ul > li > a { font-size: 0.975rem;}
		.main-menu ul ul li a { font-size: 0.9125rem;}
	</style>
</head>

<body>

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
    
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
							<!-- <li class="submenu">
								<a href="" class="show-submenu">Authentification<i class="icon-down-open-mini"></i></a>
								<ul>
									<li><a href="contacts.html">Medcine Registration</a></li>
									<li><a href="about.html">Patient Registration</a></li>
								</ul>
							</li> -->
							<li class="submenu">
								<a href="#" class="show-submenu">Authentification<i class="icon-down-open-mini">&nbsp;&nbsp;&nbsp;&nbsp;</i></a>
								<ul>
									<li class="third-level"><a href="">Register</a>
										<ul>
											<li><a href="/medcine/register">Médecin </a></li>
                                    		<li><a href="/patient/register">Patient</a></li>
										</ul>
									</li>
									<li class="third-level"><a href="">Login</a>
										<ul>
											<li><a href="/medcine/login">Médecin </a></li>
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
	<!-- /header -->
	
	<main >
		<div class="hero_home version_1" style="height : 520px;">
			<div class="content">
				<h3 style="margin-top: -90px; margin-bottom: 20px; " >Notre Mission <strong style="color:#88FF00" >!</strong></h3>
				<p>
                    Nous Vous Aidons Patient ou Médecin à Accéder a Tous Les Dossiers Médicaux en un <strong  style="color:#88FF00;" >Clic &nbsp;<i class="fas fa-mouse-pointer"></i></strong> <span style="color: #fff;font-size : 40px;" >.</span>
					<br>
					En Préservant Votre Temps, vos Efforts et votre  <strong style="color:#88FF00" > Energie <i class="fas fa-smile-beam"></i></strong> <span style="color: #fff;font-size : 40px;" >.</span>
				</p>
				<!-- <p>
					En Prsérvant Votre Temps, vos Efforts et votre  <strong style="color:#88FF00" > Energie <i class="fas fa-smile-beam"></i></strong> <span style="color: #fff;font-size : 40px;" >.</span>
				</p> -->
			</div>
		</div>
		<!-- /Hero -->
<div data-aos="fade-up"
data-aos-anchor-placement="top-center" >
		<div style="padding-top: 80px; padding-bottom: 0px;" class="container margin_120_95" >
			<!-- <div data-aos="fade-up" -->
     <!-- data-aos-anchor-placement="center-bottom"> -->
			<div class="main_title">
				<h2 style="color:#19224E" >Gardez Une Trace des <strong>Historiques</strong> MÉdicaux de Votre Patient !</h2>
				<p>Consulter tous leurs dossiers médicaux historiques d'une manière ordonnée.</p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-4">
					<div class="box_feat" id="icon_1">
						<span></span>
						<h3>TROUVEZ FACILEMENT UN PATIENT</h3>
						<p>bénéficier d'une Simple ,Rapid Recherche Afin de Trouvez Votre Patient.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_2">
						<span></span>
						<h3>Consulter Son Historique</h3>
						<p>Consulter tous leurs dossiers médicaux historiques d'une manière ordonnée.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_3">
						<h3>En profitant de la vitesse maximale</h3>
						<p>faites votre travail et dites au revoir au lent rafraîchissement des pages chaque fois effectué une tâche.</p>
					</div>
				</div>
			</div>
			<!-- /row -->
			<p class="text-center"><a href="/medcine/register" class="btn_1 medium">Creer Un Compte</a></p>

		</div>
		</div>

<div data-aos="fade-up"
data-aos-anchor-placement="top-center" >		
		<div class="container margin_120_95" style="padding-top: 80px; padding-bottom: 0px;">
			<div class="main_title">
				<h2 style="color:#19224E" >Consulter Tous Votre <strong> Documents </strong> Médical !</h2>
				<p>Découvrez tous vos dossiers médicaux contenant toutes les ordonnances, rapports, conseils, résultats d'analyses ... .</p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-4">
					<div class="box_feat" id="icon_1">
						<span></span>
						<h3>Restez Chez Vous</h3>
						<p>Pas de mobilisation Entre un Laboratoire et Votre Médecin, Laissez-nous le Faire pour Vous.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_2">
						<span></span>
						<h3>consulter votre historique</h3>
						<p>Accéder à Tous vos Dossiers Médicaux Depuis votre Domicile.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_3">
						<h3>Rester a Jour</h3>
						<p>Facilement Vérifier s'il y a un Conseil Envoyé par votre Médecin à Domicile.</p>
					</div>
				</div>
			</div>
			<!-- /row -->
			<p class="text-center" id="PNC"><a href="/patient/login" class="btn_1 medium">Creer Un Compte</a></p>

		</div>
		</div>
		<!-- /container -->


		<div id="app_section" data-aos="fade-up">
			<div class="container">
				<div class="row justify-content-around">
					<div class="col-md-5">
						<!-- <p><img src="img/app_img.svg" alt="" class="img-fluid" width="500" height="433"></p> -->
						<p><img src="https://svgur.com/i/LAH.svg" alt="" class="img-fluid" width="500" height="433"></p>
					</div>
					<div class="col-md-6">
						<small>Pourquoi</small>
						<h3>Nous <strong>Choisir !</strong></h3>
						<!-- <p class="lead">Tota omittantur necessitatibus mei ei. Quo paulo perfecto eu, errem percipit ponderum no eos. Has eu mazim sensibus. Ad nonumes dissentiunt qui, ei menandri electram eos. Nam iisque consequuntur cu.</p> -->
						<p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parce que nous fournissons le meilleur service client en termes de rapidité, grâce aux dernières technologies de service côté client afin que vous, en tant que médecin, vous fassiez tout votre travail en temps réel , pas plus de lent rafraîchissement des pages , et nous vous aidons en tant que patients à garder tous votre documents sécurisé et organisé.</p>
						<div class="app_buttons wow" data-wow-offset="100">
							<!-- <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve"> -->
							<path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
						</svg>
							<!-- <a href="" class="fadeIn"><img src="img/apple_app.png" alt="" width="150" height="50" data-retina="true"></a> -->
							<!-- <a href="" class="fadeIn"><img src="img/google_play_app.png" alt="" width="150" height="50" data-retina="true"></a> -->
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>

			<section class="text-white py-5 min-vh-100" style="margin-top: -80px;" >
				<div class="container">
				 <div class="row justify-content-center text-center">
				  <div class="col-12">
				   <h1 class="pb-3"></h1>
				  </div>
				  <div class="col-md-4"><h2 style="color:#FFF02A" >Médecins <i class="fas fa-user-md"></i></h2>
				   <span id="count1" class="display-4"></span>
				  </div>
				  <div class="col-md-4"><h2 style="color:#FFF02A" >Patients <i class="fas fa-hospital-user"></i></h2>
				   <span id="count2" class="display-4"></span>
				  </div>
				  <div class="col-md-4"><h2 style="color:#FFF02A" >spécialité <i class="fas fa-star-of-life"></i></h2>
				   <span id="count3" class="display-4"></span>
				  </div>
				 </div>
				</div>
			   </section>
			<!-- /container -->
		</div>

		<!-- /app_section -->
	</main>
	<!-- /main content -->
	
	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="index.html" title="Findoctor">
							<!-- <img src="img/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid"> -->
							<!-- <img src="https://uc9a8c0270022f8690c42a2568fe.previews.dropboxusercontent.com/p/thumb/AAwYUm-UR_8ONYEn8p5lY7qi05WHR3eJ62pBrP7t-wYQhOEsk7cGBbJZnrMjELBSEjlS0fIMq3ahSUmIyOM00DI4nBeHj3O7d7m7nbS-5quT2GbQVE0U5yWvI_6FZObVk4iZlsiQYY-1OM8IB_I8_Hr84yIkPU3VZjB8Fpcv9-TdKQSwhSM2gg3RTd9IrvqSnwUN1sv1-0BaV5aEwHuwv6M_axDV02EiZ9LABLfwE9ubFLCK3IkaF0V51J9iVL0NY40IkgFmJDTtjLZ1lNkbqVuhTotv6UCqqItDeNo34EIw6Gt66adVCknLYXzlwsibs8rxWDH0h7qOvPGqGlPxsgKPTrPa4vOUz9aiO-6M_c80HGjuv8H2oplLAE_aS8D2ZfUUCbw2Gm33Om25mzZo_sQO/p.png?size=1280x960&size_mode=3" data-retina="true" alt="" width="163" height="36" class="img-fluid"> -->
							<img src="../img/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid">
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>About</h5>
					<ul class="links">
						<li><a href="">About us</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="">FAQ</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="register.html">Register</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="">Medcines</a></li>
						<li><a href="">Clinics</a></li>
						<li><a href="">Specialisations</a></li>
						<li><a href="">Read More</a></li>
						<li><a href="">Download App</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="icon_mobile"></i> + 61 23 8093 3400</a></li>
						<li><a href="mailto:fsttanger@GIpfe.com"><i class="icon_mail_alt"></i> help@findhelp.com</a></li>
					</ul>
					<div class="follow_us">
						<h5>Follow us</h5>
						<ul>
							<li><a href=""><i class="social_facebook"></i></a></li>
							<li><a href=""><i class="social_twitter"></i></a></li>
							<li><a href=""><i class="social_linkedin"></i></a></li>
							<li><a href=""><i class="social_instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<li><a href="">Terms and conditions</a></li>
						<li><a href="">Privacy</a></li>
						<li><div style="margin-left:4vw" id="google_translate_element"></div></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© {{date("Y")}} Licence GI</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
	<script src="{{asset('js/common_scripts.min.js')}}"></script>
	<script src="{{asset('js/functions.js')}}"></script>


<!-- hover effects -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init();
	  </script>
<!-- /hover effects -->

<!-- conteur -->
<script>
	document.addEventListener("DOMContentLoaded", () => {
		function counter(id, start, end, duration) {
  let obj = document.getElementById(id),
   current = start,
   range = end - start,
   increment = end > start ? 1 : -1,
   step = Math.abs(Math.floor(duration / range)),
   timer = setInterval(() => {
    current += increment;
    obj.textContent = current;
    if (current == end) {
     clearInterval(timer);
    }
   }, step);
 }
 counter("count1", 0, 204, 22000);
 counter("count2", 0, 1024, 18000);
 counter("count3", 0, 45, 22000);
});

</script>
</script>
<!-- /conteur -->




<!-- bootman -->


<!-- botman  Goes Here -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> -->
    <!-- <script>
	    var botmanWidget = {
	        aboutText: '',
	        introMessage: "Ã¢Å“â€¹ Hi! Welcome to Pour un Meilleur Maroc"
	    };
    </script> -->
  
	<script src="{{asset('js/widget.js')}}"></script>
	<!-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> -->


<!-- learning chrts -->
<!-- 
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
          label: '# le nombre de votre dossiers medicaux par semain',
          // data: [arr[5], arr[4], arr[3], arr[2], arr[1], arr[0]],
          // data: [0, 0, 0, 0, 0, 6],
          data: arr,
          // fill: false,
          backgroundColor: [
                'rgb(35,75,191)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(255, 159, 64, 0.2)'
            ],
          borderColor: [ 
            'rgb(35,75,191)',
                '#e74e84',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
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
</script> -->




<!-- google traduction service template 1 start -->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'fr' , includedLanguages : 'fr,en,de,es,it'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- google traduction service template 1 ends -->


</body>
</html>