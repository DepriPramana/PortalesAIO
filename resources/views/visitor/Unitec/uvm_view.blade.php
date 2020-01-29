<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="favicon.ico">
	<title>{{$site}}</title>
	<!-- Custom CSS -->
	<!-- <link rel="stylesheet" type="text/css" href="{{asset('palace/cozumel/style.css')}}" /> !>
	<!-- Google Font -->
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
	<link type="text/css" rel="stylesheet" href="{{asset('palace/cozumel/css/bootstrap.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- jQuery Library -->
    <script src="{{asset('palace/cozumel/js/jquery-1.11.2.min.js')}}"></script>
    <!-- Bootstrap Core JS -->
	<script src="{{asset('palace/cozumel/js/bootstrap.min.js')}}"></script>
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
				alert("Room Number or Last Name doesn't match the one given on the front desk");
			}
		}

		function mostrar(){
			document.getElementById("loadingsection").style.display="block";
			document.getElementById("formpr").style.display="none";
		}
	</script>
</head>
<style>
	nav {
		display: flex;
		background: red;
		color: white;
	}

	nav ul li{
		display: inline;
		margin-right: 2em;
	}
	
	nav ul li a{	
		color: white !important;
	}

	nav ul{
		margin: auto;
	}

	.header_logo{
		display: flex;
    	justify-content: flex-end;
	}

	.header_logo img {
		margin-bottom: 20px;
		margin-right: 20px;
	}

	.image-bg img{
		width: 90%;
	}

	footer{
		margin-top: 20px;
		margin-bottom: 20px;
	}

	.mt-5{
		margin-top: 20px;
	}

</style>
<body onload="mensaje();">
	<header>
		<div class="header_logo mb-5">
			<img src="{{asset('palace/cozumel/images/logo_uvm.jpg')}}" width="207" height="100" alt="Playacar Logo" class="logo-img">
		</div>
		<nav>
			<ul>
				<li> <a href="http://www.universidaduvm.mx/conoce-uvm">CONOCE UVM</a> </li>
				<li> <a href="http://www.universidaduvm.mx/programas-academicos">PROGRAMAS ACADEMICOS</a> </li>
				<li> <a href="http://www.universidaduvm.mx/comunidad/alumnos">ALUMNOS</a> </li>
				<li> <a href="http://www.universidaduvm.mx/contacto">CONTACTO</a> </li>
			</ul>
		</nav>
	</header>
	
	<section class="container">
	    <section class="login-form">
	    <section align="center">
				
				<!--<img src="images/logosit.png" alt="" class="logo-img" />-->
		</section>
		<section class="login-form" align="center" id="loadingsection" style="display:none" align="center">
			<form role="login" align="center">
				<img src="{{asset('palace/cozumel/images/loading.gif')}}" alt="loading" class="img-responsive" align="center" alt="loading" />
			</form>
		</section>
		<br>
		<!-- <form id="formpr" name="formpr" method="POST" action="http://{{ isset($_GET['sip']) ? $_GET['sip'] : '' }}:9997/login" onsubmit="mostrar();"> -->
		<form method="POST" action="{{url('/submit_uvm')}}" id="formpr" role="login" onsubmit="mostrar();">
			<div class="row">
				<div class="col-sm-6 image-bg">
					<img class="" src="{{asset('palace/cozumel/images/bg_uvm.png')}}" alt="">
				</div>
				<div class="col-sm-6">
					{{ csrf_field() }}
					<input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
					<!-- <label>Room:</label>
					<input type="number" onkeyup="generar()" name="username1" id="username1" required  autofocus class="form-control" />
					<input type="hidden" id="username" name="username" >

					<label>Last name:</label>
					<input type="text" onkeyup="generar()" name="password1" id="password1" style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" required class="form-control" /> -->

					<label>Usuario:</label>
					<input type="text" name="username" id="username" required  autofocus class="form-control" />
					<br>
					<label>Password:</label>
					<input type="text" name="password" id="password" required class="form-control" />


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

					<button type="submit" name="go" value="Log In" class="btn btn-danger mt-5">Entrar</button>
					<!--<div>
						No eres Miembro? <a href="#">Registrate ahora</a><br />
						<a href="#">Olvidaste tu contraseñaS?</a>
					</div>-->
				</div>
			</div>
		</form>
		</section>
	</section>
	<footer class="text-center">
		<p>Portal de acceso a red Wi-Fi</p>
		<p>D.R.© Universidad del Valle de México, México. Laureate International Universities.</p>
		<p>2020</p>
	</footer>
</body>
</html>
