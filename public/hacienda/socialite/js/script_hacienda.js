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
  if (id_site == 1) {
    if (variables.length > 1) {
      $('#link_es').attr("href", "http://"+ currentHost + "/HaciendaEncantada/es" + '?'+ variables[1]);
      $('#link_en').attr("href", "http://"+ currentHost + "/HaciendaEncantada/en" + '?'+ variables[1]);
    }else{
      $('#link_en').attr("href", "http://"+ currentHost + "/HaciendaEncantada/en");
      $('#link_es').attr("href", "http://"+ currentHost + "/HaciendaEncantada/es");
    }
  }else{
    if (variables.length > 1) {
      $('#link_es').attr("href", "http://"+ currentHost + "/MarinaFiesta/es" + '?'+ variables[1]);
      $('#link_en').attr("href", "http://"+ currentHost + "/MarinaFiesta/en" + '?'+ variables[1]);
    }else{
      $('#link_en').attr("href", "http://"+ currentHost + "/MarinaFiesta/en");
      $('#link_es').attr("href", "http://"+ currentHost + "/MarinaFiesta/es");
    }
  }

});

$('#back-btn').on('click', function(){
  $('#form-free').css("display","none");
  $('#form-1').css("display","none");
  $('#form-2').css("display","none");
  $('#form-3').css("display","none");
  $('#form-4').css("display","none");
  $('#opcion-free').css("display","block");
  $('#opcion-1').css("display","block");
  $('#opcion-2').css("display","block");
  $('#opcion-3').css("display","block");
  $('#opcion-4').css("display","block");
  $('#back-btn').css("display","none");
});
$('#opcion-free').on('click', function() {
  $('#form-free').css("display","block");
  $('#form-1').css("display","none");
  $('#form-2').css("display","none");
  $('#form-3').css("display","none");
  $('#form-4').css("display","none");
  $('#opcion-free').css("display","none");
  $('#opcion-1').css("display","none");
  $('#opcion-2').css("display","none");
  $('#opcion-3').css("display","none");
  $('#opcion-4').css("display","none");
  $('#back-btn').css("display","block");
});
$('#opcion-1').on('click', function() {
  $('#form-1').css("display","block");
  $('#form-2').css("display","none");
  $('#form-3').css("display","none");
  $('#form-4').css("display","none");
  $('#form-free').css("display","none");
  $('#opcion-free').css("display","none");
  $('#opcion-1').css("display","none");
  $('#opcion-2').css("display","none");
  $('#opcion-3').css("display","none");
  $('#opcion-4').css("display","none");
  $('#back-btn').css("display","block");
});
$('#opcion-2').on('click', function() {
  $('#form-1').css("display","none");
  $('#form-2').css("display","block");
  $('#form-3').css("display","none");
  $('#form-4').css("display","none");
  $('#form-free').css("display","none");
  $('#opcion-free').css("display","none");
  $('#opcion-1').css("display","none");
  $('#opcion-2').css("display","none");
  $('#opcion-3').css("display","none");
  $('#opcion-4').css("display","none");
  $('#back-btn').css("display","block");
});
$('#opcion-3').on('click', function() {
  $('#form-1').css("display","none");
  $('#form-2').css("display","none");
  $('#form-3').css("display","block");
  $('#form-4').css("display","none");
  $('#form-free').css("display","none");
  $('#opcion-free').css("display","none");
  $('#opcion-1').css("display","none");
  $('#opcion-2').css("display","none");
  $('#opcion-3').css("display","none");
  $('#opcion-4').css("display","none");
  $('#back-btn').css("display","block");
});
$('#opcion-4').on('click', function() {
  $('#form-1').css("display","none");
  $('#form-2').css("display","none");
  $('#form-3').css("display","none");
  $('#form-4').css("display","block");
  $('#form-free').css("display","none");
  $('#opcion-free').css("display","none");
  $('#opcion-1').css("display","none");
  $('#opcion-2').css("display","none");
  $('#opcion-3').css("display","none");
  $('#opcion-4').css("display","none");
  $('#back-btn').css("display","block");
});

$('#btnlogin-free').on('click', function(){
  var xa = validarEmail('email_address');
  var xb = validarcheck('checkbox-signup');
  var xc = validarcaptcha('fullname');

  if (xa == false) {
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Type a correct email.',
    });
  }
  if (xb == false) {
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Accept terms and conditions.',
    });
  }
  if (xc == false) {
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Type your full name.',
    });
  }

  if (xa == true && xb == true && xc == true) {
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
  }
});

