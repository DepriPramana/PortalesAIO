@extends('visitor.DashboardFreeWifi.layout.main2')

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
                            <option value="102" selected>Metrorrey</option>
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




                <!--Panel Graphs hotspots-->
                <div id="" class="row" style="">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <select id="hotspot_select_data" class="form-control">
                                <option value="0">Usuarios Logueados</option>
                                <option value="1">Usuarios Unicos</option>
                                <option value="2">Nuevos Usuarios</option>
                                <option value="3">Bytes Descargados</option>
                                <option value="4">Bytes Subidos</option>
                                <option value="5">Duración media de la sesión</option>
                            </select>
                        </div>
                        <div class="container text-right panel_results">
                            <span class="badge badge-pill badge-primary" style="font-size: 15px;">Total: <span id="hotspot_total"></span></span>
                            <span class="badge badge-pill badge-warning" style="font-size: 15px;">Promedio: <span id="hotspot_promedio"></span></span>
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
    <script src="{{ asset('dashboard_freewifi/dashboard_metrorrey.js')}}"></script>
@endsection
