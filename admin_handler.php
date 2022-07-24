<?php
session_start();
require_once "sql_config.php";

//redirect to login.php if not logged in
// if (!isset($_SESSION["email"]) && !isset($_SESSION["player_id"])){//check if user is logged in
//   header('Location: login.php'); //if user isn't signed in send to login
// }

?>
<!doctype html>
<html lang="en">
<head>
<title>Cul Cavboj</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script></script>
<style></style>
</head>
<body>
  <?php
  
  try {
    
    //character
    $characterID = htmlspecialchars($_POST["characters"]);
    // if(isset($characterID)){
    //   $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    //   $sth = $dbh -> prepare("SELECT * FROM player_character WHERE id =:character_id");
    //   $sth -> bindValue(":character_id", $characterID);
    //   $sth -> execute();
    //   $chosenCharacter = $sth -> fetch();
    // }
    
    //new name
    $newName = htmlspecialchars($_POST["renameTo"]);
    
    //new class and the array to check later
    $newClass = htmlspecialchars($_POST["class"]);
    $classList = array("charger", "charmer", "crasher");
    
    //new hp
    $alterCelerity = htmlspecialchars($_POST["alterCelerity"]);
    $alterCharisma = htmlspecialchars($_POST["alterCharisma"]);
    $alterCombat = htmlspecialchars($_POST["alterCombat"]);
    
    //backend validating inputs
    if(isset($newName) && strlen($newName) >= 1 && strlen($newName) <= 16
    && isset($newClass) && in_array($newClass, $classList)
    && isset($alterCelerity) && filter_var($alterCelerity, FILTER_VALIDATE_INT) && $alterCelerity >= -3 && $alterCelerity <= 3
    && isset($alterCharisma) && filter_var($alterCharisma, FILTER_VALIDATE_INT) && $alterCharisma >= -3 && $alterCharisma <= 3
    && isset($alterCombat) && filter_var($alterCombat, FILTER_VALIDATE_INT) && $alterCombat >= -3 && $alterCombat <= 3){
      
      //set new name
      $sth2 = $dbh -> prepare("UPDATE player_character SET character_name = :new_name
        WHERE id =:character_id");
      $sth2 -> bindValue(":new_name", $newName);
      $sth2 -> bindValue(":character_id", $characterID);
      $sth2 -> execute();
      
      //set new class
      $sth3 = $dbh -> prepare("UPDATE player_character SET class = :new_class
        WHERE id =:character_id");
      $sth3 -> bindValue(":new_class", $newClass);
      $sth3 -> bindValue(":character_id", $characterID);
      $sth3 -> execute();
      
      //select chosen character to alter celerity, charisma, and combat
      $sth4 = $dbh -> prepare("SELECT * FROM player_character WHERE id = :character_id");
      $sth4 -> bindValue(":character_id", $characterID);
      $sth4 -> execute();
      $chosenCharacter = $sth4 -> fetch();
      
      //get new celerity, charisma, and combat
      $newCelerity = $chosenCharacter["celerity"] + $alterCelerity;
      $newCharisma = $chosenCharacter["charisma"] + $alterCharisma;
      $newCombat = $chosenCharacter["combat"] + $alterCombat;
      
      //update celerity
      $sth5 = $dbh -> prepare("UPDATE player_character SET celerity = :new_celerity
        WHERE id =:character_id");
      $sth5 -> bindValue(":new_celerity", $newCelerity);
      $sth5 -> bindValue(":character_id", $characterID);
      $sth5 -> execute();
      
      //update charisma
      $sth5 = $dbh -> prepare("UPDATE player_character SET charisma = :new_charisma
        WHERE id =:character_id");
      $sth5 -> bindValue(":new_charisma", $newCharisma);
      $sth5 -> bindValue(":character_id", $characterID);
      $sth5 -> execute();
      
      //update combat
      $sth5 = $dbh -> prepare("UPDATE player_character SET combat = :new_combat
        WHERE id =:character_id");
      $sth5 -> bindValue(":new_combat", $newCombat);
      $sth5 -> bindValue(":character_id", $characterID);
      $sth5 -> execute();
      
    }else{
      echo "<p>Error: you filled out the form incorrectly! Go <a href = 'admin_handler.php'>back</a> and redo</p>";
    }
    
    

  }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }

  
  ?>
</body>
</html>
