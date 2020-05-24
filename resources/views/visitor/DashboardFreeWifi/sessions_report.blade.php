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
                <div style="background-color: #ebf3ff !important;" >
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#session" id="rep_session"  aria-selected="true" role="tab">Sesiones</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#age" id="rep_age"  aria-selected="true" role="tab">Edades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#gender" id="rep_gender" role="tab">G&eacute;nero</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#domain" id="rep_domains" role="tab">Correo</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#device" id="rep_device"  aria-selected="true" role="tab">Dispositivos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#browser" id="rep_browser" role="tab">Navegadores</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#plataform" id="rep_plataform" role="tab">Plataformas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#language" id="rep_language" role="tab">Idiomas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#hotspot" id="rep_hotspot" role="tab">Hotspot</a>
                        </li>

                    </ul>
                </div>


                <!--Panel Graphs sessions-->
                <div class="row mb-3">
                    <div id="panelSession"  class="col-md-12">
                        <div id="maingraphicSessions" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>

                <!--Panel Graphs Ages-->
                <div class="row mb-3" >
                    <div id="panelAges" class="col-md-12" style="opacity: 0 !important;">
                        <div id="maingraphicAges" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>

                <!--Panel Graphs genders-->
                <div id="panelGenders" class="row mb-3 d-none">
                    <div class="col-md-12" id="maingraphicGender">


                        <h5 class="text-success mt-2">G&eacute;nero</h5>
                        <h6 class="text-justify text-secondary">Personas totales: <span id="total_people"></span></h6>

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
                        <div id="maingraphicDomains" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>

                <!--Panel Graphs Devices-->
                <div class="row mb-3" id="panelDevices" style="opacity: 0 !important;">
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
                <div class="row mb-3" id="panelBrowsers" style="opacity: 0 !important;">
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

                <!--Panel Graphs Platform-->
                <div class="row mb-3" id="panelPlataform" style="opacity: 0 !important;">
                        <div id="maingraphicPlatform" class="mt-4" style="width: 100%; min-height: 300px;">
                            <div class="col-md-4 offset-md-4">

                                <table class="table table-bordered table-striped">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>Total</th>
                                        <th id="platform_total"></th>
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

                <!--Panel Graphs languages-->
                <div id="panelLanguages" class="row mb-3" style="opacity: 0 !important;">
                    <div class="col-md-12">
                        <div id="maingraphicLanguages" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>

                <!--Panel Graphs hotspots-->
                <div id="panelHotspot" class="row mb-3" style="opacity: 0 !important;">
                    <div class="col-md-12">
                        <div id="maingraphicHotspot" class="mt-4" style="width: 100%; min-height: 300px;">
                            graficas de reportes hotspots
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
