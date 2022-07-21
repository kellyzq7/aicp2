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
    <title>Decision: Romance VS Combat</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="decision_romancevcombat.css">
  </head>
  <body>
    <h1>Decision: Romance or Combat</h1>
      <div id = "container">
        <div id = "romance">
            <img src = "img/romance.png" alt = "romance" />
            <a href = "romanceEncounter.php"><input type = "button" id = "ready" name = "ready" value = "Choose" /></a>
        </div>
        
        <div id = "combat">
            <img src = "img/combat.png" alt = "combat" />
            <a href = "combat1.php"><input type = "button" id = "ready" name = "ready" value = "Choose" /></a>
        </div>
      </div>
  </body>
<html>
