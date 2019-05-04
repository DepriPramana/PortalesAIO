<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<link rel="shortcut icon" href="favicon.ico">
	<title>Bluebay GrandEsmeralda</title>
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('bluebay/style.css')}}" />
	<!-- Google Font -->
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
	<link type="text/css" rel="stylesheet" href="{{asset('bluebay/css/bootstrap.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- jQuery Library -->
    <script src="{{asset('bluebay/js/jquery-1.11.2.min.js')}}"></script>
    <!-- Bootstrap Core JS -->
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('bluebay/js/sweetalert-master/dist/sweetalert.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('bluebay/js/sweetalert-master/dist/sweetalert.css')}}">

	<script type="text/javascript">
		function validarEmail(){
			if ($('#wificode').val() == "" || $('#apellido').val() == "" || $('#nombre').val() == "" || $('#email').val() == ""){
                swal({   title: "Error!",   text: "Please fill all the fields",   type: "error",   confirmButtonText: "Continue" });
            }else if(!$('#check').is(':checked')){
                swal({title: "Error!", text:"Please Accept the terms and conditions to connect to the network.", type:"error", confirmButtonText: "Continue" });
            }else{
				var correo = $('#email').val();
			    var data = {email:  correo};
			    $.post('php/validation.php', data, function(data2){
			    	console.log(data2);
			    	if(data2 == "TRUE"){
			    		swal({   title: "Loggin in!",   text: "You are being redirected",   type: "success",   confirmButtonText: "Continue" }, function(){
                    		$('#formpr').submit();
                		});
                		mostrar();
			    	}else{
			    		swal({title: "Error!", text:"Please type a valid email.", type:"error", confirmButtonText: "Continue" });
			    	}
	            });
            }
		}
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
				swal({title: "Error!", text:"Code doesn't match or you are using a highspeed code on the free wifi, please try again.", type:"error", confirmButtonText: "Continue" });
			}
		}
		
		function mostrar(){
			document.getElementById("loadingsection").style.display="block";
			document.getElementById("formpr").style.display="none";
		}
	</script>
</head>

<body id="bodybg" onload="mensaje();">
	
	<section class="container">

	    <section class="login-form">
	    <section align="center">
				<img src="{{asset('bluebay/images/logo_nuevo.png')}}" width="60%" height="60%" alt="Bluebay Logo" class="logo-img">
				<!--<img src="images/logosit.png" alt="" class="logo-img" />-->
		</section>
		<section class="login-form" align="center" id="loadingsection" style="display:none" align="center">
			<form role="login" align="center">
				<img src="{{asset('bluebay/images/load2.gif')}}" alt="loading" class="img-responsive" align="center" alt="loading" />
			</form>
		</section>
		<br>

		<form method="POST" action="{{url('/submit_bluebay')}}" id="formpr" role="login">
			<input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
			<label>Clave/Internet Code:</label>
			<input type="text" id="wificode" name="wificode" class="form-control" required/>
			<label>Apellido/Last name:</label>
			<input type="text" name="apellido" id="apellido" style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" required class="form-control" />
			<label>Nombre/First name:</label>
			<input type="text" name="nombre" id="nombre" style="text-transform:uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" required class="form-control">
			<label>Email:</label>
			<input type="email" id="email" name="email" required class="form-control" />

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

			<input type="checkbox" id="check"> <a href="{{asset('bluebay/Políticas_de_Uso_de_Internet_Hotel_V2.pdf')}}" target="_blank"><b style="color: white">Acepto/Accept Términos y Condiciones</b></a>
						
			<button type="button" name="go" value="Log In" class="btn btn-danger" onclick="validarEmail();">Log in</button>
			
		</form>
		</section>
	</section>


</body>
</html>