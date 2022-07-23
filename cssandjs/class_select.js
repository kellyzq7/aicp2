$(document).ready(() => {

  $("#charger").hover(() => {
      $("#charger").attr("src", "img/charger_hover_crop.png");
      $("#charmer").attr("src", "img/charmer_class_crop.png");
      $("#crasher").attr("src", "img/crasher_class_crop.png");
  });

  $("#charmer").hover(() => {
      $("#charmer").attr("src", "img/charmer_hover_crop.png");
      $("#charger").attr("src", "img/charger_class_crop.png");
      $("#crasher").attr("src", "img/crasher_class_crop.png");
    });

  $("#crasher").hover(() => {
      $("#crasher").attr("src", "img/crasher_hover_crop.png");
      $("#charmer").attr("src", "img/charmer_class_crop.png");
      $("#charger").attr("src", "img/charger_class_crop.png");
    });

});