$('#btnlogin-1').on('click', function(){
  // var xa = validarEmail('email_address');
  var xa = validarcaptcha('room', '#form-1')
  var xb = validarcaptcha('lastname', '#form-1');
  var xc = validarcheck('checkbox-signup');
  //var xc= validarcaptcha('g-recaptcha-response');
  // $('#g-recaptcha-response').val();
  var check1 = $('input[name="room_or_acc"]:checked', '#form-1').val();
  if (check1 === 'room') {
      var text = "You are going to apply a charge to your room for internet access.";
      var footer = "You will be logged in once the charge is done";
      var confirmButtonText = 'Yes, apply!'
  }else{
      var text = "You will be redirected.";
      var footer = "You will log in once you click continue, no charges apply.";
      var confirmButtonText = 'Continue.'
  }
  if (xa == false) {
    // toast_error_check('Type a room number');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Type a room number.',
    });
  }
  if (xb == false) {
    // toast_error_check('Type your last name');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Type a last name.',
    });
  }
  if (xc == false) {
    // toast_error_check('Accept terms and conditions.');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Accept terms and conditions.',
    });
  }
  if ( xa == true &&  xb == true && xc == true) {
    // var objData = $("#form-1").find("select,textarea, input").serialize();
    var form = $('#form-1')[0];
    var formData = new FormData(form);
    Swal.fire({
      type: 'warning',
      title: 'Confirmation',
      text: text,
      footer: footer,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: confirmButtonText,
      cancelButtonColor: '#d33',
      showLoaderOnConfirm: true,
      reverseButtons: true,
      allowOutsideClick: false,
      preConfirm: function (login) {
        return $.ajax({
             url: "/submit_hacienda_premium_1",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false
         })
         .done(function (response) {
           return response;
         })
         .fail(function (error) {
           Swal.showValidationMessage(
             "Error: " + error
           );
         });
        },
      allowOutsideClick: function () { !Swal.isLoading(); }
    }).then(function (result) {
        console.log(result.value);
        switch(result.value.status) {
          case 1:
            // console.log(result.value.user);
            $('input[name="username"]', '#loginform').val(result.value.user);
            Swal.fire({
              title: 'Charge applied',
              text: "Click continue to log in",
              type: 'success',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Continue!',
              allowOutsideClick: false,
              footer: 'If you get the log in form page again, you can log in by checking the browse with an existing account if the period bought has not yet expired.'
            }).then(function (result) {
              if (result.value) {
                $('#loginform').submit();
              }
            });
            break;
          case 2:
            Swal.fire({
              type: 'error',
              title: 'Error',
              text: result.value.msg,
            });
            break;
          case 3:
            Swal.fire({
              type: 'warning',
              title: 'Warning',
              text: result.value.msg,
            });
            break;
          case 4:
            Swal.fire({
              type: 'warning',
              title: 'Warning',
              text: result.value.msg,
            });
            break;
          case 5:
            $('input[name="username"]', '#loginform').val(result.value.user);
            $('#loginform').submit();
            break;
          default:
            Swal.fire({
              type: 'error',
              title: 'Error',
              text: 'Try again...',
            });
        }
    });
  }
});

