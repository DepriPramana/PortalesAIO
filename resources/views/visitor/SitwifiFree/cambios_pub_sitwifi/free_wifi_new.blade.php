<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Sitwifi Station</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href={{asset('plugins/bootstrap-4.1.3/dist/css/bootstrap.min.css')}} rel="stylesheet">
    <!-- Bootstrap para el spinner
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    -->
    <!-- Custom styles for this template -->
    <link href="{{asset('free_wifi/css/cover_test.css')}}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5FVJ4HYZSZ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-5FVJ4HYZSZ');
    </script>
  </head>

  <body class="text-center">

    <div class="cover-container d-flex w-100 h-100 mx-auto flex-column">
      <!--<header class="masthead mb-auto">-->
      <header class="masthead mt-2">
        <div class="inner">
          <img id="logo" src="{{asset('free_wifi/images/logo_station.jpeg')}}" alt="logo">
          <!--<h3 class="masthead-brand">Cover</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Contact</a>
          </nav>-->
        </div>
      </header>

      <div class="mt-2 bg_container" role="main" style="height:800px;">
        <main  class="inner cover mb-auto mt-auto">
          <!-- background: #1f410d; -->

          <section class="bienvenida">
            <div class="container">
              <div id="div_img" style="text-align: center; display: none;">
                <p class="lead p-lg-4 p-md-4 p-xs-0 text_cortesia" id="text_cortesia">{{ __('station_msg.text_content_title')}}</p>
                  <div class="col-md-12 h-100">
                      <div class="col-md-12 col-xs-12 my-auto" >
                          <img class="image-fluid mt-lg-4 mt-md-4 mb-lg-4 mb-md-4" style="width: 100% !important;" id="portal_img" alt="pub">
                          <iframe id="ilink" width="100%" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
                      </div>
                  </div>
              </div>
              <div id="div_img2" style="text-align: center; display: none;">
                <p class="lead p-lg-4 p-md-4 p-xs-0 text_cortesia"  id="text_cortesia2">{{ __('station_msg.text_content_title')}}</p>
                  <div class="col-md-12  col-xs-12  h-100">
                          <img class="image-fluid mt-lg-4 mt-md-4 mb-lg-4 mb-md-4" style="width: 100% !important;" id="logo_primera" alt="pub2">
                  </div>
              </div>
            </div>
          </section>


          <!--<div class="spinner-border text-primary btn_spinner" role="status" style="display: block;">
              <span class="sr-only">Loading...</span>
          </div>-->


          <!--<p class="lead">Espere X segundos</p>
          <p class="lead">
            <a href="#" class="btn btn-lg btn-secondary"></a>
          </p>-->
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
              <input class="form-control" type="hidden" id="url" name="url" value="">
              <input class="form-control" type="hidden" id="publicidad" name="publicidad" value="">

              <!-- <h1>Free wifi</h1>
              <h3>Bienvenido a free wifi</h3> -->

              <div class="inputs">
                  <!--<label>Nombre</label>
                  <input type="text" id="name" name="name" value="Metrorrey" placeholder="Nombre completo" required>
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
                  <div class="col-md-8 offset-md-2 mb-5 mt-md-n2" style="display: block;">
                      <p class="lead large text_formulario" style="padding-top: 10px;">{{ __('station_msg.text_form_title_1')}}<br>{{ __('station_msg.text_form_title_1_2')}}</p>

                      <input class="form-control" type="text" id="name" name="name" value="FreeWifi" placeholder="{{ __('station_msg.input_name_placeholder')}}" required>

                      <select class="form-control" id="select_pais" name="select_pais" required>
                        <option value="">{{ __('station_msg.select_country_placeholder')}}</option>
                      </select>

                      <input class="form-control" type="number" id="edad" name="edad" min="10" max="80" placeholder="{{ __('station_msg.input_age_placeholder')}}" required>

                      <select class="form-control" id="genero" name="genero" required>
                        <option value="">{{ __('station_msg.select_gender_placeholder')}}</option>
                        <option value="1">{{ __('station_msg.select_genero_option1')}}</option>
                        <option value="2">{{ __('station_msg.select_genero_option2')}}</option>
                      </select>
                      <input class="form-control" type="email" id="email" name="email" value="" placeholder="{{ __('station_msg.input_email_placeholder')}}" required style="border-radius: 0 !important;">
                      <!--<div class="form-check">
                        <input type="checkbox" class="form-check-input" id="terms" name="terms" value="">
                        <label class="form-check-label" for="terms">He leído y acepto <a href="{{asset('free_wifi/terminos_condiciones.pdf')}}" target='_blank'>aviso de privacidad, términos y condiciones.</a></label>
                      </div>-->
                      <button id="btn-connect" class="btn form-control" id="free_submit" type="submit" name="button" style="border-radius: 0 !important;" >{{ __('station_msg.input_submit_button1')}}</button>
                  </div>

              </div>


            </form>
          </div>

        </main>
      </div>


      <p class="lead" id="p_segundero" style="display: none;">{{ __('station_msg.wait_text')}}<span id="segundero"></span> {{ __('station_msg.seconds_text')}}</p>
      <!--<footer class="mastfoot mt-auto">-->
      <footer class="mastfoot mt-2">
        <!--<p>Ayuda telefónica <strong>800 112 1122</strong></p>-->

        <div class="row">
          <div class="col-2"></div>

          <div class="col-4" style="border-right: 3px solid black;">
            <img id="logosit_foot" class="mt-2" src="{{asset('free_wifi/logo_sitwifi.png')}}" alt="logo_sitwifi" width="100px" height="25px">
          </div>

          <div class="col-4">
            <div class="row">
              <div class="col-6"style="padding-left:5px;">

              </div>
              <div class="col-6" style="padding-left:5px;">

              </div>
            </div>
          </div>

          <div class="col-2"></div>
        </div>
        <div class="mt-2">
          <p class="footer_p" for="terms">{{ __('station_msg.terms_text_1')}} - <a href="{{asset('free_wifi/aviso_privacidad.pdf')}}" target='_blank'style="text-decoration: underline;" >{{ __('station_msg.terms_text_1_2')}}</a>{{ __('station_msg.terms_text_1_3')}}<a href="{{asset('free_wifi/terminos_condiciones.pdf')}}" target='_blank'style="text-decoration: underline;" >{{ __('station_msg.terms_text_1_4')}}</a></p>
          <!--<p class="footer_p" for="terms">Anuncios WiFi por Sitwifi Station - <a href="{{asset('free_wifi/terminos_condiciones.pdf')}}" target='_blank'style="text-decoration: underline;" >Anunciate aquí.</a></p>-->
        </div>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="plugins/bootstrap-4.1.3/site/docs/4.1/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{asset('plugins/bootstrap-4.1.3/site/docs/4.1/assets/js/vendor/popper.min.js')}}"></script>
    <script src={{asset('plugins/bootstrap-4.1.3/dist/js/bootstrap.min.js')}}></script>

    <script src="{{ asset('free_wifi/js/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('free_wifi/js/select2/dist/css/select2.css') }}" type="text/css" />
    <script src="{{ asset('free_wifi/js/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('free_wifi/js/countries.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/UAParser.js/0.7.19/ua-parser.min.js"></script>
    <script src="{{asset('bluebay/js/sweetalert-master/dist/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('bluebay/js/sweetalert-master/dist/sweetalert.css')}}">
    <script>
      function p(probability) {
        return Math.random() < probability;
      }
      function getRandomInt(max) {
        return Math.floor(Math.random() * Math.floor(max));
      }
      var totalTime_one = 5;
      var totalTime_two = 20;
      var url = ""; // redirrecion
      var publicidad = 0;
      var imagen = getRandomInt(4);
      //console.log(imagen)
      //imagen = 4;

      if (imagen == 0) {
        $('#div_img').css("display", "block");
        $('#div_img2').css("display", "none");
        $('.bg_container').css("background-color", "#F6A42F");
        $('.bg_container').css({'background-image' : 'url("free_wifi/pub/test/sitwifi/prueba2.png")', 'background-repeat': 'no-repeat', 'background-size': '100%', 'background-position': 'center'});
        //$('.bg_container').css({'min-width' : '100%'});
        $('.text_cortesia').css("display", "none");
        $('#portal_img').css("display", "none");

        var order_1 = "{{asset('free_wifi/transparency2.png')}}";
        //var order_2 = "{{asset('free_wifi/pub/test/sitwifi/11438.jpg')}}";

        document.getElementById("portal_img").src = order_1;
      }else if(imagen == 1){
        $('#div_img').css("display", "block");
        $('#div_img2').css("display", "none");
        $('.bg_container').css("background-color", "#7CE2E2");
        $('.bg_container').css({'background-image' : 'url("free_wifi/pub/test/sitwifi/foto2.png")', 'background-repeat': 'no-repeat', 'background-size': '100%', 'background-position': 'center'});
        //$('.bg_container').css({'min-width' : '100%'});
        $('.text_cortesia').css("display", "none");
        $('#portal_img').css("display", "none");

        var order_1 = "{{asset('free_wifi/transparency2.png')}}";
        //var order_2 = "{{asset('free_wifi/pub/test/sitwifi/11438.jpg')}}";

        document.getElementById("portal_img").src = order_1;
      }else if(imagen == 2){
        $('#div_img').css("display", "block");
        $('#div_img2').css("display", "none");
        $('.bg_container').css("background-color", "#EFEFEF");
        $('.bg_container').css({'background-image' : 'url("free_wifi/pub/test/sitwifi/foto5.png")', 'background-repeat': 'no-repeat', 'background-size': '100%', 'background-position': 'center'});
        //$('.bg_container').css({'min-width' : '100%'});
        $('.text_cortesia').css("display", "none");
        $('#portal_img').css("display", "none");

        var order_1 = "{{asset('free_wifi/transparency2.png')}}";
        //var order_2 = "{{asset('free_wifi/pub/test/sitwifi/11438.jpg')}}";

        document.getElementById("portal_img").src = order_1;
      }else{
        $('#div_img').css("display", "block");
        $('#div_img2').css("display", "none");
        $('.bg_container').css("background-color", "#DBDCE0");
        $('.bg_container').css({'background-image' : 'url("free_wifi/pub/test/sitwifi/foto3.png")', 'background-repeat': 'no-repeat', 'background-size': '100%', 'background-position': 'center'});
        //$('.bg_container').css({'min-width' : '100%'});
        $('.text_cortesia').css("display", "none");
        $('#portal_img').css("display", "none");

        var order_1 = "{{asset('free_wifi/transparency2.png')}}";
        //var order_2 = "{{asset('free_wifi/pub/test/sitwifi/11438.jpg')}}";

        document.getElementById("portal_img").src = order_1;
      }

      function updateClock_2ndimg() {
        //document.getElementById('segundero').innerHTML = totalTime;
          let height = $('#text_cortesia').height();
          let main_height = $('#main-container').height() * 1.8;
          //let height = $('#text_cortesia2').height();
          let cort_height =  height > 0 ? height : 30;

          if(totalTime_one==0){
            if(imagen == 0){
              $('.bg_container').css({'background-image' : 'none'});

              $('#div_img').css("display", "block");

              $('#portal_img').css("display", "block");

              url = "https://www.google.com"; // redireccion.
              publicidad = 0; // 0 sitwifi 1 pagofon
              $('#url').val(url);
              $('#publicidad').val(publicidad);

              $('#ilink').attr("src", 'free_wifi/pub/test/sitwifi/sitwifi_video.mp4');
              //document.getElementById("portal_img").src = order_2;
            }else if(imagen == 1){
              $('.bg_container').css({'background-image' : 'none'});

              $('#div_img').css("display", "block");

              $('#portal_img').css("display", "block");

              url = "https://www.google.com"; // redireccion.
              publicidad = 0; // 0 sitwifi 1 pagofon
              $('#url').val(url);
              $('#publicidad').val(publicidad);

              $('#ilink').attr("src", 'free_wifi/pub/test/sitwifi/sitwifi_video.mp4');
              //document.getElementById("portal_img").src = order_2;
            }else if(imagen == 2){
              $('.bg_container').css({'background-image' : 'none'});

              $('#div_img').css("display", "block");

              $('#portal_img').css("display", "block");

              url = "https://www.google.com"; // redireccion.
              publicidad = 0; // 0 sitwifi 1 pagofon
              $('#url').val(url);
              $('#publicidad').val(publicidad);

              $('#ilink').attr("src", 'free_wifi/pub/test/sitwifi/sitwifi_video.mp4');
              //document.getElementById("portal_img").src = order_2;
            }else{
              $('.bg_container').css({'background-image' : 'none'});

              $('#div_img').css("display", "block");

              $('#portal_img').css("display", "block");

              url = "https://www.google.com"; // redireccion.
              publicidad = 0; // 0 sitwifi 1 pagofon
              $('#url').val(url);
              $('#publicidad').val(publicidad);

              $('#ilink').attr("src", 'free_wifi/pub/test/sitwifi/sitwifi_video.mp4');
              //document.getElementById("portal_img").src = order_2;
            }
            updateClock_submit();
          }else{
            totalTime_one-=1;
            setTimeout("updateClock_2ndimg()",1000);
          }
      }
      function updateClock_submit() {
        $('#p_segundero').css("display", "block");
        document.getElementById('segundero').innerHTML = totalTime_two;
        if(totalTime_two==0){
          /*if (imagen == 0) {
            $('#portal_img').css("display", "block");
            $('#div_img').css("display", "block");
            $('#div_img2').css("display", "none");
            document.getElementById("portal_img").src = order_1;
            $('#p_segundero').css("display", "none");
            $('#btn-connect').addClass("btn-info");
            $('#btn-connect-asur').addClass("btn-info");
            $('#ilink').css("display", "none");
          }else{
            $('#portal_img').css("display", "block");
            $('#div_img').css("display", "block");
            $('#div_img2').css("display", "none");
            document.getElementById("portal_img").src = order_1;
            $('#p_segundero').css("display", "none");
            $('#btn-connect').addClass("btn-info");
            $('#btn-connect-asur').addClass("btn-info");
            $('#ilink').css("display", "none");
          }*/
          //$('.form_div').css("display", "block");
          //console.log('submitted');
          $("#myForm").submit();
        }else{
          totalTime_two-=1;
          setTimeout("updateClock_submit()",1000);
        }
      }

      function updateClock_submit_noform() {
        $('#p_segundero').css("display", "block");
        document.getElementById('segundero').innerHTML = totalTime_two;
        if(totalTime_two==0){
          //console.log('submitted');
          // $("#myForm").submit();
        }else{
          totalTime_two-=1;
          setTimeout("updateClock_submit()",1000);
        }
      }
      function hide(){
        $('#select_pais').next(".select2-container").hide();
        $('#genero').next(".select2-container").hide();
      }
      $(function() {
          hide();
          updateClock_2ndimg()
          var ua = new UAParser();
          var result = ua.getResult();

          $('#vendor').val(result.device.vendor);
          $('#model').val(result.device.model);
          $('#type').val(result.device.type);
          $('#os_name').val(result.os.name);
          $('#os_version').val(result.os.version);
          //$( "#terms" ).prop( "checked", true );
      });
      function query_sct() {
        url = "https://afac.hostingerapp.com/"; //sct redireccion.
        $('#url').val(url);
        $("#myForm").submit();
      }
      /*$('#myForm').submit(function() {
        if(!$('#terms').is(':checked')){
            swal({title: "Error!", text:"Acepte los términos y condiciones para conectarse a la red.", type:"error", confirmButtonText: "Continuar" });
            return false;
        }else{
          return true;
        }
      });*/
    </script>
  </body>
</html>
