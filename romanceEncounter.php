<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 4
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Romance Encounter</title>
    <link rel="stylesheet" href="cssandjs/romanceEncounter.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="cssandjs/romanceEncounter.js"></script>
</head>
<body>
<?php

try{
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

  $sth2 = $dbh->prepare("SELECT charisma FROM player_character WHERE id =:player_id");
  $sth2->bindValue(':player_id', $_SESSION["player_id"]);
  $sth2->execute();
  $charisma = $sth2->fetch();

      echo "<p>James Jessie: Well, lookie here. Tell me, traveller, why I shouldn't end yer life right here, right now.</p>";
      echo "<br>";
//add js classes to hide responses then show later
// add js to click on options

//example

// question
echo "<p id='fail'>I'm too young to die! Please spare me!</p>";
// response
echo "<p class='death'>James Jessie: Nice try. That's not gonna stop me.</p>";
echo "<h1 class='death'>You died!</h1>";

if ($charisma > 0){
    echo "<p id='okay'>I'm too beautiful to be killed! Don't ya agree?</p>";
    echo "<p id='response1'>James Jessie: Cue epic response 1</p>";
      }
if ($charisma > 1){
    echo "<p id='good'>If you killed me now, then how would I take you out for dinner tonight?</p>";
    echo "<p id='response2'>James Jessie: Cue epic response 2</p>";
      }
if ($charisma > 2){
    echo "<p id='great'>idk what to write here</p>";
    echo "<p id='response3'>James Jessie: Cue epic response 3</p>";
      }

    echo "<p>Click<a href = 'decision_towns1.php'>here</a> to move on</p>";
}

catch (PDOException $error){
  echo "<p>Can't connect to database</p>";
  echo "<p>" . $error->getMessage() . "</p>";
}

 ?>
</body>
</html>
