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
  var xa = validarEmail('email_addess');
  var xb = validarcheck('checkbox-signup');
  var xc = validarcaptcha('fullname');
  
  if (xa == false) {
     toast_error_check('Type a correct email.');
  }
  if (xb == false) {
     toast_error_check('Accept terms and conditions.');
  }
  if (xc == false) {
    toast_error_check('Type your full name');
  }

  if (xa == true && xb == true && xc == true) {
    var objData = $("#form-free").find("select,textarea, input").serialize();
    $.ajax({
         url: "/submit_hacienda_free",
         type: "POST",
         data: objData,
         success: function (data) {
          console.log(data);
           /*if (data === 'OK') {
             $('#loginform').submit();
           }*/
         },
         error: function (data) {
           console.log('Error:', data);
         }
     });
  }
});

$('#btnlogin-1').on('click', function(){
  // var xa = validarEmail('email_address');
  var xa = validarcaptcha('room')
  var xb = validarcaptcha('lastname');
  var xc = validarcheck('checkbox-signup');
  //var xc= validarcaptcha('g-recaptcha-response');
  // $('#g-recaptcha-response').val();

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
    var objData = $("#form-1").find("select,textarea, input").serialize();
    // var objData2 = $("#login_form_1").find("select,textarea, input").serialize();
    Swal.fire({
      title: 'Confirmation',
      text: "You are going to apply a charge to your room for internet access.",
      footer: "You will be logged in once the charge is done",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Yes, apply!',
      cancelButtonColor: '#d33',
      reverseButtons: true,
      allowOutsideClick: false,
      preConfirm: function(){
        
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.value) {

      }
    })
  }
        /*$.ajax({
             url: "/submit_hacienda_premium_1",
             type: "POST",
             data: objData,
             success: function (data) {
                // $('#loginform').submit();
                console.log(data);
                switch(data.status) {
                  case 1:
                    Swal.fire({
                      type: 'success',
                      title: 'Charge applied',
                      text: 'success',
                    });
                    break;
                  case 2:
                    Swal.fire({
                      type: 'error',
                      title: 'Error',
                      text: data.msg,
                    });
                    break;
                  case 3:
                    Swal.fire({
                      type: 'warning',
                      title: 'Warning',
                      text: data.msg,
                    });
                    break;
                  case 4:
                    Swal.fire({
                      type: 'warning',
                      title: 'Warning',
                      text: data.msg,
                    });
                    break;                
                  default:
                    Swal.fire({
                      type: 'error',
                      title: 'Error',
                      text: 'Try again...',
                    });
                }
             },
             error: function (data) {
               console.log('Error:', data);
             }
        });*/
});

function validarcaptcha(campo){
  var xca =$('#'+campo).val();
  if (xca != ''){
    return true;
  }
  else {
    return false;
  }
}

function validarcheck(campo) {
  if($('input[name='+campo+']').is(':checked')){
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