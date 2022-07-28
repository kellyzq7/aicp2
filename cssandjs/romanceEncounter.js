$(document).ready(() => {

//when an option is selected reveal the proceeding dialouge
    $("#first_option").click((event) => {
      $(".option").addClass("hidden"); //hide options
      $(event.target).removeClass("hidden"); //unhide selected option
      $(".response").removeClass("hidden");
      let deathPeriod = setTimeout(death, 4000);  //send player to death page after given time to read
    })

    $("#second_option").click((event) => {
      $(".option").addClass("hidden"); //hide options
      $(event.target).removeClass("hidden"); //unhide selected option
      $(".response1").removeClass("hidden");
      let deathPeriod = setTimeout(death, 4000); //send player to death page after given time to read
    })

    $("#third_option").click((event) => {
      $(".option").addClass("hidden"); //hide options
      $(event.target).removeClass("hidden"); //unhide selected option
      $(".response2").removeClass("hidden");
      $(".stats").removeClass("hidden"); //display stats gained from encounter
    })

    $("#fourth_option").click((event) => {
      $(".option").addClass("hidden"); //hide options
      $(event.target).removeClass("hidden"); //unhide selected option
      $(".response3").removeClass("hidden");
      $(".stats").removeClass("hidden"); //display stats gained from encounter
    })

    function death() {
      location.replace("failed_encounter.php");
    }
});