$('#btnlogin-2').on('click', function(){
  // var xa = validarEmail('email_address');
  var xa = validarcaptcha('room', '#form-2')
  var xb = validarcaptcha('lastname', '#form-2');
  var xc = validarcheck('checkbox-signup');
  //var xc= validarcaptcha('g-recaptcha-response');
  // $('#g-recaptcha-response').val();
  var check1 = $('input[name="room_or_acc"]:checked', '#form-2').val();
  if (check1 === 'room') {
      var text = "You are going to apply a charge to your room for internet access.";
      var footer = "You will be logged in once the charge is done";
      var confirmButtonText = 'Yes, apply!'
  }else{
      var text = "You will be redirected.";
      var footer = "You will log in once you click continue, no charges apply.";
      var confirmButtonText = 'Continue.'
  }
  if (xa == false) {
    // toast_error_check('Type a room number');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Type a room number.',
    });
  }
  if (xb == false) {
    // toast_error_check('Type your last name');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Type a last name.',
    });
  }
  if (xc == false) {
    // toast_error_check('Accept terms and conditions.');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Accept terms and conditions.',
    });
  }
  if ( xa == true &&  xb == true && xc == true) {
    // var objData = $("#form-1").find("select,textarea, input").serialize();
    var form = $('#form-2')[0];
    var formData = new FormData(form);
    Swal.fire({
      type: 'warning',
      title: 'Confirmation',
      text: text,
      footer: footer,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: confirmButtonText,
      cancelButtonColor: '#d33',
      showLoaderOnConfirm: true,
      reverseButtons: true,
      allowOutsideClick: false,
      preConfirm: function (login) {
        return $.ajax({
             url: "/submit_hacienda_premium_2",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false
         })
         .done(function (response) {
           return response;
         })
         .fail(function (error) {
           Swal.showValidationMessage(
             "Error: " + error
           );
         });
        },
      allowOutsideClick: function () { !Swal.isLoading(); }
    }).then(function (result) {
        // console.log(result.value.msg);
        switch(result.value.status) {
          case 1:
            // console.log(result.value.user);
            $('input[name="username"]', '#loginform').val(result.value.user);
            Swal.fire({
              title: 'Charge applied',
              text: "Click continue to log in",
              type: 'success',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Continue!',
              allowOutsideClick: false,
              footer: 'If you get the log in form page again, you can log in by checking the browse with an existing account if the period bought has not yet expired.'
            }).then(function (result) {
              if (result.value) {
                $('#loginform').submit();
              }
            });
            break;
          case 2:
            Swal.fire({
              type: 'error',
              title: 'Error',
              text: result.value.msg,
            });
            break;
          case 3:
            Swal.fire({
              type: 'warning',
              title: 'Warning',
              text: result.value.msg,
            });
            break;
          case 4:
            Swal.fire({
              type: 'warning',
              title: 'Warning',
              text: result.value.msg,
            });
            break;
          case 5:
            $('input[name="username"]', '#loginform').val(result.value.user);
            $('#loginform').submit();
            break;
          default:
            Swal.fire({
              type: 'error',
              title: 'Error',
              text: 'Try again...',
            });
        }
    })
  }
});

$('#btnlogin-3').on('click', function(){
  // var xa = validarEmail('email_address');
  var xa = validarcaptcha('room', '#form-3')
  var xb = validarcaptcha('lastname', '#form-3');
  var xc = validarcheck('checkbox-signup');
  //var xc= validarcaptcha('g-recaptcha-response');
  // $('#g-recaptcha-response').val();
  var check1 = $('input[name="room_or_acc"]:checked', '#form-3').val();
  if (check1 === 'room') {
      var text = "You are going to apply a charge to your room for internet access.";
      var footer = "You will be logged in once the charge is done";
      var confirmButtonText = 'Yes, apply!'
  }else{
      var text = "You will be redirected.";
      var footer = "You will log in once you click continue, no charges apply.";
      var confirmButtonText = 'Continue.'
  }
  if (xa == false) {
    // toast_error_check('Type a room number');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Type a room number.',
    });
  }
  if (xb == false) {
    // toast_error_check('Type your last name');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Type a last name.',
    });
  }
  if (xc == false) {
    // toast_error_check('Accept terms and conditions.');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Accept terms and conditions.',
    });
  }
  if ( xa == true &&  xb == true && xc == true) {
    // var objData = $("#form-1").find("select,textarea, input").serialize();
    var form = $('#form-3')[0];
    var formData = new FormData(form);
    Swal.fire({
      type: 'warning',
      title: 'Confirmation',
      text: text,
      footer: footer,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: confirmButtonText,
      cancelButtonColor: '#d33',
      showLoaderOnConfirm: true,
      reverseButtons: true,
      allowOutsideClick: false,
      preConfirm: function (login) {
        return $.ajax({
             url: "/submit_hacienda_premium_3",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false
         })
         .done(function (response) {
           return response;
         })
         .fail(function (error) {
           Swal.showValidationMessage(
             "Error: " + error
           );
         });
        },
      allowOutsideClick: function () { !Swal.isLoading(); }
    }).then(function (result) {
        // console.log(result.value.msg);
        switch(result.value.status) {
          case 1:
            // console.log(result.value.user);
            $('input[name="username"]', '#loginform').val(result.value.user);
            Swal.fire({
              title: 'Charge applied',
              text: "Click continue to log in",
              type: 'success',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Continue!',
              allowOutsideClick: false,
              footer: 'If you get the log in form page again, you can log in by checking the browse with an existing account if the period bought has not yet expired.'
            }).then(function(result) {
              if (result.value) {
                $('#loginform').submit();
              }
            });
            break;
          case 2:
            Swal.fire({
              type: 'error',
              title: 'Error',
              text: result.value.msg,
            });
            break;
          case 3:
            Swal.fire({
              type: 'warning',
              title: 'Warning',
              text: result.value.msg,
            });
            break;
          case 4:
            Swal.fire({
              type: 'warning',
              title: 'Warning',
              text: result.value.msg,
            });
            break;
          case 5:
            $('input[name="username"]', '#loginform').val(result.value.user);
            $('#loginform').submit();
            break;
          default:
            Swal.fire({
              type: 'error',
              title: 'Error',
              text: 'Try again...',
            });
        }
    })
  }
});

