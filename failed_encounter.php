<?php
session_start();
require_once "sql_config.php";
$_SESSION["character_status"] = "inactive";//set a variable that can be checked in class_select.php to see if a new character needs to be created
//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 22, `isActive` = false
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
    <link href="cssandjs/new_character.css" rel="stylesheet" type="text/css" />
  </head>
  <body>

<div id="container">
  <h3>  Dang Cowboy, You Died! </h3> <h4> But that's ok you can always...</h4><a href = 'class_select.php'><input type = 'button' value = 'Create a New Cowboy' /></a>
  <br />
</div>


  </body>
</html>
