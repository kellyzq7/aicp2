<?php
    session_start();
    if(!isset($_SESSION["email"])){
        echo "header";
        header("Location: login.php");
    }
 ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Cul Cavboj</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="combat.css" rel="stylesheet" type="text/css" />
    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
    <script src = "combat.js"></script>
  </head>
  <body>
    <?php
  session_start();
  require_once "sql_config.php";
    if(!isset($_SESSION["email"])){
     echo "header";
     header("Location: login.php");
   }

    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
      $sth = $dbh->prepare("UPDATE user SET `position`=2 WHERE email=:login_email");
      $sth->bindValue(':login_email', $_SESSION["email"]);
      $sth->execute();
      }
    catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
                }
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $email = $_SESSION["email"];

        $sth = $dbh -> prepare("SELECT combat FROM user WHERE email = :email");
        $sth -> bindvalue(":email", $email);
        $sth -> execute();
        $combatPoints = $sth -> fetch();

        if($combatPoints == 2){
          echo "<input id = 'big' type = 'button' value = 'FIGHT!' />";
          echo "<h2 class = 'hide'>Congrats! You won the combat! As a reward, you get 2 combat points!</h2>";
          echo "<a class = 'hide' href = 'decision_towns.php'>Onward!</a>";

        } else {
          echo "<input id = 'small' type = 'button' value = 'FIGHT!' />";
          echo "<h2 class = 'hide'>Congrats! You won the combat! As a reward, you get 2 combat points!</h2>";
          echo "<a class = 'hide' href = 'decision_towns.php'>Onward!</a>";
        }


    } catch (PDOException $e) {
        echo "<p>Error: {$e->getMessage()}</p>";
    }


    ?>
  </body>
<html>

