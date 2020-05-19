<!--Echart 4.2-->
<script src="{{ asset('/plugins/incubator-echarts-4.2.1/dist/echarts.js') }}"></script>
<script src="{{ asset('/plugins/incubator-echarts-4.2.1/theme/vintage.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('.button-left').click(function(){
            $('.sidebar').toggleClass('fliph');
        });

    });


</script>
