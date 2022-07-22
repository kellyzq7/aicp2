<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Romance Encounter</title>
    <link rel="stylesheet" href="romanceEncounter.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="romanceEncounter.js"></script>
</head>
<body>

</body>
</html>
<?php

session_start();

require_once "config2.php";

try{
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

  $sth = $dbh->prepare("SELECT charisma FROM user WHERE email=:user_email");
      $sth->bindValue(':user_email', $_SESSION["email"]);
      $sth->execute();
      $charisma = $sth->fetch();

      echo "<p>James Jessie: Well, lookie here. Tell me, traveller, why I shouldn't end yer life right here, right now.</p>";
      echo "<br>";
//add js classes to hide responses then show later
// add js to click on options

$charisma = 2;

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
}

catch (PDOException $error){
  echo "<p>Can't connect to database</p>";
  echo "<p>" . $error->getMessage() . "</p>";
}

 ?>
