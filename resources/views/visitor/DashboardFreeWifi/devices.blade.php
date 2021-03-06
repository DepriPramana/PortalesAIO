@extends('visitor.DashboardFreeWifi.layout.main')

@section('headtitle')
    Informe Dispositivos
@endsection


@section('content')

    <div class="container">
        <div class="col-12">
            <h1 id="main-title"> <i class="fas fa-laptop"></i> Informe Dispositivos</h1>
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
                            <button type="button" id="btn_search_devices" class="btn btn-primary mr-2 ml-2"> <i class="fas fa-search"></i> Buscar</button>
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
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#device" id="pl_device"  aria-selected="true" role="tab">Dispositivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#browser" id="pl_browser" role="tab">Navegadores</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#plataform" id="pl_plataform" role="tab">Plataformas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#language" id="pl_language" role="tab">Idiomas</a>
                    </li>
                </ul>

                <!--Panel Graphs Devices-->
                <div class="row mb-3" id="panelDevices">
                    <div class="col-md-12">
                        <div id="maingraphicDevices" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>
                <!--Panel Graphs Browsers-->
                <div class="row mb-3" id="panelBrowsers" style="opacity: 0 !important;">
                    <div class="col-md-12">
                        <div id="maingraphicBrowser" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>

                <!--Panel Graphs Platform-->
                <div class="row mb-3" id="panelPlataform" style="opacity: 0 !important;">
                    <div class="col-md-12">
                        <div id="maingraphicPlatform" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>

                <!--Panel Graphs languages-->
                <div id="panelLanguages" class="row mb-3" style="opacity: 0 !important;">
                    <div class="col-md-12">
                        <div id="maingraphicLanguages" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection

@section('aditional-scripts')
    <script src="{{ asset('dashboard_freewifi/dashboard_free2.js')}}"></script>
@endsection
