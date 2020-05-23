var yearnow = moment().format("YYYY");
var yearminus = moment().subtract(1, 'years').format('YYYY');
var mesyearnow = moment().format("MM-YYYY");

var mesdaynow = moment().format("YYYY-MM-DD");
var mesdayminus = moment().subtract(2, 'months').format("YYYY-MM-DD");
var mesdayminus2 = moment().subtract(1, 'days').format("YYYY-MM-DD");

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
});

/* ------- Users ----- */

$( "#pl_age" ).click(function() {
    $('#panelAges').removeClass("d-none");
    $('#panelGenders').addClass("d-none");
    $('#panelDomains').css("opacity", 0);
});

$( "#pl_gender" ).click(function() {
    $('#panelAges').addClass("d-none");
    $('#panelGenders').removeClass("d-none");
    $('#panelDomains').css("opacity", 0);
});

$( "#pl_domains" ).click(function() {
    $('#panelAges').addClass("d-none");
    $('#panelGenders').addClass("d-none");
    $('#panelDomains').css("opacity", 1);
});


/* ------- Devices ----- */

$( "#pl_device" ).click(function() {
    $('#panelDevices').removeClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').addClass("d-none");
});

$( "#pl_browser" ).click(function() {
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').css("opacity", 1).removeClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').addClass("d-none");
});

$( "#pl_plataform" ).click(function() {
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').css("opacity", 1).removeClass("d-none");
    $('#panelLanguages').addClass("d-none");
});

$( "#pl_language" ).click(function() {
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').css("opacity", 1).removeClass("d-none");
});


/* ---- sessions report ----- */

$('#rep_session').click(function(){

    $('#panelSession').css("opacity", 1).removeClass("d-none");
    $('#panelAges').addClass("d-none");
    $('#panelGenders').addClass("d-none");
    $('#panelDomains').addClass("d-none");
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').addClass("d-none");
    $('#panelHotspot').addClass("d-none");

});

$('#rep_age').click(function(){

    $('#panelSession').addClass("d-none");
    $('#panelAges').css("opacity", 1).removeClass("d-none");
    $('#panelGenders').addClass("d-none");
    $('#panelDomains').addClass("d-none");
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').addClass("d-none");
    $('#panelHotspot').addClass("d-none");

});


$('#rep_gender').click(function(){

    $('#panelSession').addClass("d-none");
    $('#panelAges').addClass("d-none")
    $('#panelGenders').css("opacity", 1).removeClass("d-none");
    $('#panelDomains').addClass("d-none");
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').addClass("d-none");
    $('#panelHotspot').addClass("d-none");

});

$('#rep_domains').click(function(){

    $('#panelSession').addClass("d-none");
    $('#panelAges').addClass("d-none")
    $('#panelGenders').addClass("d-none")
    $('#panelDomains').css("opacity", 1).removeClass("d-none");
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').addClass("d-none");
    $('#panelHotspot').addClass("d-none");

});

$('#rep_device').click(function(){

    $('#panelSession').addClass("d-none");
    $('#panelAges').addClass("d-none")
    $('#panelGenders').addClass("d-none")
    $('#panelDomains').addClass("d-none");
    $('#panelDevices').css("opacity", 1).removeClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').addClass("d-none");
    $('#panelHotspot').addClass("d-none");

});


$('#rep_browser').click(function(){

    $('#panelSession').addClass("d-none");
    $('#panelAges').addClass("d-none")
    $('#panelGenders').addClass("d-none")
    $('#panelDomains').addClass("d-none");
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').css("opacity", 1).removeClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').addClass("d-none");
    $('#panelHotspot').addClass("d-none");

});


$('#rep_plataform').click(function(){

    $('#panelSession').addClass("d-none");
    $('#panelAges').addClass("d-none")
    $('#panelGenders').addClass("d-none")
    $('#panelDomains').addClass("d-none");
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').css("opacity", 1).removeClass("d-none");
    $('#panelLanguages').addClass("d-none");
    $('#panelHotspot').addClass("d-none");

});


