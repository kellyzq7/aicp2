<?php
session_start();
require_once "sql_config.php";

if (isset($_SESSION["email"])) { // checks player is logged in
  if ($_SESSION["characer_inactive"] = true) { //if player came from failed encounter and needs a new character, create new character
    //fetch user id of logged in user
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("SELECT * FROM user WHERE email=:login_email");//find row of user where email matches session email
    $sth->bindValue(':login_email', $_SESSION["email"]);
    $sth->execute();
    $user_row = $sth->fetch();
    $user_id = $user_row["id"]; //store user's id

    //create character associated with user id
    $sth_create = $dbh->prepare("INSERT INTO player_character (`user_id`, `position`, `isActive`)
    VALUES (:log_user_id, 0, true);"); //create character associated with account, and set defualt position to 0, and set to active.
    $sth_create->bindValue(':log_user_id', $user_id);
    $sth_create->execute();

    //get id of new active character and store it in session
    $sth_location = $dbh->prepare("SELECT * FROM player_character
    JOIN user
    ON user.id = player_character.user_id
    WHERE
    user.id =:log_user_id
    AND
    player_character.isActive = TRUE;");
    $sth_location->bindValue(':log_user_id', $user_id);
    $sth_location->execute();
    $player = $sth_location->fetch(); //player now has the row of the charcter associated with the logged in account, which is currently the user's active character
    $_SESSION["player_id"] = $player["id"];//store the player charcter id in session for easy access to update its position on later pages.
  }
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
