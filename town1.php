<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 11 
      WHERE id =:player_id");
    $sth->bindValue(':player_id', $_SESSION["player_id"]);
    $sth->execute();
    }
  catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";          
  }
}else {
    header('Location: login.php'); //if user isn't signed in send to login
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Cul Cavboj</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <style>
      @font-face {
        font-family: Brotherland;
        src: url(brotherland.ttf);
      }
      
      @font-face {
        font-family: Gin;
        src: url(carnival.otf);
      }
      
      body{
        background-image: url("https://consciouslab.files.wordpress.com/2016/05/forking-paths.jpg");
        background-size: cover;
      }
      
      h1{
        font-family: "Brotherland";
        font-size: 50px;
        text-align: center;
        background-color: #d49c68;
        padding: 2%;
        border: 6px solid black;
      }
    </style>
  </head>
  <body>
      <h1>Welcome to Vaquero Valley, click anywhere on image to walk</h1>
      <a href = 'npc1.php'>
      <img src = "https://storage.googleapis.com/production-hostgator-v1-0-8/148/412148/0mPbwXcy/18cdb98a2a044f2da36bba895d071701" height = 100% width = 100% alt = "Vaquero Valley" />
      </a>
    <a href="logout.php"><input type = 'button' value = 'Save and Log Out' /></a>
  </body>
</html>
  
  
