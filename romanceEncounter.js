$(document).ready(() => {

    $("#fail").click(() => {
      $(".death").toggleClass();
    })

    $("#okay").click(() => {
      $("#response1").toggle();
    })

    $("#good").click(() => {
      $("#response2").toggle();
    })

    $("#great").click(() => {
      $("#response3").toggle();
    })
});
