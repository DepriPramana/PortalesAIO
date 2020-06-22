var yearnow = moment().format("YYYY");
var yearminus = moment().subtract(1, 'years').format('YYYY');
var mesyearnow = moment().format("MM-YYYY");

var mesdaynow = moment().format("YYYY-MM-DD");
var mesdayminus = moment().subtract(2, 'months').format("YYYY-MM-DD");
var mesdayminus2 = moment().subtract(1, 'days').format("YYYY-MM-DD");

var startofmonth = moment().startOf('month').format("YYYY-MM-DD");
var endofmonth = moment(startofmonth).endOf('month').format("YYYY-MM-DD");

//console.log(startofmonth);
//console.log(endofmotnth);

$(function() {
  moment.locale('es');


  $('#datepickerWeek').datepicker({
    language: 'es',
    format: "yyyy-mm-dd",
    viewMode: "years",
    minViewMode: "days",
    startDate: "2013-01-01",
    endDate: yearnow
  });
  $('#datepickerWeek2').datepicker({
    language: 'es',
    format: "yyyy-mm-dd",
    viewMode: "years",
    minViewMode: "days",
    startDate: "2013-01-01",
    endDate: yearnow
  });
  $('#datepickerWeek').val(startofmonth);
  $('#datepickerWeek2').val(endofmonth);

  $('.panel_results').show();
  $('#panelSession').addClass("d-none");
  $('#panelAges').addClass("d-none")
  $('#panelGenders').addClass("d-none")
  $('#panelDomains').addClass("d-none");
  $('#panelCountries').addClass("d-none");
  $('#panelDevices').addClass("d-none");
  $('#panelBrowsers').addClass("d-none");
  $('#panelPlataform').addClass("d-none");
  $('#panelLanguages').addClass("d-none");
  $('#panelHotspot').css("opacity", 1).removeClass("d-none");

  var _token = $('input[name="_token"]').val();
  var datax = [];

  $.ajax({
    type: "POST",
    url: "/hotels_by_cadena",
    data: { scope : 102 , _token : _token },
    success: function (data){
      //console.log(data);
      countH = data.length;
      //console.log(countH);
      if (countH === 0) {
        $('#select_hotspots').empty();
      }
      else{
        $('#select_hotspots').empty();
        datax.push({id : "", text : "Elija ..."});
        $.each(data, function(index, datos){
          datax.push({id: datos.id, text: datos.Nombre_hotel});
        });
        $('#select_hotspots').select2({
            data : datax
        });
      }
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });

  //$('#btn_concentrado').trigger('click');

});



$(".select2").select2({
  theme: 'bootstrap',
  placeholder: 'Elije...',
  dropdownAutoWidth : true,
  width: 'auto'
});
$('#select_scope').on('change', function(){
  var _token = $('input[name="_token"]').val();
  var datax = [];

  if (id != ''){
    let countC = 0;
    $.ajax({
      type: "POST",
      url: "/hotels_by_cadena",
      data: { scope : 108 , _token : _token },
      success: function (data){
        //console.log(data);
        countH = data.length;
        //console.log(countH);
        if (countH === 0) {
          $('#select_hotspots').empty();
        }
        else{
          $('#select_hotspots').empty();
          datax.push({id : "", text : "Elija ..."});
          $.each(data, function(index, datos){
            datax.push({id: datos.id, text: datos.Nombre_hotel});
          });
          $('#select_hotspots').select2({
              data : datax
          });
        }
      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  }
  else{
    $('#select_hotspots').empty();
  }
});

$('#select_hotspots').on('change', function(){
  //console.log('change hotspot...')
  //("#maingraphicBrowser")
});



$('#btn_search_sessions_report').on('click', function()
{
    $('.panel_results').show();

    get_chart_hotspots();

});



// SECCION DE HOTSPOT

$("#hotspot_select_data").on('change', () => get_chart_hotspots() );
function get_chart_hotspots() {
    const panelCarga = $("#panelHotspotLogin");
    const chart = echarts.init(document.querySelector("#maingraphicHotspot"));

    const request = {
        datepickerWeek: $('#generate_graphs').find('#datepickerWeek').val(),
        datepickerWeek2: $('#generate_graphs').find('#datepickerWeek2').val(),
        select_scope: $('#generate_graphs').find('#select_scope').val(),
        select_hotspots: $('#generate_graphs').find('#select_hotspots').val(),
        option: $("#hotspot_select_data").val(),
        _token: $("meta[name='csrf-token']").attr("content")
    };
    //console.log(request);
    const chartOptions = {
        legend: {
            data: []
        },
        tooltip: {
            trigger: 'axis'
        },
        xAxis: {
            type: 'category',
            data: []
        },
        yAxis: {
            type: 'value',
            name: 'Megabytes'
        },
        series: []
    };
    panelCarga.css({ display: 'block' });
    $.post(`/get_grap_hotspot`, request, response => {


        const processResult = getDataChartBySelection( response, chartOptions, $("#hotspot_select_data").val() );

        chart.setOption( processResult );

        //console.log("Response", response);
        panelCarga.css({ display: 'none' });
        $(window).on('resize', function(){
            if(myChart != null && myChart != undefined){
                myChart.resize();
            }
        });
    });
}

function getDataChartBySelection( response, chartOptions, option ) {
    const labels = [];
    const dataset = [];
    let filterCamp = "";
    //console.log("Option selected", option);
    let total = 0;
    let promedio = 0;

    switch(Number(option)) {
        case 0:
            filterCamp = "Logins";
            chartOptions.yAxis.name = "Número de usuarios logeados";
        break;
        case 1:
            filterCamp = "Usuarios_Unicos";
            chartOptions.yAxis.name = "Número de usuarios únicos";
        break;
        case 2:
            filterCamp = "Nuevos_Usuarios";
            chartOptions.yAxis.name = "Número de nuevos usuarios";
        break;
        case 3:
            filterCamp = "valor";
            chartOptions.yAxis.name = "Cantidad de MB";
        break;
        case 4:
            filterCamp = "valor";
            chartOptions.yAxis.name = "Cantidad de MB";
        break;
        case 5:
            filterCamp = "valor";
            chartOptions.yAxis.name = "Minútos";
        break;
        case 6:
            filterCamp = "Revenue_dls";
            chartOptions.yAxis.name = "Dolares";
        break;
    }

    for( let data of response ) {
        dataset.push(data[filterCamp]);
        labels.push(data.fecha2);
        total += Number(data[filterCamp]);
    }
    promedio = (response.length > 0) ? total / response.length : 0;

    promedio = ( Number(option) == 0 || Number(option) == 1 || Number(option) == 2 ) ? parseInt(promedio) : new Intl.NumberFormat('en-MX').format(promedio.toFixed(2));

    chartOptions.xAxis.data = labels;
    chartOptions.series = [
        {
            data: dataset,
            type: 'line'
        }
    ];
    $("#hotspot_total").text(new Intl.NumberFormat('en-MX').format(total));
    $("#hotspot_promedio").text(promedio);
    /*console.log("Total", total);
    console.log("Promedio", promedio);*/

    return chartOptions;

}
