<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>X Tech Company</title>
	<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{ asset('demo/style.css') }}" >
</head>
<body>
	<div id="fondo">
		<div id="fondo-col-1">
			<img src="{{ asset('demo/XTC_1.jpg')}}" />
			<img src="{{asset ('demo/XTC_3.jpg')}}" />
			<img src="{{asset('demo/XTC_6.jpg')}}" />
			<img src="{{asset('demo/XTC_8.jpg')}}" />
		</div>
		<div id="fondo-col-2">
			<img src="{{asset('demo/XTC_5.jpg')}}" />
			<img src="{{asset('demo/XTC_8.jpg')}}" />
			<img src="{{ asset('demo/XTC_1.jpg')}}" />
			<img src="{{asset('demo/XTC_7.gif')}}" />
		</div>
		<div id="fondo-col-3">
			<img src="{{asset('demo/XTC_2.jpg')}}" />
			<img src="{{asset('demo/XTC_7.gif')}}" />
			<img src="{{asset('demo/XTC_5.jpg')}}" />
			<img src="{{ asset('demo/XTC_1.jpg')}}" />
		</div>
		<div id="fondo-col-4">
			<img src="{{ asset('demo/XTC_1.jpg')}}" />
			<img src="{{asset ('demo/XTC_3.jpg')}}" />
			<img src="{{asset('demo/XTC_6.jpg')}}" />
			<img src="{{asset('demo/XTC_2.jpg')}}" />
		</div>
		<div id="fondo-col-5">
			<img src="{{asset('demo/XTC_5.jpg')}}" />
			<img src="{{asset('demo/XTC_8.jpg')}}" />
			<img src="{{ asset('demo/XTC_1.jpg')}}" />
			<img src="{{asset('demo/XTC_7.gif')}}" />
		</div>
		<div id="fondo-col-6">
			<img src="{{asset('demo/XTC_2.jpg')}}" />
			<img src="{{asset('demo/XTC_7.gif')}}" />
			<img src="{{asset('demo/XTC_5.jpg')}}" />
			<img src="{{ asset('demo/XTC_1.jpg')}}" />
		</div>
	</div>
	<div id="main_div">
		<p id="title">Free Wifi X Tech Company</p>
		<p id="subtitle">! Bienvenido a Cancún !</p>
		<div id="icons_div">
			<img id="despegar" class="icon_selected" src="{{asset('demo/despegar2.png')}}" />
			<img id="aterrizar" src="{{asset('demo/aterrizar.png')}}" />
		</div>
		<form id="form">
			<p id="icon_text">- S A L I D A -</p>
			<div>
				<label>Nombre: </label>
				<input type="text" />
			</div>
			<div>
				<label>Teléfono: </label>
				<input type="number" />
			</div>
			<div>
				<label>País: </label>
				<input type="text" />
			</div>
			<div>
				<label>Correo: </label>
				<input type="email" />
			</div>
			<div>
				<input id="edad" type="checkbox" />
				<label for="edad" class="ignore"> Soy mayor de 18 años.</label>
			</div>
			<div>
				<input id="terminos" type="checkbox" />
				<label for="terminos" class="ignore"> Términos y condiciones.</label>
			</div>
			<div>
				<input id="submit" type="submit" value="I N G R E S A R" />
			</div>
		</form>
	</div>
	<footer>
		<p>&copy; Todos los derechos reservados. info@xtech.com</p>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="{{asset ('demo/script.js')}}"></script>
</body>
</html>
