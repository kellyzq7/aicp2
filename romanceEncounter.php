<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Romance Encounter</title>
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

      if ($charisma<1){
        echo "<p>I'm too young to die! Please spare me!</p>";
        // echo "<p>James Jessie: Nice try. That's not gonna stop me.</p>";
        // echo "<h1>You died!</h1>";
      }
      elseif ($charisma==1){
        echo "<p>I'm too beautiful to be killed! Don't ya agree?</p>";
      }
      elseif ($charisma==2){
        echo "<p>If you killed me now, then how would I take you out for dinner tonight?</p>";
      }
      else{
        echo "<p>idk what to write here</p>"
      }
}

catch (PDOException $error){
  echo "<p>Can't connect to database</p>";
  echo "<p>" . $error->getMessage() . "</p>";
}

 ?>
