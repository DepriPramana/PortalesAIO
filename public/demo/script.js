const despegue = document.querySelector("#despegar");
const aterrizaje = document.querySelector("#aterrizar");
const icon_text = document.querySelector("#icon_text");
const edad = document.querySelector("#edad");
const submit = document.querySelector("#submit");

despegue.addEventListener("click", function() { alternar(1); });

aterrizaje.addEventListener("click", function() { alternar(2); });

submit.addEventListener("click", function(e) {
  e.preventDefault();
  modal();
});

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
    html: video,
    showCancelButton: false,
    showConfirmButton: false,
    //allowOutsideClick: false,
    background: "transparent"
  });
  document.querySelector("#vid").onended = function() {
    window.location.href = "http://www.google.com";
  };
}
