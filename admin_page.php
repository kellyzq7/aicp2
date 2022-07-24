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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script></script>
<style></style>
</head>
<body>
  <?php
    
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh -> prepare("SELECT * FROM player_character JOIN user ON owner.id = player_character.user_id");
    $sth -> execute();
    $allCharacters = $sth -> fetchAll();
    echo "<p>CHOOSE A CHARACTER TO EDIT: </p>";
    echo "<form action = 'admin_edits_handler.php' method = 'post'>";
    echo "<select name = 'characters'>";
    foreach($allCharacters as $character){
        echo "<option name = '{$character['character_name']}' value = '{$character['id']}' required>
        {$character['character_name']} ({$character['email']})</option>";
    }
    echo "</select>";
    echo "<br />";  
    echo "<p>EDIT STATS</p>";
    echo "<p>New name: <input type = 'text' name='renameTo' minlength = '1' maxlength = '16' placeholder = 'Enter New Name...' required></p>";
    echo "<label for= 'class'>Change class to:</label>
    <select name='class'>
    <option value='Charger' required>Charger</option>
    <option value='Charmer' required>Charmer</option>
    <option value='Crasher' required>Crasher</option>
    </select>";
    echo "<br />";
    echo "<p>Alter HP points: -3 to 3, 0 for no change</p>";
    echo "<p>Alter celerity by: <input type = 'number' name='alterCelerity' min = '-3' max = '3' required></p>";
    echo "<p>Alter charisma by: <input type = 'number' name='alterCharisma' min = '-3' max = '3' required></p>";
    echo "<p>Alter combat by: <input type = 'number' name='alterCombat' min = '-3' max = '3' required></p>";
    echo "<input type = 'submit' name = 'submitEdits' value = 'Submit Changes' required />";
    echo "</form>";
    
    echo "<br /><a href = 'redirect.php'>Back</a>";
    

  }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }

  
  ?>
</body>
</html>
