<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
		<title>Bienvenido</title>
	</head>
	<body background="{{asset ('chevrolet/fondo.jpg')}}">
		<div style="text-align: center; margin-top: 10vh;">
			<video id="vid" style="width: 80vw; height: 80vh;" autoplay muted controls playsinline>
				<source src="{{asset('chevrolet/Chevrolet.mp4')}}" type="video/mp4" />
			</video>
		</div>
		<!-- <form id="loginform" name="loginform" method="POST" action="https://{{ isset($_GET['sip']) ? $_GET['sip'] : '' }}:9998/SubscriberPortal/hotspotlogin"> -->
		<form id="loginform" name="loginform" method="POST" action="http://10.10.0.2:9997/login">
			<input type="hidden" id="username" name="username" value="wifi_free" />			
			<input type="hidden" id="password" name="password" value="wifi_free" />

			<input class="form-control" type="hidden" name="url" value="{{ isset($_GET['url']) ? $_GET['url'] : '' }}" />
			<input class="form-control" type="hidden" name="proxy" value="{{ isset($_GET['proxy']) ? $_GET['proxy'] : '' }}" />
			<input class="form-control" type="hidden" id="sip" name="sip" value="{{ isset($_GET['sip']) ? $_GET['sip'] : '' }}" />
			<input class="form-control" type="hidden" id="mac" name="mac" value="{{ isset($_GET['mac']) ? $_GET['mac'] : '' }}" />
			<input class="form-control" type="hidden" id="client_mac" name="client_mac" value="{{ isset($_GET['client_mac']) ? $_GET['client_mac'] : '' }}" />
			<input class="form-control" type="hidden" id="uip" name="uip" value="{{ isset($_GET['uip']) ? $_GET['uip'] : '' }}" />
			<input class="form-control" type="hidden" id="ssid" name="ssid" value="{{ isset($_GET['ssid']) ? $_GET['ssid'] : '' }}" />
			<input class="form-control" type="hidden" id="vlan" name="vlan" value="{{ isset($_GET['vlan']) ? $_GET['vlan'] : '' }}" />
			<input class="form-control" type="hidden" id="res" name="res" value="{{ isset($_GET['res']) ? $_GET['res'] : '' }}" />
			<input class="form-control" type="hidden" id="auth" name="auth" value="{{ isset($_GET['auth']) ? $_GET['auth'] : '' }}">
		</form>
		<script type="text/javascript" src="{{asset('centralnorte/js/jquery.min.js')}}"></script>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
		<script>
			$(document).ready(function(){
				$("#vid")[0].load();
				$("#vid")[0].play();

				setTimeout(function(){
					console.log('17 segundos');
					// document.getElementById("loginform").submit();	
				}, 17000);

				$("#vid").on('ended', function(){
					// document.getElementById("loginform").submit();
				});
			});
		</script>
	</body>
</html>

