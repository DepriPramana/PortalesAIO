<!--Echart 4.2-->
<script src="{{ asset('/plugins/incubator-echarts-4.2.1/dist/echarts.js') }}"></script>
<script src="{{ asset('/plugins/incubator-echarts-4.2.1/theme/vintage.js') }}"></script>
<script src="{{ asset('plugins/momentupdate/moment.js')}}"></script>
<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2-bootstrap.min.css') }}" type="text/css" />
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/select2/dist/js/i18n/es-MX.js') }}" type="text/javascript"></script>

<link href="{{ asset('plugins/daterangepicker-master/daterangepicker.css')}}" rel="stylesheet" type="text/css">
<script src="{{ asset('plugins/daterangepicker-master/daterangepicker.js')}}"></script>

<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" type="text/css" />
<script src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js')}}" charset="UTF-8"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('.button-left').click(function(){
            $('.sidebar').toggleClass('fliph');
        });
    });


</script>
