<?php
session_start();
require_once "sql_config.php";

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
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src = "cssandjs/admin.js"></script>
<link rel="stylesheet" href="cssandjs/admin_page.css">
</head>
<body>
  <?php

  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    //checking if current user is an admin
    $sth = $dbh -> prepare("SELECT * FROM user WHERE email = :email");
    $sth -> bindValue(":email", $_SESSION["email"]);
    $sth -> execute();
    $user = $sth -> fetch();

    //only display form if user is actually admin
    if($user["isAdmin"] == 1){

      $sth = $dbh -> prepare("SELECT player_character.id, player_character.character_name FROM player_character JOIN user ON user.id = player_character.user_id
      WHERE isActive = TRUE");
      $sth -> execute();
      $activeCharacters = $sth -> fetchAll();

        //choose to edit character stats
      echo "<div id = 'container'>";
        echo "<div id = 'character' class = 'show'>";
          echo "<p>CHOOSE A CHARACTER TO EDIT: </p>";
          echo "<form action = 'admin_handler.php' method = 'post'>";
          echo "<select name = 'characters'>";
          foreach($activeCharacters as $character){
              echo "<option name = '{$character['character_name']}' value = '{$character['id']}' required>
              {$character['character_name']}</option>";
          }
          echo "</select>";
          echo "<br /><br /><input class = 'important' id = 'chooseCharacter' type = 'button' value = 'Choose Character' /><br />";
        echo "</div>";
        echo "<div id = 'stats' class = 'hide'>";
          echo "<p>EDIT STATS</p>";
          echo "<p>New name: <input type = 'text' name='renameTo' minlength = '1' maxlength = '16' placeholder = 'Enter New Name...' required></p>";
          echo "<label for= 'class'>Change class to:</label>
          <select name='class'>
          <option value='charger' required>Charger</option>
          <option value='charmer' required>Charmer</option>
          <option value='crasher' required>Crasher</option>
          </select>";
          echo "<br />";
          echo "<p>Alter points: -3 to 3, 0 for no change</p>";
          echo "<p>Alter celerity by: <input type = 'number' name='alterCelerity' min = '-3' max = '3' required /></p>";
          echo "<p>Alter charisma by: <input type = 'number' name='alterCharisma' min = '-3' max = '3' required /></p>";
          echo "<p>Alter combat by: <input type = 'number' name='alterCombat' min = '-3' max = '3' required /></p>";
          echo "<label for= 'position'>Change game position to:</label>
          <select name='position'>
          <option value='1' required>1: Introduction</option>
          <option value='2' required>2: Dodge Encounter</option>
          <option value='3' required>3: Decision: Romance or Combat</option>
          <option value='4' required>4: Romance Encounter</option>
          <option value='5' required>5: Combat Encounter</option>
          <option value='6' required>6: Decision Towns (post romance encounter)</option>
          <option value='7' required>7: Decision Towns (post combat encounter)</option>
          <option value='8' required>8: Good News</option>
          <option value='9' required>9: Combat Encounter 2</option>
          <option value='10' required>10: Dodge Encounter 2</option>
          <option value='11' required>11: Town 1</option>
          <option value='12' required>12: Town 2</option>
          <option value='13' required>13: NPC 1</option>
          <option value='14' required>14: NPC 3</option>
          <option value='15' required>15: NPC 2</option>
          <option value='16' required>16: NPC 4</option>
          <option value='17' required>17: Final Decision (post NPC 2)</option>
          <option value='18' required>18: Final Decision (post NPC 4)</option>
          </select>";
          echo "<br /><br /><input class = 'important' type = 'submit' name = 'submitEdits' value = 'Submit Changes' required />";
        echo "</div>";
        echo "</form>";
        echo "<br /><hr /><br />";
        //choose to delete inactive characters
        $sth2 = $dbh -> prepare("SELECT player_character.id, player_character.character_name FROM player_character JOIN user ON user.id = player_character.user_id
        WHERE isActive = FALSE");
        $sth2 -> execute();
        $inactiveCharacters = $sth2 -> fetchAll();
        echo "<div id = 'delete'>";
          echo "<p>CHOOSE AN INACTIVE CHARACTER TO DELETE: </p>";
          echo "<form action = 'admin_handler_delete.php' method = 'post'>";
          echo "<select name = 'inactiveCharacters'>";
          foreach($inactiveCharacters as $inactive){

              echo "<option name = '{$inactive['character_name']}' value = '{$inactive['id']}' required />
              {$inactive['character_name']}</option>";
          }
          echo "</select>";
          echo "<br /><br /><input class = 'important' type = 'submit' value = 'Permanately Delete'>";
          echo "</form>";
          echo "<br /><br /><a href = 'redirect.php'>Back</a>";
          echo "<br /><br /><a href='logout.php'><input type = 'button' value = 'Save and Log Out' /></a>";
        echo "</div>";
      echo "</div>";

    } else { //if user isn't admin don't display admin powers
      echo "<p>You are not actually admin are you?</p>";
      echo "<br /><br /><a href = 'redirect.php'>Back</a>";
    }



  }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }


  ?>


</body>
</html>
