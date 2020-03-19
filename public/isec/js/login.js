<!--
// JavaScript Document
function getObj(nombreItem){
  return document.getElementById(nombreItem);
}

function getVal(nombreItem){
  if(!existe(nombreItem)) alert(nombreItem);
  else{
    var valor = document.getElementById(nombreItem).value;
    if(valor == 'undefined') valor = '';
    return valor;
  }
}


function vacio(q) {    //q == value
  var caracteres = 0;
  for (var i=0; i<q.length; i++ ) {  
    if(q.charAt(i) != " " ) caracteres++
  }  
  return caracteres;  
}  

function campoVacio(campo){
  var clave = getVal(campo);
  var letras = vacio(clave);
  if(clave == '' || clave == 'undefined' || clave == null || letras == 0)
    return false;	
  else return true;
}

function existe(nombreElemento){
  var variable_name = getObj(nombreElemento);
  try {
     if (typeof(eval(variable_name)) != 'undefined')
     if (eval(variable_name) != null)
     return true;
  } catch(e) { }
  return false;
}


function limpiarValue(){//lenght argumentos
  var tope = arguments.length;
  for(var i=0; i<tope; i++){
    cambiarValue(arguments[i], '');
  }//for
}//funcion



/* FUNCIONES VISITANTE ...........................*/
function quitarErrorVis(){
  var div = getObj('form_error');
  div.innerHTML = '';  
  var visible = $("#form_error").is(":visible");
  if(visible)   $('#form_error').hide("slide", {  }, 400);
}



function loginVis(){
  quitarErrorVis();
  var div = getObj('form_error');
  var valido_pass = campoVacio('pass');
  
  if(!valido_pass){
    if(!valido_pass) div.innerHTML = 'Debes capturar la clave de pase de visitante';
    $('#form_error').show("drop", { }, 400);
  }
  
  else{
    var form = document.getElementById('form2');
    form.submit();
  }//else
}//funcion



function listener_loginVis(e){
  if(e.keyCode == 13 && vacio(getVal('pass'))>0) loginVis();
}






/* FUNCIONES ALUMNO ...........................*/

function limpiarInicio(){
  limpiarValue('username', 'password');
}



function quitarError(){
  var div = getObj('form_error');
  div.innerHTML = '';  
  var visible = $("#form_error").is(":visible");
  if(visible)   $('#form_error').hide("slide", {  }, 400);
}




function loginSesion(){
  quitarError();
  var div = getObj('form_error');
  var valido_usr = campoVacio('username');
  var valido_pwd = campoVacio('password');
  
  
  if(!valido_usr || !valido_pwd){
    if(!valido_pwd) div.innerHTML = 'Debes capturar la contrase&ntilde;a';
    if(!valido_usr) div.innerHTML = 'Debes capturar la matr&iacute;cula';
    $('#form_error').show("drop", { }, 400);
  }
  
  else{
    var form = document.getElementById('form2');
    form.submit();
  }//else
}//funcion



function listener_iniciar(e){
  if(e.keyCode == 13 && vacio(getVal('password'))>0) loginSesion();
}


-->