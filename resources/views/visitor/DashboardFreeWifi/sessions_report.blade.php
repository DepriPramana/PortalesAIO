@extends('visitor.DashboardFreeWifi.layout.main')

@section('headtitle')
    Registro de Sesiones
@endsection


@section('content')

    <div class="container">
        <div class="col-12">
            <h1 id="main-title"> <i class="fas fa-wifi"></i> Registro de Sesiones</h1>
        </div>

        <div class="panel-hs" >
            <!--Panel de scopes-->
            <form id="generate_graphs" name="generate_graphs">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="select-scope" style="color:#99938e;">Scope:</label>
                        <select id="select_scope" name="select_scope" class="form-control select2">
                            <option value=""></option>
                            <option value="0">Todos</option>
                            @forelse ($chains as $chain)
                                <option value="{{ $chain->id }}"> {{ $chain->name }} </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>

                <!--Panel de hostspots-->
                <div class="row mb-3" id="panel-select-hotspots" style="display: block;">
                    <div class="col-md-12 filter-panel">

                        <label for="select-hotspots" style="color:#99938e;">Hotspot:</label>
                        <!--<select id="select_hotspots" class="form-control select2" name="select_hotspots" style="width: 100%;">
                        </select>-->
                        <select id="select_hotspots" class="form-control select2" name="select_hotspots[]" multiple="multiple" style="width: 100%;">
                        </select>

                        <div class=" mt-3 float-right" style="margin-top: 5% !important;">
                            <button type="button" id="btn_search_sessions_report" class="btn btn-primary mr-2 ml-2"> <i class="fas fa-search"></i> Buscar</button>
                            <button id="reset-form" type="button" class="btn btn-info" ><i class="fas fa-redo-alt"></i> Limpiar</button>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="select-hotspots" style="color:#99938e;">Seleccione un rango de fechas:</label>
                    <div class="input-group mb-2 ">

                            <span class="input-group-text white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        <input type="text" class="form-control" id="datepickerWeek" name="datepickerWeek" >

                        <div class="input-group-prepend">
                            <span class="input-group-text">a</span>
                        </div>
                        <input type="text" class="form-control"id="datepickerWeek2" name="datepickerWeek2">
                        <span class="input-group-text white">
                                <i class="fa fa-calendar"></i>
                            </span>
                    </div>
                </div>

                <!-- Nav tabs -->
                <div class="panel_results" >
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active panel_sessions" data-toggle="tab" href="#session" id="rep_session"  aria-selected="true" role="tab">Sesiones</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link panel_sessions" data-toggle="tab" href="#hotspot" id="rep_hotspot" role="tab">Hotspot</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link panel_users" data-toggle="tab" href="#age" id="rep_age"  aria-selected="true" role="tab">Edades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link panel_users" data-toggle="tab" href="#gender" id="rep_gender" role="tab">G&eacute;nero</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link panel_users" data-toggle="tab" href="#domain" id="rep_domains" role="tab">Correo</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link panel_users" data-toggle="tab" href="#country" id="rep_countries" role="tab">Pa&iacute;s</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link panel_devices" data-toggle="tab" href="#device" id="rep_device"  aria-selected="true" role="tab">Dispositivos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link panel_devices" data-toggle="tab" href="#browser" id="rep_browser" role="tab">Navegadores</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link panel_devices" data-toggle="tab" href="#plataform" id="rep_plataform" role="tab">Plataformas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link panel_devices" data-toggle="tab" href="#language" id="rep_language" role="tab">Idiomas</a>
                        </li>

                    </ul>
                </div>


                <!--Panel Graphs sessions-->
                <div class="row mb-3">
                    <div id="panelSession"  class="col-md-12 mt-4">
                        <div class="container text-right panel_results">
                            <h5>
                                <span class="badge badge-pill badge-primary">Min: <span id="session_minimo"></span></span>
                                <span class="badge badge-pill badge-danger">Max: <span id="session_maximo"></span></span>
                                <span class="badge badge-pill badge-warning">Prom: <span id="session_prom"></span></span>
                                <span class="badge badge-pill badge-success">Total: <span id="session_total"></span></span>
                            </h5>                        </div>
                        <div id="maingraphicSessions" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>

                <!--Panel Graphs Ages-->
                <div class="row mb-3" >
                    <div id="panelAges" class="col-md-12 mt-4" style="opacity: 0 !important;">
                        <div class="container text-right panel_results">
                            <h5>
                                <span class="badge badge-pill badge-primary">Min: <span id="ages_minimo"></span></span>
                                <span class="badge badge-pill badge-danger">Max: <span id="ages_maximo"></span></span>
                                <span class="badge badge-pill badge-warning">Prom: <span id="ages_Prom"></span></span>
                                <span class="badge badge-pill badge-success">Total: <span id="ages_total"></span></span>
                            </h5>
                        </div>
                        <div id="maingraphicAges" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>


                <!--Panel Graphs genders-->
                <div id="panelGenders" class="row mb-3 d-none">
                    <div class="col-md-12" id="maingraphicGender">


                        <h5 class="text-success mt-2">G&eacute;nero</h5>
                        <h3 class="text-right">
                            <span class="badge badge-pill badge-danger">Total: <span id="total_people"></span> Personas</span>
                        </h3>

                        <div class="d-flex align-items-center">

                            <div id="panel_men" class="d-inline-block col-md-6 text-center mr-2 shadow p-3 mb-5 " style="background-color: #b7d6f7 !important; border-radius: 50px; padding-top: 5%; padding-bottom: 5%; width: 50%" data-toggle="tooltip" data-placement="top" >
                                <h4>HOMBRES</h4><hr>
                                <h1><span id="total_men"></span>%</h1>
                                <i class="fas fa-male fa-3x"></i>
                            </div>

                            <div id="panel_women" class="d-inline-block col-md-6 text-center ml-2 shadow p-3 mb-5 " style="background-color: #f7b7e8 !important; border-radius: 50px; padding-top: 5%; padding-bottom: 5%; width: 50%" data-toggle="tooltip" data-placement="top">
                                <h4 >MUJERES</h4><hr>
                                <h1> <span id="total_women"> </span> %</h1>
                                <i class="fas fa-female fa-3x"></i>
                            </div>

                        </div>
                    </div>
                </div>

                <!--Panel Graphs Domains-->
                <div id="panelDomains" class="row mb-3" style="opacity: 0 !important;">
                    <div class="col-md-12">
                        <div class="container text-right">
                            <h5>
                                <span class="badge badge-pill badge-primary">Min: <span id="domain_minimo"></span></span>
                                <span class="badge badge-pill badge-danger">Max: <span id="domain_maximo"></span></span>
                                <span class="badge badge-pill badge-success">Total: <span id="domain_total"></span></span>
                            </h5>
                                                   </div>
                        <div id="maingraphicDomains" class="mt-4" style="width: 100%; min-height: 300px;">

                        </div>
                    </div>
                </div>

                <!--Panel Graphs Country-->
                <div id="panelCountries" class="row mb-3" style="opacity: 0 !important;">
                    <div class="col-md-12">
                        <div class="container text-right">
                            <h5>
                                <span class="badge badge-pill badge-primary">Min: <span id="country_minimo"></span></span>
                                <span class="badge badge-pill badge-danger">Max: <span id="country_maximo"></span></span>
                                <span class="badge badge-pill badge-success">Total: <span id="country_total"></span></span>
                            </h5>
                        </div>
                        <div id="maingraphicCountries" class="mt-4" style="width: 100%; min-height: 300px;">
                            <div class="col-md-4 offset-md-4">
                                <table class="table table-bordered">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>Total</th>
                                        <th id="countries_total"></th>
                                    </tr>
                                    <tr>
                                        <th>Pa&iacute;s</th>
                                        <th>%</th>
                                    </tr>
                                    </thead>
                                    <thead id="table_countries">
                                    <!-- filling data -->
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Panel Graphs Devices-->
                <div class="row mb-3" id="panelDevices" style="opacity: 0 !important;">
                    <div class="container text-right panel_results">
                        <h5>
                            <span class="badge badge-pill badge-primary">Min: <span id="devices_minimo"></span></span>
                            <span class="badge badge-pill badge-danger">Max: <span id="devices_maximo"></span></span>
                            <span class="badge badge-pill badge-success">Total: <span id="devices_total"></span></span>
                        </h5>
                   </div>
                    <div id="maingraphicDevices" class="mt-4" style="width: 100%; min-height: 300px;">
                        <div class="col-md-4 offset-md-4">
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                <tr>
                                    <th>Total</th>
                                    <th id="device_total"></th>
                                </tr>
                                <tr>
                                    <th>Fabricante</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <thead id="table_devices">
                                <!-- filling data -->
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <!--Panel Graphs Browsers-->
                <div class="row mb-3">
                    <div id="panelBrowsers" class="col-md-12" style="opacity: 0 !important;">
                    <div class="container text-right panel_results">
                        <h5>
                            <span class="badge badge-pill badge-primary">Min: <span id="browser_minimo"></span></span>
                            <span class="badge badge-pill badge-danger">Max: <span id="browser_maximo"></span></span>
                            <span class="badge badge-pill badge-success">Total: <span id="browsers_total"></span></span>
                        </h5>
                    </div>
                        <div id="maingraphicBrowser" class="mt-4" style="width: 100%; min-height: 300px;">
                            <div class="col-md-4 offset-md-4">

                                <table class="table table-bordered">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>Total</th>
                                        <th id="browser_total"></th>
                                    </tr>
                                    <tr>
                                        <th class="col-md-10">Navegador</th>
                                        <th>%</th>
                                    </tr>
                                    </thead>
                                    <thead id="table_browsers">
                                    <!-- filling data -->
                                    </thead>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
                <!--Panel Graphs Platform-->
                <div class="row mb-3">
                    <div  id="panelPlataform" class="col-md-12" style="opacity: 0 !important;">
                    <div class="container text-right panel_results">
                        <h5>
                            <span class="badge badge-pill badge-primary">Min: <span id="platform_minimo"></span></span>
                            <span class="badge badge-pill badge-danger">Max: <span id="platform_maximo"></span></span>
                            <span class="badge badge-pill badge-success">Total: <span id="platform_total"></span></span>
                        </h5>
                    </div>
                        <div id="maingraphicPlatform" class="mt-4" style="width: 100%; min-height: 300px;">
                            <div class="col-md-4 offset-md-4">

                                <table class="table table-bordered table-striped">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>Total</th>
                                        <th id="platforms_total"></th>
                                    </tr>
                                    <tr>
                                        <th>Sistema Operativo</th>
                                        <th>%</th>
                                    </tr>
                                    </thead>
                                    <thead id="table_platforms">
                                    <!-- filling data -->
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Panel Graphs languages-->
                <div  class="row mb-3" >
                    <div class="col-md-12" id="panelLanguages" style="opacity: 0 !important;">
                        <div class="container text-right panel_results">
                            <h5>
                                <span class="badge badge-pill badge-primary">Min: <span id="language_minimo"></span></span>
                                <span class="badge badge-pill badge-danger">Max: <span id="language_maximo"></span></span>
                                <span class="badge badge-pill badge-success">Total: <span id="language_total"></span></span>
                            </h5>
                        </div>
                        <div id="maingraphicLanguages" class="mt-4" style="width: 100%; min-height: 300px;">
                            <div class="col-md-4 offset-md-4">

                                <table class="table table-bordered">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>Total</th>
                                        <th id="languages_total"></th>
                                    </tr>
                                    <tr>
                                        <th class="col-md-10">Idioma</th>
                                        <th>%</th>
                                    </tr>
                                    </thead>
                                    <thead id="table_languages">
                                    <!-- filling data -->
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Panel Graphs hotspots-->
                <div id="panelHotspot" class="row" style="opacity: 0 !important; margin-top: -60px">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <select id="hotspot_select_data" class="form-control">
                                <option value="0">Usuarios Logueados</option>
                                <option value="1">Usuarios Unicos</option>
                                <option value="2">Nuevos Usuarios</option>
                                <option value="3">Bytes Descargados</option>
                                <option value="4">Bytes Subidos</option>
                                <option value="5">Duración media de la sesión</option>
                                <option value="6">Ingresos diarios estimados</option>
                            </select>
                        </div>
                        <div class="container text-right panel_results">
                            <span class="badge badge-pill badge-primary" style="font-size: 15px;">Total: <span id="hotspot_total"></span></span>
                            <span class="badge badge-pill badge-warning" style="font-size: 15px;">Prom: <span id="hotspot_Prom"></span></span>
                        </div>
                        <div id="panelHotspotLogin" class="text-center mt-3" style="width: 100%; display: none;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div id="maingraphicHotspot" class="mt-4" style="width: 100%; min-height: 300px;">

                        </div>
                    </div>
                </div>


            </form>
        </div>

    </div>




@endsection

@section('aditional-scripts')
    <script src="{{ asset('dashboard_freewifi/dashboard_free2.js')}}"></script>
@endsection
