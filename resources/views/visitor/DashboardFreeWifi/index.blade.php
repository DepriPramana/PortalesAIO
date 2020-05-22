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
                <h1 id="main-title">Reportes Hotspots</h1>
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
                    <label for="select-scope" style="color:#99938e;">Scope:</label>
                    <select id="select-scope" class="form-control"></select>
                </div>
            </div>

            <!--Panel de hostspots-->
            <div class="row mb-3" id="panel-select-hotspots" style="display: none;">
                <div class="col-md-12 loading-panel text-center">
                    <div class="spinner-border" role="status" >
                        <span class="sr-only">Cargando...</span>
                    </div>
                </div>
                <div class="col-md-12 filter-panel">
                    <label for="select-hotspots" style="color:#99938e;">Hotspot:</label>
                    <select id="select-hotspots" class="form-control" name="hotspots" multiple="multiple" style="width: 100%;"></select>


                    <div class=" mt-3 float-right" style="margin-top: 5% !important;">
                        <button id="find" class="btn btn-primary mr-2"> <i class="fas fa-search"></i> Buscar</button>
                        <button id="find-all" class="btn btn-primary" >Buscar todos los hotspots</button>
                    </div>

                </div>
            </div>
        </div>



        <br>
        <div class="clearfix mt-5"></div>

        <!--Panel de grafica-->
        <div  class="panel-grafica row mb-3"  id="panel-grafica" style="display:none;" >
            <div class="col-md-12 mt-7">
                <hr> <div class="w-100 text-center">
                    <h6 class="site-subtitle">
                        <span id="filter_date"></span>
                        &nbsp;-&nbsp;
                        <span id="current_date"></span>
                    </h6><br>
                </div> <hr>
            </div>

            <div class="panel-hs">
                <div class="content-filters ml-1 row mb-3">

                    <div class="col-md-6" style="width:100%;">
                        <select id="filter-data-select" class="form-control" style="outline:0; !important;"></select>
                    </div>
                    <div class="col-md-3" style="width:100%;">
                        <select class="form-control" name="fechaInicio" id="fechaInicio">
                            <option value="<?= date("Y-m-d", strtotime("-7 days")) ?>">7 days</option>
                            <option value="<?= date("Y-m-d", strtotime("-30 days")) ?>">30 days</option>
                            <option value="<?= date("Y-m-d", strtotime("-90 days")) ?>">90 days</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" class="form-control" value="<?= date("Y-m-d") ?>" name="fechaFinal">
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
    <script>
    $( document ).ready(function()
    {
        get_dates();
    });

    function get_dates(start = null)
    {
        let monthNames = getMonthNames();

        let d = new Date();

        let month_current = monthNames[d.getMonth()]
        var day_current = d.getDate();
        var day_current = day_current<10 ? '0' : '' + day_current;
        let year_current = d.getFullYear()

        let current_date = day_current+" "+month_current+" "+year_current;

        $('#current_date').text(current_date);

        if(!start)
        {
            let df = d.setDate( d.getDate() - 7)
            let dfilter = new Date(df);

            let month_filter = monthNames[dfilter.getMonth()]
            var day_filter = dfilter.getDate();
            var day_filter= dfilter<10 ? '0' : '' + "0"+day_filter;
            let year_filter = dfilter.getFullYear()


            let filter_date = day_filter+" "+month_filter+" "+year_filter;
            $('#filter_date').text(filter_date);

        }


    }

    function getMonthNames()
    {
            return ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
            "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    }

    $('#fechaInicio').on('change', function() {


        let monthNames = getMonthNames();
        let fecha_inicio_pre = $('#fechaInicio').val();
        let fecha_inicio_array = fecha_inicio_pre.split("-");


        if(fecha_inicio_array[1].charAt(0) == "0")
        {
            fecha_inicio_array[1] = fecha_inicio_array[1].substr(1,2) - 1;
        }

        if(fecha_inicio_array[2].length === 1)
        {
            fecha_inicio_array[2] = "0"+fecha_inicio_array[2];
        }

        let filter_day = fecha_inicio_array[2];
        let filter_month = monthNames[fecha_inicio_array[1]];
        let filter_year = fecha_inicio_array[0];

        let filter_date = filter_day +" "+filter_month+" "+filter_year;

        $('#filter_date').text(filter_date);

    });
    </script>
@endsection
