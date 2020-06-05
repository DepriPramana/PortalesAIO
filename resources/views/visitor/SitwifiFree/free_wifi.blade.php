<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
  <title>Free wifi</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('free_wifi/css/styles.css')}}">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-5FVJ4HYZSZ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-5FVJ4HYZSZ');
  </script>
</head>

<body>

  <header style="text-align: center;">
    <img id="logo" src="{{asset('free_wifi/images/logo_station.jpeg')}}" alt="logo">
    <!-- <h2><a href="#">Free wifi</a></h2>-->
  </header>

  <section class="bienvenida">

    <div style="text-align: center;">
      <img id="portal_img" alt="Cargando...">
    </div>


        <div class="choice_btn">
          <button type="button" name="button" class="btn btn_freewifi">FreeWifi</button>
          <button type="button" name="button" class="btn btn_roaming" style="display: none;" disabled>Premium</button>

        </div>


    <div class="form_div" style="display: none; text-align: center;">
      <form id="myForm" class="" action="{{url('/submit_freewifi')}}" method="post">
        {{ csrf_field() }}
        <input class="form-control" type="hidden" id="site_code" name="site_code" />
        <input class="form-control" type="hidden" id="vendor" name="vendor" />
        <input class="form-control" type="hidden" id="model" name="model" />
        <input class="form-control" type="hidden" id="type" name="type" />
        <input class="form-control" type="hidden" id="os_name" name="os_name" />
        <input class="form-control" type="hidden" id="os_version" name="os_version" />
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

        <!-- <h1>Free wifi</h1>
        <h3>Bienvenido a free wifi</h3> -->

        <div class="inputs">
          <!--<label>Nombre</label>
          <input type="text" id="name" name="name" value="" placeholder="Nombre completo" required>
          <br>
          <label>País</label>
          <select id="select_pais" name="select_pais" class="select2" required>
            <option value="">Seleccione una opcion</option>
          </select>
          <br>
          <label>Edad</label>
          <input type="number" id="edad" name="edad" placeholder="Edad" required>
          <br>
          <label>Género</label>
          <select id="genero" name="genero" class="select2" required>
            <option value="">Seleccione una opcion</option>
            <option value="1">Masculino</option>
            <option value="2">Femenino</option>
          </select>
          <br>-->
          <label>Correo electrónico</label>
          <input type="email" id="email" name="email" value="" placeholder="Correo" required>

          <div id="div_check">
            <input type="checkbox" id="terms" name="terms" value="">
            <label for="terms">He leído y acepto <a href="{{asset('free_wifi/terminos_condiciones.pdf')}}" target='_blank'>aviso de privacidad, términos y condiciones.</a></label>
          </div>
          <br>
          <button id="free_submit" type="submit" name="button">Continuar</button>
        </div>


      </form>
    </div>

  </section>

  <footer>
		<p>Ayuda telefónica <strong>800 112 1122</strong></p>
	</footer>

</body>
<script src="{{ asset('free_wifi/js/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{ asset('free_wifi/js/select2/dist/css/select2.css') }}" type="text/css" />
<script src="{{ asset('free_wifi/js/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>

<script src="{{ asset('free_wifi/js/countries.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/UAParser.js/0.7.19/ua-parser.min.js"></script>
<script src="{{asset('bluebay/js/sweetalert-master/dist/sweetalert.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('bluebay/js/sweetalert-master/dist/sweetalert.css')}}">

<script>

  var imagen = Math.random();

  if(imagen < 0.33) {
    document.getElementById("portal_img").src = '{{asset('free_wifi/images/portal1.jpeg')}}';
  } else if(imagen < 0.66) {
    document.getElementById("portal_img").src = '{{asset('free_wifi/images/portal2.jpeg')}}';
  } else {
    document.getElementById("portal_img").src = '{{asset('free_wifi/images/portal3.jpeg')}}';
  }

  var currentURL = window.location.href;
  var currentHost = window.location.hostname;
  var variables = currentURL.split("?");

  $(function() {
      var ua = new UAParser();
    	var result = ua.getResult();
    	//console.log(result);
    	//console.log(result.browser);
    	//console.log(result.device);
    	//console.log(result.os);

      $('#vendor').val(result.device.vendor);
      $('#model').val(result.device.model);
      $('#type').val(result.device.type);
      $('#os_name').val(result.os.name);
      $('#os_version').val(result.os.version);
  });

  $('.btn_freewifi').on('click', function(){
    console.log('click');
    console.log('');
    $('.choice_btn').css("display","none");
    $('.form_div').css("display","block");
  });
  $('.btn_roaming').on('click', function(){
    var url_full = "http://wifimedia.mx/rmg/" + variables[1];
    var url_roaming = "http://wifimedia.mx/rmg/";
    //console.log(url_full);
    window.location.href = url_roaming;
  });
  $('#myForm').submit(function() {
    if(!$('#terms').is(':checked')){
        swal({title: "Error!", text:"Acepte los términos y condiciones para conectarse a la red.", type:"error", confirmButtonText: "Continuar" });
        return false;
    }else{
      return true;
    }
  });
</script>
</html>
