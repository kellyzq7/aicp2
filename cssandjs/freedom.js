$(document).ready(() => {

let timer = setTimeout(displayFinal, 11000);

function displayFinal() {
  $(".create").removeClass("hidden");
  $("#final").removeClass("hidden");
  $("#cowboy").addClass("hidden");
}

});
