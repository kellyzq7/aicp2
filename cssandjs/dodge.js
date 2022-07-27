$(document).ready(() => {

let gracePeriod = setTimeout(encounterBegin, 4000);

function encounterBegin() {
  $("#warning_text").addClass("hidden");
  $(".bullet").removeClass("hidden");
}

$(".bullet").hover((event) => {
    location.replace("failed_encounter.php"); //if bullet is touched send to death page
  });

function moveOn() {
  $(".onward").removeClass("hidden");
  $(".bullet").addClass("hidden");
  $(".stats").removeClass("hidden");
  $("#center").append($(".stats"));
}

if ($("body").hasClass("fast")) {
  let success = setTimeout(moveOn, 32000); //if fast/easy encounter is echoed, it will finish in 28 seconds
}
else {
  let success = setTimeout(moveOn, 35000);// else the hard encounter finishes in 30 seconds
}
});
