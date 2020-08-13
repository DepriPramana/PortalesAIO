@extends('visitor.DashboardFreeWifi.layout.main2')

@section('headtitle')
    Registro de Sesiones
@endsection


@section('content')

    <div class="container">
        <div class="col-12">
            <h1 id="main-title"> <i class="fas fa-wifi"></i> Paquetes registrados Hacienda.</h1>
        </div>

        <div class="panel-hs" >
            <!--Panel de scopes-->
            <form id="search_info" name="search_info">
                {{ csrf_field() }}


                <!--Panel de hostspots-->
                <div class="row mb-3" id="panel-select-hotspots" style="display: block;">
                    <div class="col-md-12 filter-panel">

                      <div class="input-group">
                        <span class="input-group-text white">
                            <i class="fa fa-calendar"></i>
                        </span>
                           <input id="date_to_search" type="text" class="form-control form-control-sm" name="date_to_search">
                      </div>
                      <div style="margin-top: 2%">
                        <button type="button" id="boton-aplica-filtro" class="btn btn-primary mr-2 ml-2"> <i class="fas fa-search"></i> Buscar</button>
                        <button id="reset-form" type="button" class="btn btn-info" ><i class="fas fa-redo-alt"></i> Limpiar</button>
                      </div>

                    </div>
                </div>

                <!--<div class="row mb-3">
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
                </div>-->

                <!-- Nav tabs -->

                <!--Panel Graphs hotspots-->
                <div id="" class="row" style="">
                    <div class="table-responsive">
                      <table id="table_paquetes" name='table_paquetes' class="table table-striped border display nowrap compact-tab" style="width:100%; font-size: 10px;">
                        <thead class="bg-primary">
                          <tr>
                            <th>Paquete</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Wificode</th>
                            <th>Reservación</th>
                            <th>Owner</th>
                            <th>Sitio</th>
                            <th>Precio</th>
                            <th>Creación</th>
                            <th>expiration</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                </div>


            </form>
        </div>

    </div>




@endsection

@section('aditional-scripts')
    <link href="{{ asset('plugins/datatables_bootstrap_4/datatables.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('plugins/datatables_bootstrap_4/datatables.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="{{ asset('hacienda/js/hacienda_paquetes.js')}}"></script>
@endsection
