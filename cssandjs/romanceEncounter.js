$(document).ready(() => {

    $("#fail").click(() => {
      $(".death").toggleClass();
    })

    $("#okay").click(() => {
      $(".response1").toggleClass();
    })

    $("#good").click(() => {
      $(".response2").toggleClass();
    })

    $("#great").click(() => {
      $("#response3").toggle();
    })
});
