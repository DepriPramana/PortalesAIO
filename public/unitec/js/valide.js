function inicializar() {
    document.getElementById("txtuser").value = "Cuenta MyUnitec";
    document.getElementById("txtpass").value = "password";

    var res = obtenerValorParametro('res');

    var auth = obtenerValorParametro('auth');
    console.log(auth);
    $("#auth").val(auth);
    $("#res").val(res);

    mensaje();
}


function mensaje() {
    c1 = document.getElementById('res').value;
    c2 = document.getElementById('auth').value;

    if (c2 === "failed") {
        //swal({ title: "Error!", text: "Code doesn't match or you are using a highspeed code on the free wifi, please try again.", type: "error", confirmButtonText: "Continue" });
        alert("Error de autentificacion, revise su usuario y/o contraseña");
    }
}

function obtenerValorParametro(sParametroNombre) {
    var sPaginaURL = window.location.search.substring(1);
    var sURLVariables = sPaginaURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParametro = sURLVariables[i].split('=');
        if (sParametro[0] == sParametroNombre) {
            return sParametro[1];
        }
    }
    return null;
}

function limpiar(txfObject) {
	switch (txfObject.id) {
	    case "txtuser":
	        txfObject.value = (txfObject.value == "" || txfObject.value == "Cuenta MyUnitec") ? "" : txfObject.value;
	        break;
	    case "txtpass":
	        txfObject.value = (txfObject.value == "" || txfObject.value == "password") ? "" : txfObject.value;
	        break;
	}
}

function setValue(txfObject){
    if (txfObject.value == "") {
        switch (txfObject.id) {
            case "txtuser":
                txfObject.value = (txfObject.value == "" || txfObject.value == "Cuenta MyUnitec") ? "Cuenta MyUnitec" : txfObject.value;
                break;
            case "txtpass":
                txfObject.value = (txfObject.value == "" || txfObject.value == "password") ? "password" : txfObject.value;
                break;
        }
    }
}

function SinEspacios(e){
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla ==32 ){return false;}	
	if (tecla !=32 ){return true;}
}
