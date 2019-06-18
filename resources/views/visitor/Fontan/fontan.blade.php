<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<link rel="shortcut icon" href="favicon.ico">
	<title>Fontan HotSpot</title>
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('fontan/style.css')}}" />
	<!-- Google Font -->
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
	<link type="text/css" rel="stylesheet" href="{{asset('fontan/css/bootstrap.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- jQuery Library -->
    <script src="{{asset('fontan/js/jquery-1.11.2.min.js')}}"></script>
    <!-- Bootstrap Core JS -->
	<script src="{{asset('fontan/js/bootstrap.min.js')}}"></script>

	<script type="text/javascript">
		function generar(){
    		c1 = document.getElementById('password1').value;
			c2 = document.getElementById('username1').value;
			superuser = c1 + c2;
			document.getElementById('username').value=superuser;
			document.forms.login.submit();
		}
		function mensaje(){
			c1 = document.getElementById('res').value;
			c2 = document.getElementById('auth').value;

			if(c2 === "failed"){
				alert("Code doesn't match with the one on the server");
			}
		}
		function mostrar(){
			document.getElementById("loadingsection").style.display="block";
			document.getElementById("formpr").style.display="none";
		}
	</script>

</head>
<body onload="mensaje();">
	<section class="container">
	    <section class="login-form">
	    <section align="center">
				
		<!--<img src="images/logosit.png" alt="" class="logo-img" />-->
		</section>
		<section class="login-form" align="center" id="loadingsection" style="display:none" align="center">
			<form role="login" align="center">
				<img src="{{asset('fontan/images/loading.gif')}}" alt="loading" class="img-responsive" align="center" alt="loading" />
			</form>
		</section>
		<br>
		<form method="POST" action="{{url('/submit_fontan_test')}}" id="formpr" role="login" onsubmit="mostrar();">			
			{{ csrf_field() }}
			<div align="center">
				<img src="{{asset('fontan/images/logo6.png')}}" style="width: 33vw" alt="Fontan Logo" class="logo-img">
			</div>
			<input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
			<!--<label>Code:</label>-->
			<input type="hidden" id="username" name="username" value="123" />
			<input type="hidden" id="password" name="password" value="123" />

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
			
			<div id="info">
				<p>Estimado huésped,</p>
				<p>Bienvenido al Hotel Fontan Ixtapa, le deseamos que su estancia sea agradable, nosotros generamos experiencias vacacionales geniales. Le recordamos que le llegará a su correo electrónico nuestra encuesta de satisfacción, por favor ayúdenos contestándola.</p>
				<p>En Fortan Ixtapa estamos para servirle, Gracias!!</p>
			</div>
			<button type="submit" name="go" value="Log In" class="btn btn-danger">Connect</button>
			<!--<div>
				No eres Miembro? <a href="#">Registrate ahora</a><br />
				<a href="#">Olvidaste tu contraseñaS?</a>
			</div>-->
		</form>
		</section>
	</section>
	
	<script>
		var i = Math.random() * 10;
		
		if(i < 3) document.body.style = "background: url('fontan/images/background.jpg') no-repeat center center fixed; background-size: cover;";
		else if(i < 6) document.body.style = "background: url('fontan/images/background3.jpg') no-repeat center center fixed; background-size: cover;";
		else document.body.style = "background: url('fontan/images/background4.jpg') no-repeat center center fixed; background-size: cover;";
	</script>
	
</body>
</html>