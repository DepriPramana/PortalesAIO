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
    <form class="" action="index.html" method="post">
    <h1>Free wifi</h1>
    <h3>Bienvenido a free wifi</h3>
    <div class="">
    <input type="text" name="" value="" placeholder="Nombre completo" required>
    <br>
    <p>País</p>
    <select id="select_pais"class="select2" name="">
      <option value="">Seleccione una opcion</option>
    </select>
    <br>
    <br>
    <input type="email" name="" value="" placeholder="Correo" required>
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
