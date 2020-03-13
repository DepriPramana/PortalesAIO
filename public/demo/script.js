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
  loading("Por favor espere...");
});

modal();

function loading(warning) {
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
}

function mostrarFree() {
  loading("Internet de 512 Kbps...");
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
  const random = Math.random();
  let video = "";
  if(random < 0.33) {
    video = "<video id='vid' style='width: 100%; height: 100%;' autoplay muted controls playsinline><source src='demo/vidanta.mp4' type='video/mp4' /></video>";
  } else if(random < 0.66) {
    video = "<video id='vid' style='width: 100%; height: 100%;' autoplay muted controls playsinline><source src='demo/cirque.mp4' type='video/mp4' /></video>";
  } else {
    video = "<video id='vid' style='width: 100%; height: 100%;' autoplay muted controls playsinline><source src='demo/jungala.mp4' type='video/mp4' /></video>";
  }
  Swal.fire({
    html: video,
    showCancelButton: false,
    showConfirmButton: false,
    allowOutsideClick: () => {
      if(continuar.textContent == "Continuar") {
        nextPage();
      }
    },
    background: "transparent"
  });
  const vid = document.querySelector("#vid");
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
  });
}

function nextPage() {
  header.classList.add("hidden");
  Swal.close();
  initial_div.classList.remove("hidden");
  footer.classList.add("fix_footer");
  footer.classList.remove("hidden");
}
