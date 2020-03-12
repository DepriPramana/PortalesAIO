const header = document.querySelector("#header");
const continuar = document.querySelector("#continuar");
const initial_div = document.querySelector("#initial_div");
const main_div = document.querySelector("#main_div");
const footer = document.querySelector("footer");
const despegue = document.querySelector("#despegar");
const aterrizaje = document.querySelector("#aterrizar");
const icon_text = document.querySelector("#icon_text");
const edad = document.querySelector("#edad");
const submit = document.querySelector("#submit");

continuar.addEventListener("click", function() { nextPage(); });

despegue.addEventListener("click", function() { alternar(1); });

aterrizaje.addEventListener("click", function() { alternar(2); });

submit.addEventListener("click", function(e) {
  e.preventDefault();
  //modal();
});

modal();

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
  var esperar = 20;
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
  main_div.classList.remove("hidden");
  footer.classList.remove("hidden");
}
