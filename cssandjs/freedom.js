$(document).ready(() => {

let timer = setTimeout(displayFinal, 11000); 

//after 11 seconds display final message
function displayFinal() {
  $(".create").removeClass("hidden");
  $("#final").removeClass("hidden");
  $("#cowboy").addClass("hidden");
}

});
