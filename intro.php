<?php
session_start();
require_once "sql_config.php";

//update their the data base with the user's character name and position
if (isset($_SESSION["email"])) {//check if user is logged in
try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh->prepare("UPDATE user SET `position`=1 WHERE email=:login_email");
  $sth->bindValue(':login_email', $_SESSION["email"]);
  $sth->execute();
  }
catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }
  if(isset($_POST["char_name"])) { //check if came from character naming page
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
      $sth = $dbh->prepare("UPDATE user SET `character_name` =:char_name WHERE email=:login_email");
      $sth->bindValue(':login_email', $_SESSION["email"]);
      $sth->bindValue(':char_name', htmlspecialchars($_POST["char_name"]));
      $sth->execute();
      }
    catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
                }
  }
          }
else {
  header('Location: login.php'); //if user isn't signed in send to login
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Introduction</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="intro.css">
    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
    <script src = "intro.js"></script>
  </head>
  <body>
    <div id = "first">
      <?php
      try { //fetch user row to get class
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $sth = $dbh->prepare("SELECT * FROM user WHERE email=:login_email");
        $sth->bindValue(':login_email', $_SESSION["email"]);
        $sth->execute();
        $user_row = $sth->fetch();
        }
      catch (PDOException $e) {
        echo "<p>Error: {$e->getMessage()}</p>";
                  }

      echo "<h1> Welcome Cul Cavboj " . htmlspecialchars($_POST["char_name"]) . "</h1>";

      echo "<h2>We see that you have chosen the " . $user_row["class"] . " class. Excellet choice. You are about to encounter one of the most challenging journeys in the wild west. It will test your physical and emotional capability as a fellow cavboj. Are you ready?</h2>";

      ?>
      <br />
      <div class = "center">
        <input type = "button" id = "ready" name = "ready" value = "Yes" />
      </div>
    </div>

    <div id = "second" class = "hide">
      <h2>Great! There are 3 paths that you might find yourself on in this journey.</h2>
      <div id = "objectives">
        <h2 id = "romance">Romance: <br /> show off your charismatic flair to find true love </h2>
        <h2 id = "combat">Combat: <br /> fight your way through rivals to meet your match and prove your worth </h2>
        <h2 id = "speed">Speed: <br /> dodge and outrun obstacles to be able to live with the freedom of roaming freely </h2>
      </div>
      <div class = "center">
        <input type = "button" id = "sweet" name = "ready" value = "Sweet!" />
      </div>
    </div>

    <div id = "third" class = "hide">
      <h2>Wait! What's that thing far yonder? It looks like it's getting closer...
      Are those bullets??</h2>
      <div class = "center">
        <a href = "../../../bfeinberg/projects/P2_RPG/combat.php"><input type = "button" id = "squint" name = "squint" value = "Take a closer look" /></a>
      </div>
    </div>
  </body>
<html>