$('#rep_language').click(function(){

    $('#panelSession').addClass("d-none");
    $('#panelAges').addClass("d-none")
    $('#panelGenders').addClass("d-none")
    $('#panelDomains').addClass("d-none");
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').css("opacity", 1).removeClass("d-none");
    $('#panelHotspot').addClass("d-none");

});


$('#rep_hotspot').click(function(){

    $('#panelSession').addClass("d-none");
    $('#panelAges').addClass("d-none")
    $('#panelGenders').addClass("d-none")
    $('#panelDomains').addClass("d-none");
    $('#panelDevices').addClass("d-none");
    $('#panelBrowsers').addClass("d-none");
    $('#panelPlataform').addClass("d-none");
    $('#panelLanguages').addClass("d-none");
    $('#panelHotspot').css("opacity", 1).removeClass("d-none");

});





$(".select2").select2({
  theme: 'bootstrap',
  placeholder: 'Elije...',
  dropdownAutoWidth : true,
  width: 'auto'
});
$('#select_scope').on('change', function(){

  var id= $(this).val();
  var _token = $('input[name="_token"]').val();
  var datax = [];

  if (id != ''){
    let countC = 0;
    $.ajax({
      type: "POST",
      url: "/hotels_by_cadena",
      data: { scope : id , _token : _token },
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

$('.btn_search').on('click', function(){
  graph_browsers();
  graph_platforms();
  graph_devices();
  graph_genders();
  graph_languagues();
  get_sessions();
});

$('#btn_search_sessions').on('click', function(){
    get_sessions();
});

$('#btn_search_users').on('click', function(){
    graph_genders();
    graph_ages();
    graph_domains();
});

$('#btn_search_devices').on('click', function(){
    graph_devices();
    graph_platforms();
    graph_browsers();
    graph_languagues();
});

$('#btn_search_sessions_report').on('click', function()
{
    get_sessions();
    graph_genders();
    graph_ages();
    graph_domains();
    graph_devices();
    graph_platforms();
    graph_browsers();
    graph_languagues();

});

function graph_browsers() {
  var objData = $('#generate_graphs').find("select,textarea, input").serialize();

  //var form = $('#generate_graphs')[0];
  //var formData = new FormData(form);
  var data_count1 = [];
  var data_name1 = [];
  // var data_count1 = [{value:98, name:'Promotores = 98'},{value:62, name:'Pasivos = 62'},{value:21, name:'Detractores = 21'}];
  // var data_name1 = ["Promotores = 98","Pasivos = 62","Detractores = 21"];
  $.ajax({
      type: "POST",
      url: "/get_graph_browsers",
      data: objData,
      //contentType: false,
      //processData: false,
      success: function (data){
        console.log(data);
        //console.log(data[0][0].Cantidad);
        //Cantidad
        //browser
        $.each(data,function(index, objdata){
          //console.log(objdata);
          data_name1.push(objdata.browser + ' = ' + objdata.Cantidad);
          data_count1.push({ value: objdata.Cantidad, name: objdata.browser + ' = ' + objdata.Cantidad},);

          //$.each(objdata, function(index, objdata1){
            //console.log(objdata1);
          //});
        });

        graph_pie_default_four_with_porcent('maingraphicBrowser', data_name1, data_count1, 'Navegadores', 'Browsers');

      },
      error: function (data) {
        console.log('Error:', data);
      }
  });
}

function graph_platforms() {
  var objData = $('#generate_graphs').find("select,textarea, input").serialize();

  //var form = $('#generate_graphs')[0];
  //var formData = new FormData(form);
  var data_count1 = [];
  var data_name1 = [];
  // var data_count1 = [{value:98, name:'Promotores = 98'},{value:62, name:'Pasivos = 62'},{value:21, name:'Detractores = 21'}];
  // var data_name1 = ["Promotores = 98","Pasivos = 62","Detractores = 21"];
  $.ajax({
      type: "POST",
      url: "/get_graph_platforms",
      data: objData,
      //contentType: false,
      //processData: false,
      success: function (data){
        //console.log(data);
        //console.log(data[0][0].Cantidad);
        //Cantidad
        //browser
        $.each(data,function(index, objdata){
          //console.log(objdata);
          data_name1.push(objdata.platform + ' = ' + objdata.Cantidad);
          data_count1.push({ value: objdata.Cantidad, name: objdata.platform + ' = ' + objdata.Cantidad},);

          //$.each(objdata, function(index, objdata1){
            //console.log(objdata1);
          //});
        });

        graph_pie_default_four_with_porcent('maingraphicPlatform', data_name1, data_count1, 'Plataformas', 'OS');

      },
      error: function (data) {
        console.log('Error:', data);
      }
  });
}

function graph_devices() {
  var objData = $('#generate_graphs').find("select,textarea, input").serialize();

  //var form = $('#generate_graphs')[0];
  //var formData = new FormData(form);
  var data_count1 = [];
  var data_name1 = [];
  // var data_count1 = [{value:98, name:'Promotores = 98'},{value:62, name:'Pasivos = 62'},{value:21, name:'Detractores = 21'}];
  // var data_name1 = ["Promotores = 98","Pasivos = 62","Detractores = 21"];
  $.ajax({
      type: "POST",
      url: "/get_graph_devices",
      data: objData,
      //contentType: false,
      //processData: false,
      success: function (data){
        //console.log(data);
        //console.log(data[0][0].Cantidad);
        //Cantidad
        //browser
        $.each(data,function(index, objdata){
          //console.log(objdata);
          data_name1.push(objdata.device + ' = ' + objdata.Cantidad);
          data_count1.push({ value: objdata.Cantidad, name: objdata.device + ' = ' + objdata.Cantidad},);

          //$.each(objdata, function(index, objdata1){
            //console.log(objdata1);
          //});
        });

        graph_pie_default_four_with_porcent('maingraphicDevices', data_name1, data_count1, 'Dispositivos', 'Nombres');

      },
      error: function (data) {
        console.log('Error:', data);
      }
  });
}

function graph_ages() {
    var objData = $('#generate_graphs').find("select,textarea, input").serialize();
    //var form = $('#generate_graphs')[0];
    //var formData = new FormData(form);
    var data_count1 = [];
    var data_name1 = [];
    var data_group = [];
    // var data_count1 = [{value:98, name:'Promotores = 98'},{value:62, name:'Pasivos = 62'},{value:21, name:'Detractores = 21'}];
    // var data_name1 = ["Promotores = 98","Pasivos = 62","Detractores = 21"];
    $.ajax({
        type: "POST",
        url: "/get_graph_ages",
        data: objData,
        //contentType: false,
        //processData: false,
        success: function (data){
            //console.log(data); return false;
            //Cantidad
            //browser
            $.each(data,function(index, objdata){
                //console.log(objdata);
                data_name1.push(objdata.age + ' = ' + objdata.Cantidad);
                data_count1.push({ value: objdata.Cantidad, name: objdata.age + ' = ' + objdata.Cantidad},);
                data_group.push({ages : objdata.age, totals: objdata.Cantidad});
                //$.each(objdata, function(index, objdata1){
                //console.log(objdata1);
                //});
            });

            var group = {categorias: [], total: []};

            $.each(data, function(key, obj){

                group.categorias.push(obj.label);
                group.total.push(obj.total);

            });

            //console.log(data);
            //console.log(group);

            graph_barras_horizontal('maingraphicAges', group);


        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}

function graph_genders() {
  var objData = $('#generate_graphs').find("select,textarea, input").serialize();
  //var form = $('#generate_graphs')[0];
  //var formData = new FormData(form);
  var data_count1 = [];
  var data_name1 = [];
  // var data_count1 = [{value:98, name:'Promotores = 98'},{value:62, name:'Pasivos = 62'},{value:21, name:'Detractores = 21'}];
  // var data_name1 = ["Promotores = 98","Pasivos = 62","Detractores = 21"];
  $.ajax({
      type: "POST",
      url: "/get_graph_genders",
      data: objData,
      //contentType: false,
      //processData: false,


      success: function (data){
        //console.log(data[0][0].Cantidad);
        //Cantidad
        //browser
        $.each(data,function(index, objdata){
          //console.log(objdata);
          data_name1.push(objdata.gender + ' = ' + objdata.Cantidad);
          data_count1.push({ value: objdata.Cantidad, name: objdata.gender, label: objdata.gender + ' = ' + objdata.Cantidad},);
          //$.each(objdata, function(index, objdata1){
            //console.log(objdata1);
          //});
        });

        graph_table_gender(data_count1);

        //graph_pie_default_four_with_porcent('maingraphicGenders', data_name1, data_count1, 'Generos', '');

      },
      error: function (data) {
        console.log('Error:', data);
      }
  });
}

function graph_languagues() {
  var objData = $('#generate_graphs').find("select,textarea, input").serialize();
  //var form = $('#generate_graphs')[0];
  //var formData = new FormData(form);
  var data_count1 = [];
  var data_name1 = [];
  // var data_count1 = [{value:98, name:'Promotores = 98'},{value:62, name:'Pasivos = 62'},{value:21, name:'Detractores = 21'}];
  // var data_name1 = ["Promotores = 98","Pasivos = 62","Detractores = 21"];
  $.ajax({
      type: "POST",
      url: "/get_graph_languages",
      data: objData,
      //contentType: false,
      //processData: false,
      success: function (data){
        //console.log(data);
        //console.log(data[0][0].Cantidad);
        //Cantidad
        //browser
        $.each(data,function(index, objdata){
          //console.log(objdata);
          data_name1.push(objdata.language + ' = ' + objdata.Cantidad);
          data_count1.push({ value: objdata.Cantidad, name: objdata.language + ' = ' + objdata.Cantidad},);

          //$.each(objdata, function(index, objdata1){
            //console.log(objdata1);
          //});
        });

        graph_pie_default_four_with_porcent('maingraphicLanguages', data_name1, data_count1, 'Idiomas', 'registrados');

      },
      error: function (data) {
        console.log('Error:', data);
      }
  });
}

function graph_domains() {
    var objData = $('#generate_graphs').find("select,textarea, input").serialize();
    //var form = $('#generate_graphs')[0];
    //var formData = new FormData(form);
    var data_count1 = [];
    var data_name1 = [];
    // var data_count1 = [{value:98, name:'Promotores = 98'},{value:62, name:'Pasivos = 62'},{value:21, name:'Detractores = 21'}];
    // var data_name1 = ["Promotores = 98","Pasivos = 62","Detractores = 21"];
    $.ajax({
        type: "POST",
        url: "/get_graph_domains",
        data: objData,
        //contentType: false,
        //processData: false,
        success: function (data){
            //console.log(data);
            //console.log(data[0][0].Cantidad);
            //Cantidad
            //browser
            var categorias = [];
            var total = [];

            $.each(data,function(index, objdata){
                //console.log(objdata);

                categorias.push(objdata.name);
                total.push({value: objdata.total, itemStyle:{color: objdata.color} });

                //$.each(objdata, function(index, objdata1){
                //console.log(objdata1);
                //});
            });

            console.log(total);


            graph_bar_domains('maingraphicDomains', categorias, total, 'Dominios Correo', 'registrados');

            //graph_pie_default_four_with_porcent('maingraphicDomains', data_name1, data_count1, 'Dominios Correo', 'registrados');

        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}

function get_sessions() {
  //url: "/get_graph_sessions",
  var objData = $('#generate_graphs').find("select,textarea, input").serialize();
  var dataHorario = [];
  var dataTickets = [];

  $.ajax({
    url: "/get_graph_sessions",
    type: "POST",
    data: objData,
    success: function (data) {
      //console.log(data)
      $.each(data, function(index, dataHor2){
        dataHorario.push(dataHor2.horario);
        dataTickets.push(dataHor2.Cantidad);
      });
      graph_barras_ocho_b_zendesk('maingraphicSessions', dataHorario, dataTickets, 'Sesiones 24h');
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
}

function graph_table_gender(data)
{
    var total_num = data[0].value+data[1].value;
    var women_num = data[1].value;
    var men_num   = data[0].value;

    var women_p   = (women_num * 100) / total_num ;
    var women_per = women_p.toFixed(1);
    var men_p     = (men_num * 100) / total_num  ;
    var men_per   = men_p.toFixed(1);

    $('#maingraphicGender').removeClass('d-none');

    $('#total_men').text(men_per);
    $('#total_women').text(women_per);
    $('#total_people').text(total_num);

    $('#panel_men').attr('title', 'Total Hombres: '+men_num);
    $('#panel_women').attr('title', 'Total Mujeres: '+women_num);


}

function graph_pie_default_four_with_porcent(title, campoa, campob, titlepral, subtitulopral){
  var myChart = echarts.init(document.getElementById(title));
  var option = {
        title : {
            show: true,
            text: titlepral,
            subtext: subtitulopral,
            x:'left',
            textStyle: {
             color: '#449D44',
             fontStyle: 'normal',
             fontWeight: 'normal',
             fontFamily: 'sans-serif',
             fontSize: 18,
             align: 'center',
             verticalAlign: 'top',
             width: '100%',
             textBorderColor: 'transparent',
             textBorderWidth: 0,
             textShadowColor: 'transparent',
             textShadowBlur: 0,
             textShadowOffsetX: 0,
             textShadowOffsetY: 0,
           },
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            // type: 'scroll',
            orient: 'horizontal',
            // right: 10,
            // top: 10,
            bottom: 10,
            data: campoa
        },
        grid: {
          show: false,
          backgroundColor: '#fff'
        },
        color : ['#0B610B','#FFBF00', '#E73231', '#c23531','#2f4554', '#61a0a8', '#d48265', '#91c7ae','#749f83',  '#ca8622', '#bda29a','#6e7074', '#546570', '#c4ccd3'],
        series : [
            {
                name: 'Información',
                type: 'pie',
                radius : '50%',
                center: ['50%', '50%'],
                data:campob,
                itemStyle : {
                    normal : {
                        label : {
                            position : 'outside',
                            formatter : function (params) {
                              return (params.percent - 0).toFixed(2) + '%'
                            }
                        },
                        labelLine : {
                            show : true
                        }
                    },
                    emphasis : {
                        label : {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)',
                            show : true,
                            formatter : "{b}\n{d}%"
                        }
                    }

                }
            }
        ]
  };
  myChart.setOption(option);

  $(window).on('resize', function(){
      if(myChart != null && myChart != undefined){
          myChart.resize();
      }
  });
}

function graph_barras_ocho_b_zendesk(title, dataHorario, dataTickets, titlepral) {
  var myChart = echarts.init(document.getElementById(title));
  var option = {
    title: {
       text: titlepral,
       padding: 20,
       subtext: '',
       //subtext: 'Total de tickets: ' + total + '  Promedio de tickets por hora: ' + promxhora,
       textStyle: {
        color: '#449D44',
        fontStyle: 'normal',
        fontWeight: 'normal',
        fontFamily: 'sans-serif',
        fontSize: 18,
        align: 'left',
        verticalAlign: 'bottom',
        width: '20%',
        textBorderColor: 'transparent',
        textBorderWidth: 0,
        textShadowColor: 'transparent',
        textShadowBlur: 0,
        textShadowOffsetX: 0,
        textShadowOffsetY: 0,
       },
       subtextStyle: {
        padding: 20,
        color: '#449D44',
        fontStyle: 'normal',
        fontWeight: 'normal',
        fontFamily: 'sans-serif',
        fontSize: 10,
        align: 'left',
        verticalAlign: 'bottom',
        width: '20%',
        textBorderColor: 'transparent',
        textBorderWidth: 0,
        textShadowColor: 'transparent',
        textShadowBlur: 0,
        textShadowOffsetX: 0,
        textShadowOffsetY: 0,
       },
    },
    color: ['#3398DB'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type: 'cross',
            label: {
                backgroundColor: '#6a7985'
            }
        }
    },
    legend: {
      data:['Sesiones']
    },
    toolbox: {
        show : false,
        feature : {
            dataView : {show: false, readOnly: false, title : 'Datos', lang: ['Vista de datos', 'Cerrar', 'Actualizar']},
            magicType : {
              show: true,
              type: ['line', 'bar'],
              title : {
                line : 'Gráfico de líneas',
                bar : 'Gráfico de barras',
                stack : 'Acumular',
                tiled : 'Tiled',
                force: 'Cambio de diseño orientado a la fuerza',
                chord: 'Interruptor del diagrama de acordes',
                pie: 'Gráfico circular',
                funnel: 'Gráfico de embudo'
              },
            },
            restore : {show: false, title : 'Recargar'},
            saveAsImage : {show: true , title : 'Guardar'}
        }
    },
    calculable : true,
    grid: {
        left: '5%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            data : dataHorario,
            axisTick: {
                alignWithLabel: true
            },
            axisLabel : {
               show:true,
               interval: 'auto',    // {number}
               rotate: 40,
               margin: 10,
               formatter: '{value}',
               textStyle: {
                   fontFamily: 'sans-serif',
                   fontSize: 8,
                   fontStyle: 'italic',
                   fontWeight: 'bold'
               }
            }
        }
    ],
    yAxis : [
        {
            type : 'value',
            boundaryGap: [0, 0.1]
        }
    ],
    series : [
      {
          name:'Sesiones',
          type:'bar',
          itemStyle: {normal: {areaStyle: {type: 'default'}}},
          data: dataTickets
      }
    ]
  };
  myChart.setOption(option);

  $(window).on('resize', function(){
      if(myChart != null && myChart != undefined){
          myChart.resize();
      }
  });
}


function graph_barras_horizontal(title, data)
{
    //console.log(data);
    var myChart = echarts.init(document.getElementById(title));

    var option = {
            title : {
                show: true,
                text: "Edades",
                subtext: "registrados",
                x:'left',
                textStyle: {
                    color: '#449D44',
                    fontStyle: 'normal',
                    fontWeight: 'normal',
                    fontFamily: 'sans-serif',
                    fontSize: 18,
                    align: 'center',
                    verticalAlign: 'top',
                    width: '100%',
                    textBorderColor: 'transparent',
                    textBorderWidth: 0,
                    textShadowColor: 'transparent',
                    textShadowBlur: 0,
                    textShadowOffsetX: 0,
                    textShadowOffsetY: 0,
                },
            },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            data: ['Personas']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true,
            backgroundColor: '#fff'
        },
        color: ['#3398DB'],
        xAxis: {
            type: 'value',
            boundaryGap: [0, 0.01]
        },
        yAxis: {
            type: 'category',
            data: data.categorias
        },
        series: [
            {
                name: 'Personas',
                type: 'bar',
                data: data.total
            }
        ]
    };



    myChart.setOption(option);

    $(window).on('resize', function(){
        if(myChart != null && myChart != undefined){
            myChart.resize();
        }
    });

}

function graph_bar_domains(title, dominios, cantidad, titlepral, subtitulopral){

    var myChart = echarts.init(document.getElementById(title));
    var option = {
        color: ['#9adb60'],
        title : {
            show: true,
            text: titlepral,
            subtext: subtitulopral,
            x:'left',
            textStyle: {
                color: '#449D44',
                fontStyle: 'normal',
                fontWeight: 'normal',
                fontFamily: 'sans-serif',
                fontSize: 18,
                align: 'center',
                verticalAlign: 'top',
                width: '100%',
                textBorderColor: 'transparent',
                textBorderWidth: 0,
                textShadowColor: 'transparent',
                textShadowBlur: 0,
                textShadowOffsetX: 0,
                textShadowOffsetY: 0,
            },
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [
            {
                type: 'category',
                data: dominios,
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [{
            data: cantidad,
            type: 'bar'
        }]
    };


    myChart.setOption(option);

   /* $(window).on('resize', function(){
        if(myChart != null && myChart != undefined){
            myChart.resize();
        }
    });*/


    $(window).on('resize', function(){
        if(myChart != null && myChart != undefined){
            myChart.resize();
        }
    });
}
