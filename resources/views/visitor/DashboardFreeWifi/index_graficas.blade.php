@extends('visitor.DashboardFreeWifi.main')

@section('headtitle')
    Reportes
@endsection


@section('content')

    <div class="container">
        <div class="col-12">
            <h1 id="main-title">Otros Reportes</h1>
        </div>

        <div class="panel-hs" >
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
                <form id="form_date">
                  {{ csrf_field() }}
                <div class="col-md-12 filter-panel">
                    <label for="select-hotspots" style="color:#99938e;">Hotspot:</label>
                    <select id="select-hotspots" class="form-control" name="hotspots" multiple="multiple" style="width: 100%;"></select>


                    <div class=" mt-3 float-right" style="margin-top: 5% !important;">
                        <button class="btn btn-primary mr-2"> <i class="fas fa-search"></i> Buscar</button>
                        <button id="reset-form" type="button" class="btn btn-info" ><i class="fas fa-redo-alt"></i> Limpiar</button>
                    </div>

                </div>
              </form>
            </div>
        </div >

    </div>

@endsection
