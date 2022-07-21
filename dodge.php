<?php
session_start();
require_once "sql_config.php";

   if(!isset($_SESSION["email"])){//check if user is logged in
       echo "header";
       header("Location: login.php");
   }

try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh->prepare("UPDATE user SET `position`=6 WHERE email=:login_email");
  $sth->bindValue(':login_email', $_SESSION["email"]);
  $sth->execute();
  }
catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }

?>
<!doctype html>
<html lang="en">
<head>
<title>Cul Cavboj</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="dodge.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="dodge.js"></script>
</head>

<?php

try {
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$email = $_SESSION["email"];
$sth = $dbh -> prepare("SELECT * FROM user WHERE email = :email");
$sth -> bindvalue(":email", $email);
$sth -> execute();
$user_row = $sth -> fetch();
}
catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }
if($user_row["class"] = "charger") {
  echo '<body class="fast">

  <iframe src="audio/silence.mp3" allow="autoplay" id="audio"></iframe>

  <audio autoplay>
    <source src="audio/main_theme.mp3" type="audio/mp3">
  </audio>

  <img class="projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />

  <img class="projectile_top_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet staggered" src="img/bullet.png" alt="bullet" />

  <img class="projectile_right_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet staggered" src="img/bullet.png" alt="bullet" />

  <img class="projectile_bottom_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet staggered" src="img/bullet.png" alt="bullet" />

  </body>';
}
else if ($user_row["celerity"] >= 2) {
  echo '<body class="slow">

  <iframe src="audio/silence.mp3" allow="autoplay" id="audio"></iframe>

  <audio autoplay>
    <source src="audio/main_theme.mp3" type="audio/mp3">
  </audio>

  <img class="projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_fast bullet staggered" src="img/bullet.png" alt="bullet" />

  <img class="projectile_top_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_fast bullet staggered" src="img/bullet.png" alt="bullet" />

  <img class="projectile_right_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_fast bullet staggered" src="img/bullet.png" alt="bullet" />

  <img class="projectile_bottom_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_fast bullet staggered" src="img/bullet.png" alt="bullet" />

  </body>';
}
else {
  echo '<body class="slow">

  <iframe src="audio/silence.mp3" allow="autoplay" id="audio"></iframe>

  <audio autoplay>
    <source src="audio/main_theme.mp3" type="audio/mp3">
  </audio>

  <img class="projectile_left_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_left_slow bullet staggered" src="img/bullet.png" alt="bullet" />

  <img class="projectile_top_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_top_slow bullet staggered" src="img/bullet.png" alt="bullet" />

  <img class="projectile_right_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_right_slow bullet staggered" src="img/bullet.png" alt="bullet" />

  <img class="projectile_bottom_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_slow bullet" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_slow bullet staggered" src="img/bullet.png" alt="bullet" />
  <img class="projectile_bottom_slow bullet staggered" src="img/bullet.png" alt="bullet" />

  <a href="town2.php"> Go to Town 2 </a>
  </body>';
}
?>
</html>

