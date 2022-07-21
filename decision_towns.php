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
    <link rel="stylesheet" href="decision_towns.css">
  </head>
  <body>
    <h1>Decision: Town 1 or Town 2</h1>
      <div id = "container">
        <div id = "chasetown1">
            <img src = "img/romance.png" alt = "romance" />
            <a href = "dodge.php"><input type = "button" id = "ready" name = "ready" value = "Choose Town 1" /></a>
        </div>
        
        <div id = "chasetown2">
            <img src = "img/combat.png" alt = "combat" />
            <a href = "dodge2.php"><input type = "button" id = "ready" name = "ready" value = "Choose Town 2" /></a>
        </div>
      </div>
  </body>
<html>
