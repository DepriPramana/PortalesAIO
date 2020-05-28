@extends('visitor.DashboardFreeWifi.layout.main')

@section('headtitle')
    Reportes
@endsection


@section('content')

    <div class="container">
        <div class="col-12">
            <h1 id="main-title">Concentrado</h1>
        </div>

        <div class="panel-hs" id="concentrado">
            <!--Panel de scopes-->
            <form id="generate_graphs" name="generate_graphs">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <div class="col-md-12" style="display: none">
                        <label for="select-scope" style="color:#99938e;">Scope:</label>
                        <!--<select id="select_scope" name="select_scope" class="form-control select2">
                            <option value=""></option>
                            <option value="0">Todos</option>
                            @forelse ($chains as $chain)
                                <option value="{{ $chain->id }}"> {{ $chain->name }} </option>
                            @empty
                            @endforelse
                        </select>-->
                        <input id="select_scope" name="select_scope" value="0" hidden>
                    </div>
                </div>

                <!--Panel de hostspots-->
                <div class="row mb-3" id="panel-select-hotspots" style="display: block; display: none;">
                    <div class="col-md-12 filter-panel">
                        <label for="select-hotspots" style="color:#99938e;">Hotspot:</label>
                        <select id="select_hotspots" class="form-control select2" name="select_hotspots" style="width: 100%;">
                        </select>
                        <!--<select id="select_hotspots" class="form-control select2" name="select_hotspots[]" multiple="multiple" style="width: 100%;">
                        </select>-->
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="row mb-3 pl-2 pr-2">
                            <label for="select-hotspots" style="color:#99938e;">Seleccione un rango de fechas:</label>
                            <div class="input-group mb-2 ">

                                <input name="select_hotspots" id="select_hotspots" value="0" type="hidden">
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

                        <div class=" mt-1 float-right">
                            <button id="btn_concentrado" type="button" class="btn btn-primary mr-2 btn_search"> <i class="fas fa-search"></i> Buscar</button>
                            <button id="reset-form" type="button" class="btn btn-info" ><i class="fas fa-redo-alt"></i> Limpiar</button>
                        </div>

                    </div>


                </div>

                <div class="row" >
                    <!--Panel Graphs Browsers-->
                    <div class="col-md-6" style="border-right: solid 1px #d1d1d1;">
                        <div id="maingraphicBrowser" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>

                    <hr>

                    <!--Panel Graphs platform-->
                    <div class="col-md-6">
                        <div id="maingraphicPlatform" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>

                <hr>

                <!--Panel Graphs devices-->
                <div class="row" >
                    <div class="col-md-6" style="border-right: solid 1px #d1d1d1;">
                        <div id="maingraphicDevices" class="mt-4" style="width: 100%; min-height: 500px;"></div>
                    </div>
                    <!--Panel Graphs languages-->
                    <div class="col-md-6" >
                        <div id="maingraphicLanguages" class="mt-4" style="width: 100%; min-height: 500px;"></div>
                    </div>

                </div>

                <hr>

                <!--Panel Graphs Ages-->

                <div id="panelAges" class="col-md-12 mt-4">

                    <div id="maingraphicAges" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                </div>

                <hr class="mt-3">
                <!--Panel Graphs sessions-->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div id="maingraphicSessions" class="mt-4" style="width: 100%; min-height: 300px;"></div>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection

@section('aditional-scripts')
    <script src="{{ asset('dashboard_freewifi/dashboard_free2.js')}}"></script>
@endsection
