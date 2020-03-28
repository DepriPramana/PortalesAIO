<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Free wifi</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('free_wifi/css/styles.css')}}">

</head>

<body>

  <header>
    <h2><a href="#">Free wifi</a></h2>
  </header>


  <section class="bienvenida" style="width:100%;">
    <div class="background-image" style="background-image: url(free_wifi/images/cancun_playa.jpg);width:100%;height:100%;"></div>
    <form class="" action="{{url('/submit_freewifi')}}" method="post">
      {{ csrf_field() }}
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

      <h1>Free wifi</h1>
      <h3>Bienvenido a free wifi</h3>
      <div class="">
      <input type="text" id="name" name="name" value="" placeholder="Nombre completo" required>
      <br>
      <p>País</p>
      <select id="select_pais" name="select_pais" class="select2" required>
        <option value="">Seleccione una opcion</option>
      </select>
      <br>
      <br>
      <input type="email" id="email" name="email" value="" placeholder="Correo" required>
      </div>
      <br>
      <button type="submit" name="button" class="btn">Continuar</button>
    </form>

  </section>


</body>
<script src="{{ asset('free_wifi/js/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{ asset('free_wifi/js/select2/dist/css/select2.css') }}" type="text/css" />
<script src="{{ asset('free_wifi/js/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>

<script src="{{ asset('free_wifi/js/countries.js')}}" type="text/javascript"></script>
</html>
