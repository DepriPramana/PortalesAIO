<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>Aeris</title>
    <link rel="shortcut icon" href="{{asset('aeris/img/favicon_s.ico')}}" />

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="{{asset('aeris/css/style.css')}}">

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

		<script type="text/javascript">
			function copiaUsuarioPwd(username,password)
			{
				password.value = username.value;
			}
		</script>

		<style>
			body {
				background:linear-gradient(
				rgba(255, 255, 255, 0.600),
				rgba(250, 250, 250, 0.600)
				),url('aeris/img/aeris_cover2.jpg');
			}
			@media (max-width: 500px) {
				.video-size {
					margin-left: 10%;
					width: 80%;
					height: 80%;
					border-radius: 25px;
				}
			}
			@media (min-width: 500px) {
				.video-size {
					margin-left: 25%;
					width: 50%;
					height: 50%;
					border-radius: 25px;
				}
			}
		</style>

	</head>


	<body>

		<div class="site-content">
			<main class="main-content">
				<div class="site-footer">
					<div class="container">
						<img width="200" height="62" src="{{asset('aeris/img/logoaijs.png')}}">
					</div>
				</div>

				<!--<div class="fullwidth-block baner" data-bg-image="img/aeris_cover2.jpg" style="border-top: 3px solid #3bcdc3;">
					<div class="container">
					</div>
				</div>-->


				<div class="fullwidth-block  footer-cta">
					<div class="container">
						<div class="col-md-12" align="center">
<!-- 							<div class="col-md-4"></div>
							<div class="col-md-2">
								<img src="img/en.png">
							</div>
							<div class="col-md-2">
								<img src="img/es.png">
							</div>
							<div class="col-md-4"></div> -->
						</div>
						<div>
							<video id="vid" class="video-size" autoplay muted playsinline controls>
								<source src="{{asset('aeris/BIENVENIDOS.mp4')}}" type="video/mp4" />
							</video>
						</div>
						<h2 class="section-title">Bienvenido al Aeropuerto Internacional Juan Santamaría! / Welcome to the International Airport Juan Santamaria!</h2>

						<!--<small class="section-subtitle">DESCARGA NUESTRA APP!</small>-->

						<!--<div class="row" style="text-align: center !important;">
							<div class="col-md-12">
								<a href="https://play.google.com/store/apps/details?id=com.mo2o.iberostar&hl=en"><img width="150" height="50" src="img/app-android.svg"></a>
								<a href="https://itunes.apple.com/mx/app/iberostar-hotels-resorts/id922530529?l=en&mt=8"><img width="150" height="50" src="img/app-ios.svg"></a>
							</div>
						</div> -->


						<div class="row">
							<div class="col-md-12" id="mostrarbtn"  style="display:block" >
								<table style="margin: 0 auto;" cellspacing="0" cellpadding="8" class="w320">
									<tr >
										<td style="text-align: center; color: black; font-weight: bold;"><span style="font-family: Courier; display:none;" id="segundos"></span>
<!-- 											<p>En dado caso que no lo redireccione de manera automatica.</p> -->
											<p>Presione continuar para hacer uso del servicio de internet. / Press continue to make uso of the internet service.</p>
											<p>Al Ingresar, Usted acepta los Términos y Condiciones de Aeris. / By entering you accept the terms and conditions of Aeris.</p>
										</td>
									</tr>
				                  <tr>
									<form id="form2" name="fvalida" method="post" action="https://zd.wifimedia.mx:9998/login" onsubmit="copiaUsuarioPwd(username,password);">
							              <input name="username" type="hidden" id="username" value="wifi_free" />
							              <input name="password"  type="hidden" id="password" value="wifi_free" />

					                    <td style="text-align:center;">
	                    				<input name="login2" type="submit" id="login2" value="Continuar! / Continue!"  style="background-color: lightgreen;border-radius:10px;color: black;display:inline-block;font-family:'Lato', Helvetica, Arial, sans-serif;font-weight:bold;font-size:18px;line-height:33px;text-align:center;text-decoration:none;width:200px;-webkit-text-size-adjust:none;mso-hide:all;"/>
					                    </td>
									</form>
				                  </tr>
				                </table>

							</div>
							<div class="site-footer">
								<div class="container">
									<img width="180" height="150" src="{{asset('aeris/img/logo_sitwifi.png')}}">
								</div>
							</div>
						</div>

					</div> <!-- .container -->
				</div> <!-- .fullwidth-block -->

			</main> <!-- .main-content -->
			<form method="POST" action="" id="formpr" role="login">
			</form>


		</div>


		<script src="{{asset('aeris/plugin/jquery/dist/jquery.min.js')}}"></script>
		<script src="{{asset('aeris/plugin/isMobile-master/isMobile.js')}}"></script>
		<script src="{{asset('aeris/js/plugins.js')}}"></script>

		<script src="{{asset('aeris/js/appx.js')}}"></script>
		<script src="{{asset('aeris/js/scripthot.js')}}"></script>
		<script>
			$(document).ready(function(){
				$("#vid").on('ended', function(){
					//document.getElementById("form2").submit();
				});
			});
		</script>

	</body>

</html>
