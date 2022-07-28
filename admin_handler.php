<?php
session_start();
require_once "sql_config.php";
$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);


//redirect to login.php if not logged in
if (!isset($_SESSION["email"]) && !isset($_SESSION["player_id"])){//check if user is logged in
  header('Location: login.php'); //if user isn't signed in send to login
}

?>
<!doctype html>
<html lang="en">
<head>
<title>Cul Cavboj</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script></script>
<link rel="stylesheet" href="cssandjs/admin_handlers.css">
</head>
<body>
  <?php
    
  try {
    
    //character
    $characterID = (int) htmlspecialchars($_POST["characters"]);
    
    //new name
    $newName = htmlspecialchars($_POST["renameTo"]);
    
    //new class and the array to check later
    $newClass = htmlspecialchars($_POST["class"]);
    $classList = array("charger", "charmer", "crasher");
        
    //new hp
    $alterCelerity = (int) htmlspecialchars($_POST["alterCelerity"]);
    $alterCharisma = (int) htmlspecialchars($_POST["alterCharisma"]);
    $alterCombat = (int) htmlspecialchars($_POST["alterCombat"]);
    
    //change position and array to check later
    $newPosition = (int) htmlspecialchars($_POST["position"]);

    //backend validating inputs
    if(isset($newName) && strlen($newName) >= 1 && strlen($newName) <= 16
    && isset($newClass) && in_array($newClass, $classList)
    && isset($newPosition) && $newPosition >= 1 && $newPosition <= 18
    && isset($alterCelerity) && $alterCelerity > -4 && $alterCelerity < 4
    && isset($alterCharisma) && $alterCharisma > -4 && $alterCharisma < 4
    && isset($alterCombat) && $alterCombat > -4 && $alterCombat < 4){
      
      //set new name
      $sth2 = $dbh -> prepare("UPDATE player_character SET character_name = :new_name
        WHERE id =:character_id");
      $sth2 -> bindValue(":new_name", $newName);
      $sth2 -> bindValue(":character_id", $characterID);
      $sth2 -> execute();
      echo "<p>New name set successfully</p>";
      
      //set new class
      $sth3 = $dbh -> prepare("UPDATE player_character SET class = :new_class
        WHERE id =:character_id");
      $sth3 -> bindValue(":new_class", $newClass);
      $sth3 -> bindValue(":character_id", $characterID);
      $sth3 -> execute();
      echo "<p>New class set successfully</p>";
      
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
      echo "<p>Updated celerity points successfully</p>";
      
      //update charisma
      $sth6 = $dbh -> prepare("UPDATE player_character SET charisma = :new_charisma
        WHERE id =:character_id");
      $sth6 -> bindValue(":new_charisma", $newCharisma);
      $sth6 -> bindValue(":character_id", $characterID);
      $sth6 -> execute();
      echo "<p>Updated charisma points successfully</p>";
      
      //update combat
      $sth7 = $dbh -> prepare("UPDATE player_character SET combat = :new_combat
        WHERE id =:character_id");
      $sth7 -> bindValue(":new_combat", $newCombat);
      $sth7 -> bindValue(":character_id", $characterID);
      $sth7 -> execute();
      echo "<p>Updated combat points successfully</p>";
      
      //set new position
      $sth8 = $dbh -> prepare("UPDATE player_character SET position = :new_pos
        WHERE id =:character_id");
      $sth8 -> bindValue(":new_pos", $newPosition);
      $sth8 -> bindValue(":character_id", $characterID);
      $sth8 -> execute();
      echo "<p>Updated new position successfully</p>";
      
      $_SESSION["is_admin"] = "true";
      echo "<br /><p>You're good to go <a href = 'redirect.php'>back to the game</a> or 
      <a href = 'admin_page.php'>back to admin page!</a></p>";
      
    }else{
      echo "<p>Error: you filled out the form incorrectly! Go <a href = 'admin_page.php'>back</a> and redo</p>";
    }
    
    

  }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }

  
  ?>
</body>
</html>
