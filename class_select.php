<!doctype html>
<html lang="en">
<head>
<title>Cul Cavboj</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="cssandjs/home.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="cssandjs/class_select.js"></script>
<style>

a, .character_class {
  margin:0 3%;
  padding:0;
  display:inline;
  height:80vh;
}
body {
  width:100vw;
  height:100vh;
  padding:0;
  margin:0;
  background-color:#F5D3B8;
  display:flex;
  justify-content:space-evenly;
  align-items:center;
  flex-direction:column;
}
#class_select_header {
  font-family:brotherland;
  font-size:4vmax;
  margin:2% 0;
  color:#430804;
}
#class_select_flex_box {
  display:flex;
  justify-content:space-evenly;
  align-items:center;
}
</style>
</head>
<body>

<div>
<h1 id="class_select_header">Select A class</h1>
</div>

<div id="class_select_flex_box">
<a href="charger.php">
<img src="img/charger_class_crop.png" alt="The Charger Class: A master of the chase, begins the Game with +2 celerity points." id="charger" class="character_class" />
</a>


<a href="charmer.php">
<img src="img/charmer_class_crop.png" alt="The Charmer Class: A master of romance, begins the Game with +2 charisma points." id="charmer" class="character_class" />
</a>

<a href="crasher.php">
<img src="img/crasher_class_crop.png" alt="The Crasher Class: A master gunslinger, begins the Game with +2 combat points." id="crasher" class="character_class" />
</a>
</div>
</body>
</html>
