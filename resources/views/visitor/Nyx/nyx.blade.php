<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ trans('meta.description') }}">
    <meta name="author" content="{{ trans('meta.author') }}">
    <!--<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('hacienda/favicon.ico') }}">-->
    <title>{{$html_title}}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <!-- faIonicons -->
    <link href="{{ asset('hacienda/socialite/plugins/fa-Ionicons/font-awesome-4.7.0/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('hacienda/socialite/plugins/bootstrap-3.3.7/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Social CSS -->
    <link href="{{ asset('hacienda/socialite/plugins/bootstrap-social/bootstrap-social.css') }}" rel="stylesheet" type="text/css" />
    <!-- Toast CSS -->
    <link href="{{ asset('hacienda/socialite/plugins/toast-master/css/jquery.toast.css') }}" rel="stylesheet" type="text/css" />
    <!-- Materialize CSS -->
    <link href="{{ asset('hacienda/socialite/plugins/materialize/css/materialize.css') }}" rel="stylesheet" type="text/css" />
    <!-- animation CSS -->
    <link href="{{ asset('hacienda/socialite/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- style CSS -->
    <link href="{{ asset('hacienda/socialite/css/style2.css') }}" rel="stylesheet" type="text/css" />
    <!--supersized CSS-->
    <link href="{{ asset('hacienda/socialite/plugins/supersized/css/supersized.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
  <body>

    <section id="wrapper" class="free_section" style="display: block;">
      <div class="login-box">
        <div class="white-box">
          <div class="title_mod">
              <!-- <h2 class="box-title-two"><p class="inline" >Ocean</p> <p class="inline subtitle">Maya Royale</p>
              <br>
              <p class="box-title-two simbolos">*****</p></h2> -->
          </div>

          <h3 class="box-title m-b-0 center-align">{{ __('nyx_msg.title')}}</h3>
          <center>
            <small>{{ __('nyx_msg.subtitle')}}</small>
          </center>
          <div class="center"><a href="" id="link_es">ES</a> / <a href="" id="link_en">EN</a></div>


          <div class="form-horizontal">
            <div class="form-group  m-t-20">
              <div class="col-xs-12">
                <!-- <input type="text" name="sdasd" disabled placeholder="Rate: 1024 Kb"> -->
                <!-- <div class="well well-sm"> Service features <b>Premium Daily Non Member.</b></div>
                <div class="well well-sm"> Service features <b>Premium Weekly Non Member.</b></div>
                <div class="well well-sm"> Service features <b>Premium Daily Member.</b></div>
                <div class="well well-sm"> Service features <b>Premium Weekly Member.</b></div> -->


                <form id="form-free" method="POST" action="{{url('/submit_nyx')}}" style="display: block;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>{{ __('nyx_msg.boxfree_txt_title')}}</b>
                    <h6><b>{{ __('nyx_msg.boxfree_txt_subtitle')}}</b> <i class="fa fa-download"></i> 1024 / <i class="fa fa-upload"></i> 1024 Kb.</h6>


                  </div>
                  <hr>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />

                  <label>{{ __('nyx_msg.free_form_reserva')}}</label>
                  <input type="text" name="reserva" id="reserva" placeholder="{{ __('nyx_msg.free_form_reserva_placeholder')}}">


                  <label>{{ __('nyx_msg.free_form_name')}}</label>
                  <input type="text" name="name" id="name" placeholder="{{ __('nyx_msg.free_form_name_placeholder')}}">

                  <label>{{ __('nyx_msg.free_form_lastname')}}</label>
                  <input type="text" name="lastname" id="lastname" placeholder="{{ __('nyx_msg.free_form_lastname_placeholder')}}">

                  <label>{{ __('nyx_msg.free_form_fechanac')}}</label>
                  <input type="text" name="fecha_nac" id="fecha_nac" placeholder="{{ __('nyx_msg.free_form_fechanac_placeholder')}}">

                  <label>{{ __('nyx_msg.free_form_email')}}</label>
                  <input id="email_address" name="email_address" class="form-control" type="email" required="" placeholder="{{ __('nyx_msg.free_form_email_placeholder')}}">

                  <div class="information-hidden">
                    <input class="form-control" type="hidden" name="url" id="url" value="{{ isset($_GET['url']) ? $_GET['url'] : '' }}" />
                    <input class="form-control" type="hidden" name="proxy" id="proxy" value="{{ isset($_GET['proxy']) ? $_GET['proxy'] : '' }}" />
                    <input class="form-control" type="hidden" id="sip" name="sip" value="{{ isset($_GET['sip']) ? $_GET['sip'] : '' }}" />
                    <input class="form-control" type="hidden" id="mac" name="mac" value="{{ isset($_GET['mac']) ? $_GET['mac'] : '' }}" />
                    <input class="form-control" type="hidden" id="client_mac" name="client_mac" value="{{ isset($_GET['client_mac']) ? $_GET['client_mac'] : '' }}" />
                    <input class="form-control" type="hidden" id="uip" name="uip" value="{{ isset($_GET['uip']) ? $_GET['uip'] : '' }}" />
                    <input class="form-control" type="hidden" id="ssid" name="ssid" value="{{ isset($_GET['ssid']) ? $_GET['ssid'] : '' }}" />
                    <input class="form-control" type="hidden" id="vlan" name="vlan" value="{{ isset($_GET['vlan']) ? $_GET['vlan'] : '' }}" />
                    <input class="form-control" type="hidden" id="res" name="res" value="{{ isset($_GET['res']) ? $_GET['res'] : '' }}" />
                    <input class="form-control" type="hidden" id="auth" name="auth" value="{{ isset($_GET['auth']) ? $_GET['auth'] : '' }}">
                  </div>

                  <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                      <button id="btnlogin-free" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('nyx_msg.btn_log')}}</button>
                    </div>
                  </div>
                </form>

                <br>

                <div class="form-group">
                  <div class="col-md-12">
                    <div class="checkbox checkbox-info pull-left p-t-0">
                      <input id="checkbox-signup" name="checkbox-signup"type="checkbox">
                      <label for="checkbox-signup"><p id='texto-terminos'> {{ __('nyx_msg.terms')}}</p></label>
                    </div>
                    <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-info-circle m-r-5"></i> {{ __('nyx_msg.icon')}}.</a>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="white-box">
              <!-- sample modal content -->
              <!-- /.modal -->
              <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h4 class="modal-title">{{ __('nyx_msg.title_term') }}</h4> </div>
                          <div class="modal-body">
                            @if ($id_site == 1)
                              <ul class="list-unstyled">
                                <li><b>{{ __('nyx_msg.term_paragraph1') }}</b>
                                  <ul>
                                    <li>
                                      <b>{{ __('nyx_msg.term_paragraph2') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph3') }}
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph4') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('nyx_msg.term_paragraph5') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph6') }}
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph7') }}
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph8') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('nyx_msg.term_paragraph9') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph10') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('nyx_msg.term_paragraph11') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph12') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('nyx_msg.term_paragraph13') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph14') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('nyx_msg.term_paragraph15') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph16') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('nyx_msg.term_paragraph17') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph18') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('nyx_msg.term_paragraph19') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph20') }}
                                    </li>
                                    <li>
                                      {{ trans('nyx_msg.term_paragraph21') }}
                                    </li>
                                  </ul>
                                </li>
                              </ul>
                            @endif
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{ trans('nyx_msg.close_modal') }}</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Button trigger modal -->
          </div>
        </div>
      </div>
    </section>

    <!-- All Jquery -->
      <script>
        var id_site = "{{$id_site}}";
        if (id_site == 1) {
          var images_supersized = [
            {image: "{{ asset('Nyx/img/nyx1.jpg') }}"},
            {image: "{{ asset('Nyx/img/nyx2.jpg') }}"},
            {image: "{{ asset('Nyx/img/nyx3.jpg') }}"},
          ];
        }
      </script>
      <script src="{{ asset('hacienda/socialite/plugins/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="{{ asset('hacienda/socialite/plugins/bootstrap-3.3.7/dist/js/bootstrap.min.js') }}"></script>
      <!-- Toast JavaScript -->
      <script src="{{ asset('hacienda/socialite/plugins/toast-master/js/jquery.toast.js') }}"></script>
      <!-- Calendar JavaScript -->
      <script src="{{ asset('hacienda/socialite/plugins/moment/moment.js') }}"></script>
      <!--supersized JavaScript-->
      <script src="{{ asset('hacienda/socialite/plugins/supersized/js/supersized.3.2.7.min.js') }}"></script>
      <script src="{{ asset('hacienda/socialite/plugins/supersized/js/supersized-init.js') }}"></script>

      <!-- supersized-init.js aqui estan los backgrounds. -->
      <!-- Materialize JavaScript -->
      <!-- <script src="{{ asset('hacienda/socialite/plugins/materialize/js/materialize.js') }}"></script> -->
      <!-- Script JavaScript-->
      <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
      <script src="{{ asset('Nyx/js/script_nyx.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>
