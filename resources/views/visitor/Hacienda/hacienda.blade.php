<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Portal</title>
    <link rel="stylesheet" href="hacienda/css/bootstrap.min.css">
    <style media="screen">
    .carousel-item {
      height: 100vh;
      min-height: 300px;
      background: no-repeat center center scroll;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    #conectar{
    position:absolute;
    top:35%;
    left: 30%;
    width: 40%;
    height: 30%;
    z-index:10;

    }
    #correo{
      max-width: 100%
    }
    </style>

  </head>

  <body>

    <header>
      <div id="Indicadores" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#Indicadores" data-slide-to="0" class="active"></li>
          <li data-target="#Indicadores" data-slide-to="1"></li>
          <li data-target="#Indicadores" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background:linear-gradient(
              rgba(255, 255, 255, 0.600),
              rgba(250, 250, 250, 0.600)
            ),url('hacienda/img/haciendaencantada.jpg');">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>

          <div class="carousel-item" style="background:linear-gradient(
            rgba(255, 255, 255, 0.600),
            rgba(250, 250, 250, 0.600)
            ),url('hacienda/img/haciendaencantada2.jpg');">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>

          <div class="carousel-item" style="background:linear-gradient(
            rgba(255, 255, 255, 0.600),
            rgba(250, 250, 250, 0.600)
            ),url('hacienda/img/haciendaencantada3.jpg');">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#Indicadores" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
        <a class="carousel-control-next" href="#Indicadores" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
      </div>

      <div id="conectar" class="">
        <div class="row" >
          <div class="col-lg-12 col-md-12 p-1" >
            <img src="hacienda/img/logo/LOGO_HE_R&R-01.png"  class="mx-auto d-block rounded"alt="logo" width='90%'>
          </div>
        </div>
      <form action="http://{{ isset($_GET['sip']) ? $_GET['sip'] : ''}}:9997/login'" method="POST">
      <!-- <form action="https://{{ isset($_GET['sip']) ? $_GET['sip'] : ''}}:9998/SubscriberPortal/hotspotlogin" method="POST" >  -->
        <input type="hidden" id="username" name="username" value="FONTAN1337" />
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

        <div class="row">
          <div class="col-lg-2">

          </div>
          <div class="col-lg-6 col-md-4 col-sm-3 form-group ">
                <input type="email" name="Correo" value="" id="correo"placeholder="user@example.com"  class="form-control " pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" required>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-3 text-center">
                <button type="submit" name="boton-conectar" class="btn btn-dark">Connect</button>
          </div>
          <div class="col-lg-2">

          </div>
        </div>

      </form>
      </div>
    </header>


    <!-- Bootstrap core JavaScript-->
    <script src="hacienda/js/jquery-3.3.1.slim.min.js"></script>
    <script src="hacienda/js/popper.min.js" ></script>
    <script src="hacienda/js/bootstrap.min.js"></script> 

  </body>

</html>
