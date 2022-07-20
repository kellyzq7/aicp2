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
    <h1>Decision</h1>
      <div id = "container">
        <div id = "romance">
          <div class = "center">
            <img src = "img/romance.png" alt = "romance" />
            <a href = ""><input type = "button" id = "ready" name = "ready" value = "Choose" /></a>
          </div>
        </div>
        
        <div id = "combat">
          <div class = "center">
            <img src = "img/combat.png" alt = "combat" />
            <a href = "combat.php"><input type = "button" id = "ready" name = "ready" value = "Choose" /></a>
          </div>
        </div>
      </div>
  </body>
<html>
