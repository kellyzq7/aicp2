$(document).ready(() => {

let gracePeriod = setTimeout(encounterBegin, 5000);

function encounterBegin() {
  $("#warning_text").addClass("hidden");
  $("#bandit1").removeClass("hidden");
  $("#timer").removeClass("hidden");
  timerUpdate = setInterval(timer, 1000); //set an interval to run the timer function every second begging after grace period
}

let timerUpdate;

$(".bandit").click((event) => {
  if ($(event.target).hasClass("3click")) {
      $(event.target).removeClass("3click");
      $(event.target).addClass("hard");       //if 3click target is clicked remove 3click and set to two click class
    }
    else if ($(event.target).hasClass("hard")) {
      $(event.target).removeClass("hard");      //if hard target is clicked remove hard thus requring two clicks to move on
    }
    else {                                      //when a bandit is clicked hide it and reveal the next bandit
      $(event.target).addClass("hidden");
      $(event.target).next().removeClass("hidden");
    }

  });

$("#bandit25").click((event) => {
  $(".stats").removeClass("hidden");
  $(".onward").removeClass("hidden");
  //if last bandit is clicked clear and hide timer
  clearTimeout(timerUpdate);
  $("#timer").addClass("hidden");
  });

let timerLength = "undefined"; //set timer length to be redifned based on encounter difficulty

//set timer to different link based on diffiuclty of encounter
if ($(".encounter_check").hasClass("easy")) {
    timerLength = 26;
  }
else if ($(".encounter_check").hasClass("medium")) {
    timerLength = 24;
}
else {
    timerLength = 22;
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