$('#btnlogin-4').on('click', function(){
  // var xa = validarEmail('email_address');
  var xa = validarcaptcha('room', '#form-4')
  var xb = validarcaptcha('lastname', '#form-4');
  var xc = validarcheck('checkbox-signup');
  //var xc= validarcaptcha('g-recaptcha-response');
  // $('#g-recaptcha-response').val();
  var check1 = $('input[name="room_or_acc"]:checked', '#form-4').val();
  if (check1 === 'room') {
      var text = "You are going to apply a charge to your room for internet access.";
      var footer = "You will be logged in once the charge is done";
      var confirmButtonText = 'Yes, apply!'
  }else{
      var text = "You will be redirected.";
      var footer = "You will log in once you click continue, no charges apply.";
      var confirmButtonText = 'Continue.'
  }
  if (xa == false) {
    // toast_error_check('Type a room number');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Type a room number.',
    });
  }
  if (xb == false) {
    // toast_error_check('Type your last name');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Type a last name.',
    });
  }
  if (xc == false) {
    // toast_error_check('Accept terms and conditions.');
    Swal.fire({
      type: 'error',
      title: 'Error',
      text: 'Accept terms and conditions.',
    });
  }
  if ( xa == true &&  xb == true && xc == true) {
    // var objData = $("#form-1").find("select,textarea, input").serialize();
    var form = $('#form-4')[0];
    var formData = new FormData(form);
    Swal.fire({
      type: 'warning',
      title: 'Confirmation',
      text: text,
      footer: footer,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: confirmButtonText,
      cancelButtonColor: '#d33',
      showLoaderOnConfirm: true,
      reverseButtons: true,
      allowOutsideClick: false,
      preConfirm: function (login) {
        return $.ajax({
             url: "/submit_hacienda_premium_4",
             type: "POST",
             data: formData,
             contentType: false,
             processData: false
         })
         .done(function (response) {
           return response;
         })
         .fail(function (error) {
           Swal.showValidationMessage(
             "Error: " + error
           );
         });
        },
      allowOutsideClick: function () { !Swal.isLoading(); }
    }).then(function (result) {
        // console.log(result.value.msg);
        switch(result.value.status) {
          case 1:
            // console.log(result.value.user);
            $('input[name="username"]', '#loginform').val(result.value.user);
            Swal.fire({
              title: 'Charge applied',
              text: "Click continue to log in",
              type: 'success',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Continue!',
              allowOutsideClick: false,
              footer: 'If you get the log in form page again, you can log in by checking the browse with an existing account if the period bought has not yet expired.'
            }).then(function (result) {
              if (result.value) {
                $('#loginform').submit();
              }
            });
            break;
          case 2:
            Swal.fire({
              type: 'error',
              title: 'Error',
              text: result.value.msg,
            });
            break;
          case 3:
            Swal.fire({
              type: 'warning',
              title: 'Warning',
              text: result.value.msg,
            });
            break;
          case 4:
            Swal.fire({
              type: 'warning',
              title: 'Warning',
              text: result.value.msg,
            });
            break;
          case 5:
            $('input[name="username"]', '#loginform').val(result.value.user);
            $('#loginform').submit();
            break;
          default:
            Swal.fire({
              type: 'error',
              title: 'Error',
              text: 'Try again...',
            });
        }
    })
  }
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
