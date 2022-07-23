$(document).ready(() => {

    $("#ready").click(() => {
      $("#first").toggle();
      $("#second").toggle();

      $("#sweet").click(() => {
        $("#second").toggle();
        $("#third").toggle();
      })
    
    })
});