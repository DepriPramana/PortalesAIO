function getstoreios(appName, appId) {
	var baseurl = "itms-apps://itunes.apple.com/app/";
			var name = appName;
			var id = appId;
	var ruta = baseurl + name + "/id" + id;
	return ruta;

}
function getstoreandroid(appId) {
	var baseurl = "https://play.google.com/store/apps/details?id=";
			var id = appId;
			var ruta = baseurl + id;
	return ruta;
}
function cronometro() {
		var cronometro;
		var contador_s =0;
		var contador_m =0;
		var s = document.getElementById("segundos");
		var m = document.getElementById("minutos");
		cronometro = setInterval(
			function(){
					if(contador_s==60)
					{
							contador_s=0;
							contador_m++;
							console.log(contador_m);
							document.getElementById('minutos').innerHTML = contador_m;
						 //  m.innerHTML = contador_m;
							if(contador_m==60)
							{
									contador_m=0;
							}
					}
					document.getElementById('segundos').innerHTML = contador_s;
					console.log(contador_s);
				 //  s.innerHTML = contador_s;
					contador_s++;
			}
			,1000);
}

function mostrar(){
	document.getElementById("mostrarbtn").style.display="block";
}

function cronometro_inverso() {
	var cronometro;
	var contador_s =5;
	cronometro = setInterval(
	function(){
			if(contador_s==0)
			{
				document.getElementById('segundos').innerHTML = 0;
				//mostrar();
				// setTimeout(function(){
				// 	$('#formpr').submit();
				// }, 1000);
				console.log('detener');
			}
			else {
				document.getElementById('segundos').innerHTML = contador_s;
				console.log(contador_s);
				contador_s--;
			}
	},1000);
}

function btnredirpush() {
	var objData = $("#formpr").find("select,textarea, input").serialize();
	console.log('le picke');
	
	$('#login2').submit();
	//$('#formpr').submit();
}

(function () {
	var MOBILE_SITE = '/mobile/index.html', // site to redirect to
			NO_REDIRECT = 'noredirect'; // cookie to prevent redirect
			//cronometro_inverso();
	// I only want to redirect iPhones, Android phones and a handful of 7" devices

	// Mover a página de redirección.
	// if (isMobile.apple.device || isMobile.android.phone || isMobile.seven_inch) {

	// 	if (isMobile.apple.device){
	// 		console.log('hola ios');
	// 		var name_game= "iberostar-hotels-resorts";
	// 		var id_game = "922530529";
	// 		fallbackLink = getstoreios(name_game, id_game);
	// 	}
	 //  if (isMobile.android.phone) {
	 //  	console.log('hola android');
	 //  	var id_game= 'com.mo2o.iberostar';
	 //  	fallbackLink = getstoreandroid(id_game);
	 //  }

	//     // Only redirect if the user didn't previously choose
	//     // to explicitly view the full site. This is validated
	//     // by checking if a "noredirect" cookie exists
	//     if ( document.cookie.indexOf(NO_REDIRECT) === -1 ) {
	//         document.location = fallbackLink;
	//         //window.location.replace(fallbackLink);
	//     }
	// }

})();