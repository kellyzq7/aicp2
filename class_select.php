<?php
session_start();
require_once "sql_config.php";

if (isset($_SESSION["email"]) && isset($_SESSION["user_id"])) { // checks player is logged in
  if ($_SESSION["characer_status"] == "inactive") { //if player came from failed encounter and needs a new character, create new character

    //create character associated with user id
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth_create = $dbh->prepare("INSERT INTO player_character (user_id, position, isActive)
    VALUES (:user_id, 0, true);"); //create character associated with account, and set defualt position to 0, and set to active.
    $sth_create->bindValue(':user_id', $_SESSION["user_id"]);
    $sth_create->execute();

    //get id of new active character and store it in session
    $sth_location = $dbh->prepare("SELECT player_character.id as player_id FROM player_character
    JOIN user
    ON user.id = player_character.user_id
    WHERE
    user.id =:user_id
    AND
    player_character.isActive = true;");
    $sth_location->bindValue(':user_id', $_SESSION["user_id"]);
    $sth_location->execute();
    $new_character = $sth_location->fetch(); //player now has the row of the charcter associated with the logged in account, which is currently the user's active character
    $_SESSION["player_id"] = $new_character["player_id"];//store the new player charcter id in session for easy access to update its position on later pages.
    unset($_SESSION["characer_status"]); //unset this from session, as an active character has now been created
  }
}
else {
    header('Location: login.php'); //if user isn't signed in send to login
}
?>
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
