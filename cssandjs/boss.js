$(document).ready(() => {

let gracePeriod = setTimeout(encounterBegin, 5000);

function encounterBegin() {
  $("#warning_text").addClass("hidden");
  $("#boss").removeClass("hidden");
  $("#timer").removeClass("hidden");
  timerUpdate = setInterval(timer, 1000); //set an interval to run the timer function every second begging after grace period
}

let timerUpdate;
let numClicks = 0;
$("#boss").click((event) => {
  numClicks++;
  if (numClicks == 50) {
      $("#boss").addClass("hidden");
      $(".stats").removeClass("hidden");
      $(".onward").removeClass("hidden");
      clearTimeout(timerUpdate);
      $("#timer").addClass("hidden");
    }

  });

let timerLength = "undefined"; //set timer length to be redifned based on encounter difficulty

//set timer to different link based on diffiuclty of encounter
if ($(".encounter_check").hasClass("easy")) {
    timerLength = 30;
}
else if ($(".#encounter_check").hasClass("medium")) {
    timerLength = 25;
}
else {
    timerLength = 20;
}


function timer() {
  if (timerLength == 0) {
    clearTimeout(timerUpdate); //if timer reachs zero clear timer
    location.replace("failed_encounter.php"); //send to death page if encounter not cleared in time
  }
  else {
    $("#timer").html("Time Remaining: " + timerLength);  //display the remaining time in html
    timerLength--; //subtract 1 from the remaining time (will trigger every second)
  }
}

  });
