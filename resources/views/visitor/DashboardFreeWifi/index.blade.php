@extends('visitor.DashboardFreeWifi.layout.main')

@section('headtitle')
    Reportes
@endsection

@section('aditional-styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    <!--Panel de carga-->
    <div id="loading-page">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="container" id="main-content">
        <div class="row mb-3">
            <div class="col-md-6">
                <h1 id="main-title">Reportes de sitio</h1>
            </div>
            <div class="col-md-6 text-right">
                <!--<img style="width:25%;" src="https://i.imgur.com/QCaF02U.png">-->
                <!--<img style="width:25%;" src="{{ asset('img/hotspot/img/sitwifi_logo.png') }}">-->
            </div>
        </div>

        <div class="panel-hs">
            <!--Panel de scopes-->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="select-scope" style="color:#99938e;">Grupos:</label>
                    <select id="select-scope" class="form-control"></select>
                </div>
            </div>

            <!--Panel de hostspots-->
            <div class="row mb-3" id="panel-select-hotspots" >
                <div class="col-md-12 loading-panel text-center" style="display: none;">
                    <div class="spinner-border" role="status" >
                        <span class="sr-only">Cargando...</span>
                    </div>
                </div>
                <div class="col-md-12 filter-panel">
                    <label for="select-hotspots" style="color:#99938e;">Sitios:</label>
                    <select id="select-hotspots" class="form-control" name="hotspots" multiple="multiple" style="width: 100%;"></select>
                    
                    <div class="mt-3 float-right" style="important;">
                        
                        <button id="find" class="btn btn-primary mr-2"> <i class="fas fa-search"></i> Buscar</button>
                        <button id="find-all" class="btn btn-primary" >Buscar todos los hotspots</button>
                    </div>

                    <div class="mt-4 float-left row">
                        <div class="col-md-6">
                            <input type="date" name="fechaInicio" class="form-control" value="<?= date("Y-m-d", strtotime("-30 days")) ?>">
                        </div>
                        <div class="col-md-6">
                            <input type="date" name="fechaFinal" class="form-control" value="<?= date("Y-m-d") ?>">
                        </div>
                    </div>

                </div>
            </div>
        </div>



        

        <!--Panel de grafica-->
        <div  class="panel-grafica row mb-3"  id="panel-grafica" style="display:none;" >
            

            <div class="panel-hs">
                <div class="content-filters ml-1 row mb-3">

                    <div class="col-md-6" style="width:100%;">
                        <select id="filter-data-select" class="form-control" style="outline:0; !important;"></select>
                    </div>
                </div>

                <div class="card ml-3" >
                    <div class="card-body">
                        <div class="col-md-12 loading-panel text-center">
                            <div class="spinner-border" role="status" >
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="col-md-12" id="graphic-content">
                            <div class="grafica" style="display: none; width: 100%; min-height: 400px;">
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-6 text-center" id="panle-total-chart" style="display: none;">
                                <strong>Total: </strong> <span></span>
                            </div>
                            <div class="col-md-6 text-center" id="panle-promedio-chart" style="display: none;">
                                <strong>Promedio: </strong> <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('aditional-scripts')
    <!--<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>-->
    <script src="{{ asset('/js/DashboardFreeWifi/gs.js') }}"></script>
    
@endsection
