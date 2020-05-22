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
                        <select id="select_hotspots" class="form-control select2" name="select_hotspots" style="width: 100%;">
                        </select>
                        <!--<select id="select_hotspots" class="form-control select2" name="select_hotspots[]" multiple="multiple" style="width: 100%;">
                        </select>-->

                        <div class=" mt-3 float-right" style="margin-top: 5% !important;">
                            <button type="button" id="btn_search_sessions" class="btn btn-primary mr-2 ml-2"> <i class="fas fa-search"></i> Buscar</button>
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
