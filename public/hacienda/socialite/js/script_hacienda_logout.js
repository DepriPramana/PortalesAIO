$(function() {
  var objData = $("#loginform").find("select,textarea, input").serialize();
  /*$.ajax({
    type: "POST",
    url: "auth/dir",
    data: objData,
    success: function (data) {
      console.log('Success:', data);
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });*/

  var currentURL = window.location.href;
  var currentHost = window.location.hostname;
  // console.log(currentHost);
  var variables = currentURL.split("?");
  if (id_site == 0) {
    if (variables.length > 1) {
      $('#link_es').attr("href", "http://"+ currentHost + "/hacienda_logout/es" + '?'+ variables[1]);
      $('#link_en').attr("href", "http://"+ currentHost + "/hacienda_logout/en" + '?'+ variables[1]);
    }else{
      $('#link_en').attr("href", "http://"+ currentHost + "/hacienda_logout/en");
      $('#link_es').attr("href", "http://"+ currentHost + "/hacienda_logout/es");
    }
  }
});




$('#opcion-logout').on('click', function(){
  //var xa = validarEmail('email_address');
  //var xb = validarcheck('checkbox-signup');
  //var xc = validarcaptcha('fullname');



    $('#form-free').submit();
    /*var objData = $("#form-free").find("select,textarea, input").serialize();
    $.ajax({
         url: "/submit_hacienda_free",
         type: "POST",
         data: objData,
         success: function (data) {
          console.log(data);
           if (data === 'OK') {
             $('#form-free').submit();
           }
         },
         error: function (data) {
           console.log('Error:', data);
         }
     });*/
  
});


function validarcaptcha(campo, formulario){
  var xca =$('#'+campo).val();
  var xcc = $('#'+campo, formulario).val();
  if (xcc != ''){
    return true;
  }
  else {
    return false;
  }
}

function validarcheck(campo, formulario) {
  // $('input[name="room_or_acc"]:checked', '#form-1').val();

  if($('input[name='+campo+']', formulario).is(':checked')){
    return true;
  }
  else {
    return false;
  }
}
function validarEmail(campo) {
  var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
  if (campo != '') {
    select=document.getElementById(campo).value;
    if( select == null || select == 0 ) {
      return false;
    }
    else {
       if (regex.test(select)) {
         return true;
       }
       else {
         return false;
       }
    }
  }
}

function toast_error_check(msg) {
    $.toast({
          heading: 'Mensaje',
          text: msg,
          position: 'top-right',
          loaderBg: '#ff6849',
          icon: 'error',
          hideAfter: 3500
    });
}
