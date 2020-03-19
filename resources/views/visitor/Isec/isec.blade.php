<?php
$error = '';
$display_error = "none";

if(isset($_REQUEST["error"])){
  $display_error = 'block';
  if($_REQUEST["error"] == 1) $error = "El nombre de usuario es incorrecto. Favor de verificar";
  if($_REQUEST["error"] == 2) $error = "La contrase&ntilde;a proporcionada no es v&aacute;lida.Favor de verificar";
  if($_REQUEST["error"] == 3) $error = "Necesita iniciar sesi&oacute;n para acceder. Favor de ingresar los datos";
  if($_REQUEST["error"] == 4) $error = "Favor de capturar los datos";
  if($_REQUEST["error"] == 5) $error = "Lo sentimos su cuenta ha sido desactivada";
  if($_REQUEST["error"] == 6) $error = "Cuenta de personal desactivada";
}//if
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title> Red WiFi .::ISEC::. </title>

  <link href="isec/css/estilos.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="isec/js/jquery-1.6.2.js">     </script>
  <script type="text/javascript" src="isec/js/jquery-ui-1.8.15.js"> </script>
  <script type="text/javascript" src="isec/js/login.js">           </script>

</head>



<body>

<div id="contenido">

  <div id="box_login">



    <div id="div_img_box">
      <img id="img_logo"   alt="logo" src="isec/imagenes/logo.png" title="Universidad de Negocios ISEC" />
      <img id="img_antena" alt="Wifi" src="isec/imagenes/antena_gd.png" />
    </div><!-- imagenes top-->





    <div id="box_form">
      <div id="form_cont">

        <div id="form_encabezado"> <span> Con&eacute;ctate a la red Wi Fi </span> </div>
        <div id="form_wrapper">

          <form id="form2" name="fvalida" method="post" action="https://zd.wifimedia.mx:9998/login">
            <span id="label_clave" class="form_label"> Usuario: </span>
            <input id="username" name="username" class="form_input" onclick="quitarError()" onkeyup="listener_iniciar(event)" />
            <span id="" class="form_label"> Password: </span>
            <input type="password" id="password" name="password" class="form_input" onclick="quitarError()" onkeyup="listener_iniciar(event)" />
          </form>

          <span id="form_msj"> <span id="form_error" style="display:<?=$display_error?>"> <?=$error?> </span> </span>

          <div id="form_boton" onclick="loginSesion()">
            <span id="form_btn_txt"> Ingresar </span>
            <div id="form_btn_linea"></div>
            <div id="form_btn_img"> <img id="" src="isec/imagenes/key.png" /> </div>
          </div><!-- boton-->

        </div><!-- form wrapper-->

      </div><!-- contenedor del form-->
    </div><!-- box form -->



    <div id="box_ayuda">
      <div align="center"><img id="img_ayuda" alt="comentarios" src="isec/imagenes/comments.png" />
        <span id="tit_ayuda"> ¿Problemas para ingresar? </span>
        <span id="txt_ayuda">
        acude al Centro de C&oacute;mputo para recibir        ayuda </span></div>
    </div>



  </div><!-- box login -->

</div><!-- contenido-->


</body>





</html>
