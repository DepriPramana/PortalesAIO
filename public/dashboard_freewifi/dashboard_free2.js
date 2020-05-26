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

    $('.panel_results').hide();

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

  graph_ages();
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
    $('.panel_results').show();

    get_sessions();
    graph_genders();
    graph_ages();
    graph_domains();
    table_devices();
    table_browsers();
    table_platforms();
    table_languages();

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
        //console.log(data);
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

function table_devices()
{
    var objData = $('#generate_graphs').find("select,textarea, input").serialize();
    var total = 0;

    var device_list = [];

    var max_cantidad = 0;
    var min_cantidad = 0;

    $.ajax({
        type: "POST",
        url: "/get_graph_devices",
        data: objData,
        //contentType: false,
        //processData: false,
        success: function (data){
            //console.log(data[0][0].Cantidad);
            //Cantidad
            //browser
            $("#table_devices").empty();

            $.each(data,function(index, objdata){

                total += objdata.Cantidad;
            });

            $('#device_total').text(total);

            var device_total = [];
            var device_cat = [];

           $.each(data, function(index, objdata)
            {
                var percent = 0;
                var porcentaje = 0;

                percent = objdata.Cantidad * 100 / total;
                porcentaje = percent.toFixed(1);
                device_list.push({device: objdata.device, cantidad : objdata.Cantidad, porcentaje : porcentaje});

                device_total.push(objdata.Cantidad);
                device_cat.push(objdata.device);
            });


            max_cantidad = Math.max.apply(null, device_total);
            min_cantidad = Math.min.apply(null, device_total);



            let max_percent = 0;
            let min_percent = 0;

            var min_per = min_cantidad * 100 / total;
            var max_per = max_cantidad * 100 / total;

            min_percent = min_per.toFixed(1);
            max_percent = max_per.toFixed(1);

            let max_age = device_total.indexOf(Math.max(...device_total));
            let min_age = device_total.indexOf(Math.min(...device_total));

            var min = min_percent+"% - "+device_cat[min_age];
            var max = max_percent+"% - "+device_cat[max_age];



            $('#devices_total').empty();
            $('#devices_minimo').empty();
            $('#devices_maximo').empty();

            $('#devices_total').text(total);
            $('#devices_minimo').text(min);
            $('#devices_maximo').text(max);


            $.each(device_list,function(index, objdata){

                $("#table_devices").append("<tr title='Total: "+objdata.cantidad+"'><td>"+objdata.device+"</td><td>"+objdata.porcentaje+"</td></tr>");
            });
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });


}
function table_browsers() {
    var objData = $('#generate_graphs').find("select,textarea, input").serialize();

    var total = 0;

    var browser_list = [];

    $.ajax({
        type: "POST",
        url: "/get_graph_browsers",
        data: objData,
        //contentType: false,
        //processData: false,
        success: function (data){
            //console.log(data);
            //console.log(data[0][0].Cantidad);
            //Cantidad
            //browser

            $("#table_browsers").empty();
            $.each(data,function(index, objdata){

                total += objdata.Cantidad;

            });

            $('#browser_total').text(total);

            var browser_total = [];
            var browser_cat = [];

            $.each(data, function(index, objdata)
            {
                var percent = 0;
                var porcentaje = 0;

                percent = objdata.Cantidad * 100 / total;
                porcentaje = percent.toFixed(1);
                browser_list.push({browser: objdata.browser, cantidad : objdata.Cantidad, porcentaje : porcentaje});

                browser_total.push(objdata.Cantidad);
                browser_cat.push(objdata.browser);

            });

            max_cantidad = Math.max.apply(null, browser_total);
            min_cantidad = Math.min.apply(null, browser_total);

            let max_percent = 0;
            let min_percent = 0;

            var min_per = min_cantidad * 100 / total;
            var max_per = max_cantidad * 100 / total;

            min_percent = min_per.toFixed(1);
            max_percent = max_per.toFixed(1);

            let max_browser = browser_total.indexOf(Math.max(...browser_total));
            let min_browser = browser_total.indexOf(Math.min(...browser_total));

            var min = min_percent+"% - "+browser_cat[min_browser];
            var max = max_percent+"% - "+browser_cat[max_browser];


            $('#browsers_total').empty();
            $('#browser_minimo').empty();
            $('#browser_maximo').empty();

            $('#browsers_total').text(total);
            $('#browser_minimo').text(min);
            $('#browser_maximo').text(max);


            $.each(browser_list, function(index, objdata)
            {
                $("#table_browsers").append("<tr title='Total: "+objdata.cantidad+"'><td>"+objdata.browser+"</td><td>"+objdata.porcentaje+"</td></tr>");
            });

        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}

function table_platforms() {
    var objData = $('#generate_graphs').find("select,textarea, input").serialize();
    var total = 0;

    var platform_list = [];

    var max_cantidad = 0;
    var min_cantidad = 0;

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

            $("#table_platforms").empty();

            $.each(data,function(index, objdata){

                 total += objdata.Cantidad;
            });

            $('#platform_totals').text(total);

            var platform_total = [];
            var platform_cat   = [];

            $.each(data, function(index, objdata)
            {
                var percent = 0;
                var porcentaje = 0;

                percent = objdata.Cantidad * 100 / total;
                porcentaje = percent.toFixed(1);
                platform_list.push({platform: objdata.platform, cantidad : objdata.Cantidad, porcentraje : porcentaje});

                platform_total.push(objdata.Cantidad);
                platform_cat.push(objdata.platform);

            });

            max_cantidad = Math.max.apply(null, platform_total);
            min_cantidad = Math.min.apply(null, platform_total);

            let max_percent = 0;
            let min_percent = 0;

            var min_per = min_cantidad * 100 / total;
            var max_per = max_cantidad * 100 / total;

            min_percent = min_per.toFixed(1);
            max_percent = max_per.toFixed(1);

            let min_plat = platform_total.indexOf(Math.min(...platform_total));
            let max_plat = platform_total.indexOf(Math.max(...platform_total));

            var min = min_percent+"% - "+platform_cat[min_plat];
            var max = max_percent+"% - "+platform_cat[max_plat];

            $('#platform_minimo').empty();
            $('#platform_maximo').empty();
            $('#platforms_total').empty();

            $('#platforms_total').text(total);
            $('#platform_minimo').text(min);
            $('#platform_maximo').text(max);

            $.each(platform_list, function(index, objdata)
            {
                $("#table_platforms").append("<tr title='Total: "+objdata.cantidad+"'><td>"+objdata.platform+"</td><td>"+objdata.porcentraje+"</td></tr>");
            });



            //console.log(total);
            //console.log(platform_list);

        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}

function table_languages() {
    var objData = $('#generate_graphs').find("select,textarea, input").serialize();
    //var form = $('#generate_graphs')[0];
    //var formData = new FormData(form);
    var data_count1 = [];
    var data_name1 = [];

    var total = 0;

    var language_list = [];

    var language_total = [];
    var language_cat   = [];

    var max_cantidad = 0;
    var min_cantidad = 0;
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

                total += objdata.Cantidad;

            });

            $.each(data,function(index, objdata){
                //console.log(objdata);
                data_name1.push(objdata.language + ' = ' + objdata.Cantidad);
                data_count1.push({ value: objdata.Cantidad, name: objdata.language + ' = ' + objdata.Cantidad},);

                var percent = 0;
                var porcentaje = 0;

                percent = objdata.Cantidad * 100 / total;
                porcentaje = percent.toFixed(1);

                language_list.push({language: objdata.language, cantidad : objdata.Cantidad, porcentaje : porcentaje});

                language_total.push(objdata.Cantidad);
                language_cat.push(objdata.language);

            });



            max_cantidad = Math.max.apply(null, language_total);
            min_cantidad = Math.min.apply(null, language_total);

            let max_percent = 0;
            let min_percent = 0;

            var min_per = min_cantidad * 100 / total;
            var max_per = max_cantidad * 100 / total;

            min_percent = min_per.toFixed(1);
            max_percent = max_per.toFixed(1);

            let min_lan = language_total.indexOf(Math.min(...language_total));
            let max_lan = language_total.indexOf(Math.max(...language_total));

            var min = min_percent+"% - "+language_cat[min_lan];
            var max = max_percent+"% - "+language_cat[max_lan];


            $('#language_total').empty();
            $('#language_minimo').empty();
            $('#language_maximo').empty();

            $('#language_total').text(total);
            $('#languages_total').text(total);
            $('#language_minimo').text(min);
            $('#language_maximo').text(max);

            $.each(language_list, function(index, objdata)
            {
                $("#table_languages").append("<tr title='Total: "+objdata.cantidad+"'><td>"+objdata.language+"</td><td>"+objdata.porcentaje+"</td></tr>");
            });

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

    var min_cantidad = 0;
    var max_cantidad = 0;

    var division = 0;
    var total = 0;
    var totaldata = 0;
    var promedio = 0;
    // var data_count1 = [{value:98, name:'Promotores = 98'},{value:62, name:'Pasivos = 62'},{value:21, name:'Detractores = 21'}];
    // var data_name1 = ["Promotores = 98","Pasivos = 62","Detractores = 21"];
    $.ajax({
        type: "POST",
        url: "/get_graph_ages",
        data: objData,
        //contentType: false,
        //processData: false,
        success: function (data){
            //console.log(data);
            //Cantidad
            //browser
            // Arreglar procedure antes de generar el promedio...
            division = data[0].length;

            $.each(data[0],function(index, objdata){
                //console.log(parseInt(objdata.age));

                if (parseInt(objdata.age) > 89 || parseInt(objdata.age) < 10) {
                  division = division - 1;
                }else{
                  totaldata = totaldata + parseInt(objdata.age);
                  //console.log('entre al if: ' + parseInt(objdata.age));
                  //console.log(totaldata);
                }
                //data_name1.push(objdata.age + ' = ' + objdata.Cantidad);
                //data_count1.push({ value: objdata.Cantidad, name: objdata.age + ' = ' + objdata.Cantidad},);
                //data_group.push({ages : objdata.age, totals: objdata.Cantidad});
            });
            //console.log(division);
            //console.log(totaldata);

            promedio = (totaldata / (division)).toFixed(2);
            //console.log(promedio);
            var group = {categorias: [], total: []};

            $.each(data[1], function(key, obj){

                group.categorias.push(obj.label);
                group.total.push(obj.total);

                total += obj.total;
            });

            max_cantidad = Math.max.apply(null, group.total);
            min_cantidad = Math.min.apply(null, group.total);

            let max_percent = 0;
            let min_percent = 0;

            var min_per = min_cantidad * 100 / total;
            var max_per = max_cantidad * 100 / total;

            min_percent = min_per.toFixed(1);
            max_percent = max_per.toFixed(1);



            let max_age = group.total.indexOf(Math.max(...group.total));
            let min_age = group.total.indexOf(Math.min(...group.total));

            var min = min_percent+"% - "+group.categorias[min_age];
            var max = max_percent+"% - "+group.categorias[max_age];
            //console.log(total);
            //console.log(group.categorias.length);
            // hay que arreglar el procedure...
            //promedio = (total / (group.categorias.length - 1)).toFixed(2);

            /*console.log("max cantidad");
            console.log(max_cantidad);
            console.log(max_percent);
            console.log(group.categorias[max_age]);*/

            $('#ages_total').empty();
            $('#ages_promedio').empty();
            $('#ages_minimo').empty();
            $('#ages_maximo').empty();

            $('#ages_total').text(total);
            $('#ages_promedio').text(promedio);
            $('#ages_minimo').text(min);
            $('#ages_maximo').text(max);


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
  var data_count = [];

  // var data_count1 = [{value:98, name:'Promotores = 98'},{value:62, name:'Pasivos = 62'},{value:21, name:'Detractores = 21'}];
  // var data_name1 = ["Promotores = 98","Pasivos = 62","Detractores = 21"];
  $.ajax({
      type: "POST",
      url: "/get_graph_genders",
      data: objData,
      //contentType: false,
      //processData: false,

      success: function (data){
        //console.log(data);
        //console.log(data[0][0].Cantidad);
        //Cantidad
        //browser
        $.each(data,function(index, objdata){

            data_count.push(objdata);

          //console.log(objdata);
          //data_name1.push(objdata.gender + ' = ' + objdata.Cantidad);
          //data_count1.push({ value: objdata.Cantidad, name: objdata.gender, label: objdata.gender + ' = ' + objdata.Cantidad},);
          //$.each(objdata, function(index, objdata1){
            //console.log(objdata1);
          //});
        });

        var femenino = [];
        var masculino = [];
        var no_definido = [];

        $.each(data_count, function(index, obj)
        {
            if(obj.gender === "Femenino")
            {
                femenino.push(obj);
            }
            if(obj.gender === "Masculino")
            {
                masculino.push(obj);
            }

            if(obj.gender === "NoDefinido")
            {
                no_definido.push(obj);
            }

        });


        graph_table_gender(femenino, masculino, no_definido);


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

  var total = 0;

  var language_list = [];

  var language_total = [];
  var language_cat   = [];

  var max_cantidad = 0;
  var min_cantidad = 0;
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

          total += objdata.Cantidad;

          language_list.push({language: objdata.language, cantidad : objdata.Cantidad});

          language_total.push(objdata.Cantidad);
          language_cat.push(objdata.language);

        });

          max_cantidad = Math.max.apply(null, language_total);
          min_cantidad = Math.min.apply(null, language_total);

          let max_percent = 0;
          let min_percent = 0;

          var min_per = min_cantidad * 100 / total;
          var max_per = max_cantidad * 100 / total;

          min_percent = min_per.toFixed(1);
          max_percent = max_per.toFixed(1);

          let min_lan = language_total.indexOf(Math.min(...language_total));
          let max_lan = language_total.indexOf(Math.max(...language_total));

          var min = min_percent+"% - "+language_cat[min_lan];
          var max = max_percent+"% - "+language_cat[max_lan];


          $('#language_total').empty();
          $('#language_minimo').empty();
          $('#language_maximo').empty();

          $('#language_total').text(total);
          $('#language_minimo').text(min);
          $('#language_maximo').text(max);


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
            //console.log('kkkkkk');
            //console.log(data);
            //console.log(data[0][0].Cantidad);
            //Cantidad
            //browser
            var categorias = [];
            var total = [];
            var total_num = 0;

            var min_cantidad = 0;
            var max_cantidad = 0;

            var list_values = [];
            var list_domains = [];

            $.each(data,function(index, objdata){
                //console.log(objdata);

                categorias.push(objdata.name);
                total.push({value: objdata.total, itemStyle:{color: objdata.color} });

                total_num += objdata.total;

                list_values.push(objdata.total);
                list_domains.push(objdata.name);
            });

            max_cantidad = Math.max.apply(null, list_values);
            min_cantidad = Math.min.apply(null, list_values);

            let max_percent = 0;
            let min_percent = 0;

            var min_per = min_cantidad * 100 / total_num;
            var max_per = max_cantidad * 100 / total_num;

            min_percent = min_per.toFixed(1);
            max_percent = max_per.toFixed(1);


            let max_domain = list_values.indexOf(Math.max(...list_values));
            let min_domain = list_values.indexOf(Math.min(...list_values));



            var min = min_percent+"% - "+list_domains[min_domain];
            var max = max_percent+"% - "+list_domains[max_domain];


            $('#domain_total').empty();
            $('#domain_minimo').empty();
            $('#domain_maximo').empty();

            $('#domain_total').text(total_num);
            $('#domain_minimo').text(min);
            $('#domain_maximo').text(max);


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

  var total = 0;
  var min_cantidad = 0;
  var max_cantidad = 0;
  var promedio = 0;


  $.ajax({
    url: "/get_graph_sessions",
    type: "POST",
    data: objData,
    success: function (data) {
        // console.log(data);
      //console.log(data)
      $.each(data, function(index, dataHor2){
        dataHorario.push(dataHor2.horario);
        dataTickets.push(dataHor2.Cantidad);

        total += dataHor2.Cantidad;

      });

      max_cantidad = Math.max.apply(null, dataTickets)
      min_cantidad = Math.min.apply(null, dataTickets);

      let max_percent = 0;
      let min_percent = 0;

      min_per = min_cantidad * 100 / total;
      max_per = max_cantidad * 100 / total;
      min_percent = min_per.toFixed(1);
      max_percent = max_per.toFixed(1);

      let max_hour = dataTickets.indexOf(Math.max(...dataTickets))+1;
      let min_hour = dataTickets.indexOf(Math.min(...dataTickets))+1;

      //var min = "Mínimo: "+min_cantidad+" - "+min_hour+" hrs.";
      //var max = "Máximo: "+max_cantidad+" - "+max_hour+" hrs.";

      var min = min_percent+"% - "+min_hour+" hrs.";
      var max = max_percent+"% - "+max_hour+" hrs.";

      promedio = (total / (dataHorario.length - 1)).toFixed(2);
      //console.log(promedio);
      //var promedio = total / dataTickets.length;

        $('#session_total').empty();
        $('#session_prom').empty();
        $('#session_minimo').empty();
        $('#session_maximo').empty();

        $('#session_total').text(total);
        $('#session_prom').text(promedio);
        $('#session_minimo').text(min);
        $('#session_maximo').text(max);


        graph_barras_ocho_b_zendesk('maingraphicSessions', dataHorario, dataTickets, 'Sesiones 24h', total, min, max);
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
}

function graph_table_gender(femenino, masculino, no_definido)
{
    var fem = femenino[0];
    var mas = masculino[0];
    var nod = no_definido[0];

    var women_num = fem.Cantidad;
    var men_num   = mas.Cantidad;
    var nod_num   = nod.Cantidad;

    var total_num = women_num + men_num + nod_num;

    var women_p   = (women_num * 100) / total_num ;
    var women_per = women_p.toFixed(1);

    var men_p     = (men_num * 100) / total_num  ;
    var men_per   = men_p.toFixed(1);

    var nod_p     = (nod_num * 100) / total_num;
    var nod_per   = nod_p.toFixed(1);

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
    color: ['#3398DB', '#5528DB', '#ff00DB', '#3300DB', '#de3423'],
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
        color: ['#91eb38'],
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
