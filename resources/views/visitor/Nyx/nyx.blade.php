<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ trans('meta.description') }}">
    <meta name="author" content="{{ trans('meta.author') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('hacienda/favicon.ico') }}">
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

          <h3 class="box-title m-b-0 center-align">{{ __('hacienda_msg.title')}}</h3>
          <center>
            <small>{{ __('hacienda_msg.subtitle')}}</small>
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
                <!-- Botones de servicios. -->
                <div id="opcion-free" style="cursor: pointer;" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('hacienda_msg.btn_free')}}</button>
                  </div>
                </div>
                <div id="opcion-1" style="cursor: pointer;" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('hacienda_msg.btn_premium1')}}</button>
                  </div>
                </div>
                <div id="opcion-2" style="cursor: pointer;" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('hacienda_msg.btn_premium2')}}</button>
                  </div>
                </div>
                <div id="opcion-3" style="cursor: pointer;" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('hacienda_msg.btn_premium3')}}</button>
                  </div>
                </div>
                <div id="opcion-4" style="cursor: pointer;" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('hacienda_msg.btn_premium4')}}</button>
                  </div>
                </div>

                <div id="back-btn" style="cursor: pointer; display: none;" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button"><i class="fa fa-arrow-left"></i> {{ __('hacienda_msg.btn_return')}}</button>
                  </div>
                </div>

                <form id="loginform" name="loginform" method="POST" action="http://{{isset($_GET['sip']) ? $_GET['sip'] : '' }}:9997/login">
                  <div class="information-hidden" id="login_form_1">
                    <input class="form-control" type="hidden" name="username" id="username">
                    <input class="form-control" type="hidden" name="password" id="password" value="123">
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
                </form>

                <form id="form-free" method="POST" action="{{url('/submit_hacienda_free')}}" style="display: none;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>{{ __('hacienda_msg.boxfree_txt_title')}}</b>
                    <h6><b>{{ __('hacienda_msg.boxfree_txt_subtitle')}}</b> <i class="fa fa-download"></i> 1024 / <i class="fa fa-upload"></i> 1024 Kb.</h6>
                    <h6><b>{{ __('hacienda_msg.boxfree_txt_subtitle1')}}</b> <i class="fa fa-clock-o"></i> {{ __('hacienda_msg.boxfree_txt_subtitle2')}}</h6>
                    <h6><b>{{ __('hacienda_msg.boxfree_txt_subtitle3')}}</b> {{ __('hacienda_msg.boxfree_txt_subtitle4')}}</h6>
                  </div>
                  <hr>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />
                  <label>{{ __('hacienda_msg.free_form_name')}}</label>
                  <input type="text" name="fullname" id="fullname" placeholder="{{ __('hacienda_msg.free_form_name_placeholder')}}">
                  <label>{{ __('hacienda_msg.free_form_email')}}</label>
                  <input id="email_address" name="email_address" class="form-control" type="email" required="" placeholder="{{ __('hacienda_msg.free_form_email_placeholder')}}">

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
                      <button id="btnlogin-free" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('hacienda_msg.btn_log')}}</button>
                    </div>
                  </div>
                </form>

                <form id="form-1" style="display: none;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>{{ __('hacienda_msg.boxpremium_title')}}</b>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle')}}</b> <i class="fa fa-download"></i> 2000 / <i class="fa fa-upload"></i> 2000 Kb.</h6>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle1')}}</b> <i class="fa fa-clock-o"></i> 24 {{ __('hacienda_msg.boxpremium_subtitle2')}}</h6>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle3')}}</b> 12 USD</h6>
                  </div>
                  <hr>
                  <div class="well well-sm">{{ __('hacienda_msg.boxpremium_browse')}}</div>
                  <div class="form-group" id="div-checks1">
                    <div class="col-md-12">
                      <div class="radio pull-left p-t-0">
                        <input id="room_radio" name="room_or_acc" type="radio" value="room" checked>
                        <label for="room_radio"><i class="fa fa-bed"> {{ __('hacienda_msg.boxpremium_charge')}}</i></label>
                          <br>
                        <input id="existing_acc" name="room_or_acc" type="radio" value="existing">
                        <label for="existing_acc"><i class="fa fa-globe"> {{ __('hacienda_msg.boxpremium_existing')}}</i></label>
                      </div>
                    </div>
                  </div>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />
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
                  <label>{{ __('hacienda_msg.boxpremium_form_lastname')}}</label>
                  <input type="text" name="lastname" id="lastname" placeholder="{{ __('hacienda_msg.boxpremium_form_lastname_placeholder')}}">

                  <label>{{ __('hacienda_msg.boxpremium_form_room')}}</label>
                  <input type="number" name="room" id="room" placeholder="{{ __('hacienda_msg.boxpremium_form_room_placeholder')}}">

                  <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                      <button id="btnlogin-1" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('hacienda_msg.btn_log')}}</button>
                    </div>
                  </div>
                </form>

                <form id="form-2" style="display: none;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>{{ __('hacienda_msg.btn_premium2')}}</b>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle')}}</b> <i class="fa fa-download"></i> 2000 / <i class="fa fa-upload"></i> 2000 Kb.</h6>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle1')}}</b> <i class="fa fa-clock-o"></i> 168 {{ __('hacienda_msg.boxpremium_subtitle2')}}</h6>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle3')}}</b> 60 USD</h6>
                  </div>
                  <hr>
                  <div class="well well-sm">{{ __('hacienda_msg.boxpremium_browse')}} </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio pull-left p-t-0">
                        <input id="room_radio2" name="room_or_acc" type="radio" value="room" checked>
                        <label for="room_radio2"><i class="fa fa-bed"> {{ __('hacienda_msg.boxpremium_charge')}}</i></label>
                          <br>
                        <input id="existing_acc2" name="room_or_acc" type="radio" value="existing">
                        <label for="existing_acc2"><i class="fa fa-globe"> {{ __('hacienda_msg.boxpremium_existing')}}</i></label>
                      </div>
                    </div>
                  </div>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />
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
                  <label>{{ __('hacienda_msg.boxpremium_form_lastname')}}</label>
                  <input type="text" name="lastname" id="lastname" placeholder="{{ __('hacienda_msg.boxpremium_form_lastname_placeholder')}}">

                  <label>{{ __('hacienda_msg.boxpremium_form_room')}}</label>
                  <input type="number" name="room" id="room" placeholder="{{ __('hacienda_msg.boxpremium_form_room_placeholder')}}">

                  <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                      <button id="btnlogin-2" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('hacienda_msg.btn_log')}}</button>
                    </div>
                  </div>
                </form>

                <form id="form-3" style="display: none;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>{{ __('hacienda_msg.btn_premium3')}}</b>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle')}}</b> <i class="fa fa-download"></i> 4500 / <i class="fa fa-upload"></i> 3200 Kb.</h6>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle1')}}</b> <i class="fa fa-clock-o"></i> 24 {{ __('hacienda_msg.boxpremium_subtitle2')}}</h6>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle3')}}</b> 10 USD</h6>
                  </div>
                  <hr>
                  <div class="well well-sm">{{ __('hacienda_msg.boxpremium_browse')}} </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio pull-left p-t-0">
                        <input id="room_radio3" name="room_or_acc" type="radio" value="room" checked>
                        <label for="room_radio3"><i class="fa fa-bed"> {{ __('hacienda_msg.boxpremium_charge')}}</i></label>
                          <br>
                        <input id="existing_acc3" name="room_or_acc" type="radio" value="existing">
                        <label for="existing_acc3"><i class="fa fa-globe"> {{ __('hacienda_msg.boxpremium_existing')}}</i></label>
                      </div>
                    </div>
                  </div>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />
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
                  <label>{{ __('hacienda_msg.boxpremium_form_lastname')}}</label>
                  <input type="text" name="lastname" id="lastname" placeholder="{{ __('hacienda_msg.boxpremium_form_lastname_placeholder')}}">

                  <label>{{ __('hacienda_msg.boxpremium_form_room')}}</label>
                  <input type="number" name="room" id="room" placeholder="{{ __('hacienda_msg.boxpremium_form_room_placeholder')}}">

                  <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                      <button id="btnlogin-3" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('hacienda_msg.btn_log')}}</button>
                    </div>
                  </div>
                </form>

                <form id="form-4" style="display: none;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>{{ __('hacienda_msg.boxpremium_title4')}}</b>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle')}}</b> <i class="fa fa-download"></i> 4500 / <i class="fa fa-upload"></i> 3200 Kb.</h6>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle1')}}</b> <i class="fa fa-clock-o"></i> 168 {{ __('hacienda_msg.boxpremium_subtitle2')}}</h6>
                    <h6><b>{{ __('hacienda_msg.boxpremium_subtitle3')}}</b> 48 USD</h6>
                  </div>
                  <hr>
                  <div class="well well-sm">{{ __('hacienda_msg.boxpremium_browse')}} </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio pull-left p-t-0">
                        <input id="room_radio4" name="room_or_acc" type="radio" value="room" checked>
                        <label for="room_radio4"><i class="fa fa-bed"> {{ __('hacienda_msg.boxpremium_charge')}}</i></label>
                          <br>
                        <input id="existing_acc4" name="room_or_acc" type="radio" value="existing">
                        <label for="existing_acc4"><i class="fa fa-globe"> {{ __('hacienda_msg.boxpremium_existing')}}</i></label>
                      </div>
                    </div>
                  </div>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />
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
                  <label>{{ __('hacienda_msg.boxpremium_form_lastname')}}</label>
                  <input type="text" name="lastname" id="lastname" placeholder="{{ __('hacienda_msg.boxpremium_form_lastname_placeholder')}}">
                  <label>{{ __('hacienda_msg.boxpremium_form_room')}}</label>
                  <input type="number" name="room" id="room" placeholder="{{ __('hacienda_msg.boxpremium_form_room_placeholder')}}">

                  <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                      <button id="btnlogin-4" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">{{ __('hacienda_msg.btn_log')}}</button>
                    </div>
                  </div>
                </form>

                <br>

                <div class="form-group">
                  <div class="col-md-12">
                    <div class="checkbox checkbox-info pull-left p-t-0">
                      <input id="checkbox-signup" name="checkbox-signup"type="checkbox">
                      <label for="checkbox-signup"><p id='texto-terminos'> {{ __('hacienda_msg.terms')}}</p></label>
                    </div>
                    <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-info-circle m-r-5"></i> {{ __('hacienda_msg.icon')}}.</a>
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
                              <h4 class="modal-title">{{ __('hacienda_msg.title_term') }}</h4> </div>
                          <div class="modal-body">
                            @if ($id_site == 1)
                              <ul class="list-unstyled">
                                <li><b>{{ __('hacienda_msg.term_paragraph1') }}</b>
                                  <ul>
                                    <li>
                                      <b>{{ __('hacienda_msg.term_paragraph2') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph3') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph4') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph5') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph6') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph7') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph8') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph9') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph10') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph11') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph12') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph13') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph14') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph15') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph16') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph17') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph18') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph19') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph20') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph21') }}
                                    </li>
                                  </ul>
                                </li>
                              </ul>
                            @elseif ($id_site == 2)
                              <ul class="list-unstyled">
                                <li><b>{{ __('hacienda_msg.term_paragraph1_marina') }}</b>
                                  <ul>
                                    <li>
                                      <b>{{ __('hacienda_msg.term_paragraph2_marina') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph3') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph4') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph5') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph6') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph7') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph8_marina') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph9') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph10_marina') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph11') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph12_marina') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph13') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph14_marina') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph15') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph16_marina') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph17') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph18_marina') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph19') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph20_marina') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph21') }}
                                    </li>
                                  </ul>
                                </li>
                              </ul>
                            @elseif ($id_site == 4)
                              <ul class="list-unstyled">
                                <li><b>{{ __('hacienda_msg.term_paragraph1_vista') }}</b>
                                  <ul>
                                    <li>
                                      <b>{{ __('hacienda_msg.term_paragraph2_vista') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph3') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph4') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph5') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph6') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph7') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph8_vista') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph9') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph10_vista') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph11') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph12_vista') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph13') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph14_vista') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph15') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph16_vista') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph17') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph18_vista') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph19') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph20_vista') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph21') }}
                                    </li>
                                  </ul>
                                </li>
                              </ul>
                            @else
                              <ul class="list-unstyled">
                                <li><b>{{ __('hacienda_msg.term_paragraph1_residence') }}</b>
                                  <ul>
                                    <li>
                                      <b>{{ __('hacienda_msg.term_paragraph2_residence') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph3') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph4') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph5') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph6') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph7') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph8_residence') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph9') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph10_residence') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph11') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph12_residence') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph13') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph14_residence') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph15') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph16_residence') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph17') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph18_residence') }}
                                    </li>
                                    <li>
                                      <b>{{ trans('hacienda_msg.term_paragraph19') }}</b>
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph20_residence') }}
                                    </li>
                                    <li>
                                      {{ trans('hacienda_msg.term_paragraph21') }}
                                    </li>
                                  </ul>
                                </li>
                              </ul>
                            @endif
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{ trans('hacienda_msg.close_modal') }}</button>
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
      <script src="{{ asset('hacienda/socialite/js/script_hacienda.js?3.0') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>
