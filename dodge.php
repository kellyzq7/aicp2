<?php
session_start();
require_once "sql_config.php";

//update their the data base with the user's character name and position
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {//check if user is logged in
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`=2 WHERE id=:player_id");
    $sth->bindValue('player_id', $_SESSION["player_id"]);
    $sth->execute();
    }
  catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
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
<link href="cssandjs/dodge.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="cssandjs/dodge.js"></script>
</head>

<?php
try {
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$sth2 = $dbh -> prepare("SELECT * FROM player_character WHERE id=:player_id");
$sth2->bindValue('player_id', $_SESSION["player_id"]);
$sth2 -> execute();
$user_row = $sth2 -> fetch();
}
catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }
if($user_row["class"] == "charger" && $user_row["celerity"] <= 4) { //if character is speed class echo easier encounter with dif cursor sprite
  echo '<body class="fast">

  <iframe src="audio/silence.mp3" allow="autoplay" id="audio"></iframe>

  <audio autoplay>
    <source src="audio/main_theme.mp3" type="audio/mp3">
  </audio>

  <div id="flex">
  <div id="grid">

  <div id="left">
  <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="hidden fast projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="hidden fast projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  </div>

  <div id="top">
  <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_top_fast bullet" src="img/top_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_top_fast bullet" src="img/top_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_top_fast bullet" src="img/top_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
  </div>

  <div id="center">
  <a href="decision_romancevcombat.php" class="hidden onward"> Confront the Attackers </a>
  <h1 id="warning_text"> Move to the Center </h1>
  </div>

  <div id="right">
  <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_right_fast bullet" src="img/right_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_right_fast bullet" src="img/right_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
  </div>

  <div id="bottom">
  <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_bottom_fast bullet" src="img/bottom_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_bottom_fast bullet" src="img/bottom_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_bottom_fast bullet" src="img/bottom_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
  <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
  <div>

  </div>
  </div>
  </body>';
}
else if ($user_row["celerity"] >= 2 && $user_row["celerity"] <= 4) {//if character isn't speed class ebut has 2 celerity points echo easier encounter without speedy sprite
  echo '<body class="slow">

    <iframe src="audio/silence.mp3" allow="autoplay" id="audio"></iframe>

    <audio autoplay>
      <source src="audio/main_theme.mp3" type="audio/mp3">
    </audio>

    <div id="flex">
    <div id="grid">

    <div id="left">
    <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
    <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
    <img class="hidden fast projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
    <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
    <img class="hidden fast projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
    <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
    </div>

    <div id="top">
    <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
    </div>

    <div id="center">
    <a href="decision_romancevcombat.php" class="hidden onward"> Confront the Attackers </a>
    <h1 id="warning_text"> Move to the Center </h1>
    </div>

    <div id="right">
    <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_right_fast bullet" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_right_fast bullet" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
    </div>

    <div id="bottom">
    <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <div>

    </div>
    </div>
    </body>';
}
else if ($user_row["celerity"] >= 5) {//if character has 5+ celerity points echo super easy encounter
  echo '<body class="fast">

    <iframe src="audio/silence.mp3" allow="autoplay" id="audio"></iframe>

    <audio autoplay>
      <source src="audio/main_theme.mp3" type="audio/mp3">
    </audio>

    <div id="flex">
    <div id="grid">

    <div id="left">
    <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
    <img class="hidden fast projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
    <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
    <img class="hidden fast projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
    <img class="hidden fast projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
    </div>

    <div id="top">
    <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_top_fast bullet staggered" src="img/top_bullet.png" alt="bullet" />
    </div>

    <div id="center">
    <a href="decision_romancevcombat.php" class="hidden onward"> Confront the Attackers </a>
    <h1 id="warning_text"> Move to the Center </h1>
    </div>

    <div id="right">
    <img class="hidden fast projectile_right_fast bullet" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_right_fast bullet" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_right_fast bullet staggered" src="img/right_bullet.png" alt="bullet" />
    </div>

    <div id="bottom">
    <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden fast projectile_bottom_fast bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <div>

    </div>
    </div>
    </body>';
}
else {//else echo basically impossible encounter lmao
  echo '<body class="slow">

    <iframe src="audio/silence.mp3" allow="autoplay" id="audio"></iframe>

    <audio autoplay>
      <source src="audio/main_theme.mp3" type="audio/mp3">
    </audio>

    <div id="flex">
    <div id="grid">

    <div id="left">
    <img class="hidden projectile_left_slow bullet staggered" src="img/bullet.png" alt="bullet" />
    <img class="hidden projectile_left_slow bullet staggered" src="img/bullet.png" alt="bullet" />
    <img class="hidden projectile_left_slow bullet" src="img/bullet.png" alt="bullet" />
    <img class="hidden projectile_left_slow bullet staggered" src="img/bullet.png" alt="bullet" />
    <img class="hidden projectile_left_slow bullet" src="img/bullet.png" alt="bullet" />
    <img class="hidden projectile_left_slow bullet staggered" src="img/bullet.png" alt="bullet" />
    </div>

    <div id="top">
    <img class="hidden projectile_top_slow bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden projectile_top_slow bullet" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden projectile_top_slow bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden projectile_top_slow bullet" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden projectile_top_slow bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden projectile_top_slow bullet" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden projectile_top_slow bullet staggered" src="img/top_bullet.png" alt="bullet" />
    <img class="hidden projectile_top_slow bullet staggered" src="img/top_bullet.png" alt="bullet" />
    </div>

    <div id="center">
    <a href="decision_romancevcombat.php" class="hidden onward"> Confront the Attackers </a>
    <h1 id="warning_text"> Move to the Center </h1>
    </div>

    <div id="right">
    <img class="hidden projectile_right_slow bullet staggered" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden projectile_right_slow bullet" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden projectile_right_slow bullet staggered" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden projectile_right_slow bullet" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden projectile_right_slow bullet staggered" src="img/right_bullet.png" alt="bullet" />
    <img class="hidden projectile_right_slow bullet staggered" src="img/right_bullet.png" alt="bullet" />
    </div>

    <div id="bottom">
    <img class="hidden projectile_bottom_slow bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden projectile_bottom_slow bullet" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden projectile_bottom_slow bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden projectile_bottom_slow bullet" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden projectile_bottom_slow bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden projectile_bottom_slow bullet" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden projectile_bottom_slow bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <img class="hidden projectile_bottom_slow bullet staggered" src="img/bottom_bullet.png" alt="bullet" />
    <div>

    </div>
    </div>
    </body>';
}
?>
</html>
