const header = document.querySelector("#header");
const continuar = document.querySelector("#continuar");
const initial_div = document.querySelector("#initial_div");
const free_button = document.querySelector("#free_button");
const premium_button = document.querySelector("#premium_button");
const main_div = document.querySelector("#main_div");
const footer = document.querySelector("footer");
const despegue = document.querySelector("#despegar");
const aterrizaje = document.querySelector("#aterrizar");
const icon_text = document.querySelector("#icon_text");
const edad = document.querySelector("#edad");
const back = document.querySelector("#back");
const submit = document.querySelector("#submit");

continuar.addEventListener("click", function() { nextPage(); });

free_button.addEventListener("click", function() { mostrarFree(); });

premium_button.addEventListener("click", function() { mostrarPremium(); });

despegue.addEventListener("click", function() { alternar(1); });

aterrizaje.addEventListener("click", function() { alternar(2); });

back.addEventListener("click", function() { backtoinit(); });

submit.addEventListener("click", function(e) {
  e.preventDefault();
  //loading("Por favor espere...");
  modal2("premium");
});

modal();

/*function loading(warning) {
  Swal.fire({
    title: 'Conectando...',
    html: warning,
    timer: 1000,
    timerProgressBar: false,
    allowOutsideClick: false,
    onBeforeOpen: () => {
      Swal.showLoading();
      Swal.stopTimer();
    }
  });
  document.querySelector(".swal2-container").classList.add("ignore");
  document.querySelector(".swal2-modal").classList.add("ignore");
}*/

function mostrarFree() {
  //loading("Internet de 512 Kbps...");
  modal2("free");
}

function mostrarPremium() {
  initial_div.classList.add("hidden");
  main_div.classList.remove("hidden");
  footer.classList.remove("fix_footer");
}

function backtoinit() {
  main_div.classList.add("hidden");
  initial_div.classList.remove("hidden");
  footer.classList.add("fix_footer");
}

function alternar(avion) {
  if(avion == 1) {
    icon_text.textContent = "- S A L I D A -";
    despegue.classList.add("icon_selected");
    aterrizaje.classList.remove("icon_selected");
  } else {
    icon_text.textContent = "- L L E G A D A -";
    aterrizaje.classList.add("icon_selected");
    despegue.classList.remove("icon_selected");
  }
}

function modal() {
  Swal.fire({
    html: "<img id='logo-splash' src='demo/logo.jpeg' />",
    showCancelButton: false,
    showConfirmButton: false,
    allowOutsideClick: () => {
      //if(continuar.textContent == "Continuar") {
        nextPage();
      //}
    },
    background: "transparent"
  });
  /*const vid = document.querySelector("#vid");
  vid.onended = function() {
    nextPage();
  };
  var esperar = 10;
  vid.addEventListener("timeupdate", function() {
    if(this.currentTime > esperar) {
      continuar.textContent = "Continuar";
    } else {
      continuar.textContent = "Continuar en " + parseInt(esperar - this.currentTime + 1);
    }
  });*/
}

function modal2(button) {
  let video = "";
  if(edad.checked) {
    video = "<video id='vid' style='width: 100%; height: 100%;' autoplay controls playsinline><source src='demo/vidanta.mp4' type='video/mp4' /></video>";
  } else {
    const random = Math.random();
    if(random < 0.5) {
      video = "<video id='vid' style='width: 100%; height: 100%;' autoplay controls playsinline><source src='demo/cirque.mp4' type='video/mp4' /></video>";
    } else {
      video = "<video id='vid' style='width: 100%; height: 100%;' autoplay controls playsinline><source src='demo/jungala.mp4' type='video/mp4' /></video>";
    }
  }
  Swal.fire({
    title: '<label id="restan">Conectando en 10</label>',
    html: '<p style="margin-top: 0;" class="free_text hidden">Internet de 512 Kbps</p>' + video,
    timer: 100,
    timerProgressBar: false,
    allowOutsideClick: false,
    onBeforeOpen: () => {
      Swal.showLoading();
      Swal.stopTimer();
      document.querySelector(".swal2-styled").style.backgroundColor = "rgb(50, 150, 50)";
      document.querySelector(".swal2-styled").textContent = "Navegar";
      var esperar = 10;
      vid.addEventListener("timeupdate", function() {
        if(this.currentTime > esperar) {
          try {
            document.querySelector("#restan").textContent = "Ya estás en línea!";
          } catch(e) { /*Nothing to do...*/ }
          Swal.hideLoading();
        } else {
          document.querySelector("#restan").textContent = "Conectando en " + parseInt(esperar - this.currentTime + 1);
        }
      });
    },
    onClose: () => {
      alert("Submit");
    }
  });
  if(button == "free") {
    document.querySelector(".free_text").classList.remove("hidden");
  }
  document.querySelector(".swal2-container").classList.add("ignore");
  document.querySelector(".swal2-modal").classList.add("ignore");
}

function nextPage() {
  header.classList.add("hidden");
  Swal.close();
  initial_div.classList.remove("hidden");
  footer.classList.add("fix_footer");
  footer.classList.remove("hidden");
}
