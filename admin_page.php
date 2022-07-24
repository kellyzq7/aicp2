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
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh -> prepare("SELECT * FROM player_character JOIN user ON owner.id = player_character.user_id");
    $sth -> execute();
    $allCharacters = $sth -> fetchAll();
    echo "<p>Choose a character to edit: </p>";
    echo "<form action = '.php' method = 'post'>";
    echo "<select name = 'characters'>";
    foreach($allCharacters as $character){
        echo "<option name = '{$character['character_name']}' value = '{$character['id']}' required>
        {$character['character_name']} ({$character['email']})</option>";
    }
    echo "</select>";
    echo "<br /><br />";
    echo "<input type = 'submit' value = 'Choose' />";
    echo "</form>";
    echo "<a href = 'redirect.php'>Back</a>";
    

  }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }

  
  ?>
</body>
</html>
