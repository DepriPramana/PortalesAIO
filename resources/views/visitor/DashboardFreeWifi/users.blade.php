@extends('visitor.DashboardFreeWifi.layout.main')

@section('headtitle')
    Detallado de Usuarios
@endsection


@section('content')

    <div class="container">
        <div class="col-12">
            <h1 id="main-title"> <i class="fas fa-users"></i> Detallado de Usuarios</h1>
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
                            <button type="button" id="btn_search_users" class="btn btn-primary mr-2 ml-2"> <i class="fas fa-search"></i> Buscar</button>
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
                        <a class="nav-link active" data-toggle="tab" href="#age" id="pl_age"  aria-selected="true" role="tab">Edades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#gender" id="pl_gender" role="tab">G&eacute;nero</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#domain" id="pl_domains" role="tab">Correo</a>
                    </li>
                </ul>

                <!--Panel Graphs Ages-->
                <div class="row mb-3">
                    <div id="panelAges" class="col-md-12">
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



            </form>
        </div>

    </div>

@endsection

@section('aditional-scripts')
    <script src="{{ asset('dashboard_freewifi/dashboard_free2.js')}}"></script>
@endsection


<style>
    .tab-pane.active {
        animation: slide-down 1s ease-out;
    }

    @keyframes slide-down {
        0% { opacity: 0; transform: translateY(100%); }
        100% { opacity: 1; transform: translateY(0); }
    }
</style>
