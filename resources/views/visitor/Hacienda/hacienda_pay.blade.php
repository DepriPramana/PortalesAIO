<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ trans('meta.description') }}">
    <meta name="author" content="{{ trans('meta.author') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('hacienda/favicon.ico') }}">
    <title>Hacienda</title>
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

          <h3 class="box-title m-b-0 center-align">SIGN IN</h3>
          <center>
            <small>insert the information below</small>
          </center>
          <div class="form-horizontal">
            <div class="form-group  m-t-20">
              <div class="col-xs-12">
                <!-- <input type="text" name="sdasd" disabled placeholder="Rate: 1024 Kb"> -->
                <!-- <div class="well well-sm"> Service features <b>Premium Daily Non Member.</b></div>
                <div class="well well-sm"> Service features <b>Premium Weekly Non Member.</b></div>
                <div class="well well-sm"> Service features <b>Premium Daily Member.</b></div>
                <div class="well well-sm"> Service features <b>Premium Weekly Member.</b></div> -->
                <!-- Botones de servicios. -->
                <div id="opcion-free" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">Free Basic</button>
                  </div>
                </div>
                <div id="opcion-1" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">Premium Daily Non Member</button>
                  </div>
                </div>
                <div id="opcion-2" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">Premium Weekly Non Member</button>
                  </div>
                </div>
                <div id="opcion-3" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">Premium Daily Member</button>
                  </div>
                </div>
                <div id="opcion-4" class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">Premium Weekly Member</button>
                  </div>
                </div>

                <div id="back-btn" class="form-group text-center m-t-20" style="display: none;">
                  <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button"><i class="fa fa-arrow-left"></i> Return to options</button>
                  </div>
                </div>

                <form id="loginform" name="loginform" method="POST" action="http://{{isset($_GET['sip']) ? $_GET['sip'] : '' }}:9997/login">
                  <div class="information-hidden" id="login_form_1">
                    <input class="form-control" type="hidden" name="username">
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
                  </div>
                </form>
                
                <form id="form-free" method="POST" action="{{url('/submit_hacienda_free')}}" style="display: none;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>Free Basic.</b>
                    <h6><b>Rate</b>: <i class="fa fa-download"></i> 1024 / <i class="fa fa-upload"></i> 1024 Kb.</h6>
                    <h6><b>Duration</b>: <i class="fa fa-clock-o"></i> Unlimited</h6>
                    <h6><b>Cost</b>: Free</h6>
                  </div>
                  <hr>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />
                  <label>Full name</label>
                  <input type="text" name="fullname" id="fullname" placeholder="Enter your full name">
                  <label>Email address:</label>
                  <input id="email_address" name="email_address" class="form-control" type="email" required="" placeholder="email address">

                  <div class="information-hidden">
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
                  </div>

                  <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                      <button id="btnlogin-free" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">LOG IN</button>
                    </div>
                  </div>
                </form>

                <form id="form-1" style="display: none;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>Premium Daily Non Member.</b>
                    <h6><b>Rate</b>: <i class="fa fa-download"></i> 2000 / <i class="fa fa-upload"></i> 2000 Kb.</h6>
                    <h6><b>Duration</b>: <i class="fa fa-clock-o"></i> 24 Hour(s)</h6>
                    <h6><b>Cost</b>: 12 USD</h6>
                  </div>
                  <hr>
                  <div class="well well-sm">Select a browse option: </div>
                  <div class="form-group" id="div-checks1">
                    <div class="col-md-12">
                      <div class="radio pull-left p-t-0">
                        <input id="room_radio" name="room_or_acc" type="radio" value="room" checked>
                        <label for="room_radio"><i class="fa fa-bed"> Room charge</i></label>
                          <br>
                        <input id="existing_acc" name="room_or_acc" type="radio" value="existing">
                        <label for="existing_acc"><i class="fa fa-globe"> Browse with an existing account</i></label>
                      </div>
                    </div>
                  </div>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />
                  <label>Last name</label>
                  <input type="text" name="lastname" id="lastname" placeholder="Enter your last name(same as your reservation)">

                  <label>Room number</label>
                  <input type="number" name="room" id="room" placeholder="Enter your room number">

                  <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                      <button id="btnlogin-1" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">LOG IN</button>
                    </div>
                  </div>
                </form>

                <form id="form-2" style="display: none;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>Premium Weekly Non Member.</b>
                    <h6><b>Rate</b>: <i class="fa fa-download"></i> 2000 / <i class="fa fa-upload"></i> 2000 Kb.</h6>
                    <h6><b>Duration</b>: <i class="fa fa-clock-o"></i> 168 Hour(s)</h6>
                    <h6><b>Cost</b>: 60 USD</h6>
                  </div>
                  <hr>
                  <div class="well well-sm">Select a browse option: </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio pull-left p-t-0">
                        <input id="room_radio" name="room_or_acc" type="radio" value="room" checked>
                        <label for="room_radio"><i class="fa fa-bed"> Room charge</i></label>
                          <br>
                        <input id="existing_acc" name="room_or_acc" type="radio" value="existing">
                        <label for="existing_acc"><i class="fa fa-globe"> Browse with an existing account</i></label>
                      </div>
                    </div>
                  </div>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />
                  <label>Last name</label>
                  <input type="text" name="lastname" id="lastname" placeholder="Enter your last name">

                  <label>Room number</label>
                  <input type="number" name="room" id="room" placeholder="Enter your room number">

                  <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                      <button id="btnlogin-2" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">LOG IN</button>
                    </div>
                  </div>
                </form>

                <form id="form-3" style="display: none;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>Premium Daily Member.</b>
                    <h6><b>Rate</b>: <i class="fa fa-download"></i> 5000 / <i class="fa fa-upload"></i> 3000 Kb.</h6>
                    <h6><b>Duration</b>: <i class="fa fa-clock-o"></i> 24 Hour(s)</h6>
                    <h6><b>Cost</b>: 10 USD</h6>
                  </div>
                  <hr>
                  <div class="well well-sm">Select a browse option: </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio pull-left p-t-0">
                        <input id="room_radio" name="room_or_acc" type="radio" value="room" checked>
                        <label for="room_radio"><i class="fa fa-bed"> Room charge</i></label>
                          <br>
                        <input id="existing_acc" name="room_or_acc" type="radio" value="existing">
                        <label for="existing_acc"><i class="fa fa-globe"> Browse with an existing account</i></label>
                      </div>
                    </div>
                  </div>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />
                  <label>Last name</label>
                  <input type="text" name="lastname" id="lastname" placeholder="Enter your last name">

                  <label>Room number</label>
                  <input type="number" name="room" id="room" placeholder="Enter your room number">

                  <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                      <button id="btnlogin-3" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">LOG IN</button>
                    </div>
                  </div>
                </form>

                <form id="form-4" style="display: none;">
                  {{ csrf_field() }}
                  <div class="well well-sm">
                    <b>Premium Weekly Member.</b>
                    <h6><b>Rate</b>: <i class="fa fa-download"></i> 5000 / <i class="fa fa-upload"></i> 3000 Kb.</h6>
                    <h6><b>Duration</b>: <i class="fa fa-clock-o"></i> 168 Hour(s)</h6>
                    <h6><b>Cost</b>: 48 USD</h6>
                  </div>
                  <hr>
                  <div class="well well-sm">Select a browse option: </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="radio pull-left p-t-0">
                        <input id="room_radio" name="room_or_acc" type="radio" value="room" checked>
                        <label for="room_radio"><i class="fa fa-bed"> Room charge</i></label>
                          <br>
                        <input id="existing_acc" name="room_or_acc" type="radio" value="existing">
                        <label for="existing_acc"><i class="fa fa-globe"> Browse with an existing account</i></label>
                      </div>
                    </div>
                  </div>
                  <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                  <input class="form-control" type="hidden" id="id_site_code" name="id_site_code" value="{{$id_site}}" />
                  <label>Last name</label>
                  <input type="text" name="lastname" id="lastname" placeholder="Enter your last name">
                  <label>Room number</label>
                  <input type="number" name="room" id="room" placeholder="Enter your room number">

                  <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                      <button id="btnlogin-4" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="button">LOG IN</button>
                    </div>
                  </div>
                </form>

                <br>

                <div class="form-group">
                  <div class="col-md-12">
                    <div class="checkbox checkbox-info pull-left p-t-0">
                      <input id="checkbox-signup" name="checkbox-signup"type="checkbox">
                      <label for="checkbox-signup"><p id='texto-terminos'> Accept terms and conditions</p></label>
                    </div>
                    <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-info-circle m-r-5"></i> Terms.</a>
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
                                  <h4 class="modal-title">{{ trans('termsofuse.title') }}</h4> </div>
                              <div class="modal-body">
                                <ul class="list-unstyled">
                                  <li>{{ trans('termsofuse.paragraph') }}
                                    <ul>
                                      <li>
                                        {{ trans('termsofuse.paragraph_one') }}
                                      </li>
                                      <li>
                                        {{ trans('termsofuse.paragraph_two') }}
                                      </li>
                                      <li>
                                        {{ trans('termsofuse.paragraph_three') }}
                                      </li>
                                    </ul>
                                  </li>
                                  <li>
                                    {{ trans('termsofuse.paragraph_four') }}
                                    <a href="{{ url('policies') }}" target="_blank">{{ trans('termsofuse.more') }}</a>
                                  </li>
                                </ul>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{ trans('termsofuse.close_modal') }}</button>
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
      <script src="{{ asset('hacienda/socialite/js/script_hacienda.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>
