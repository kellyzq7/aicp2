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
    $characterID = htmlspecialchars($_POST["characters"]);
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh -> prepare("SELECT * FROM player_character WHERE id =:character_id");
    $sth -> bindValue(":character_id", $characterID);
    $sth -> execute();
    $chosenCharacter = $sth -> fetch();
    
    echo "<p>EDIT STATS</p>";
    echo "<form action = 'admin_edits_handler.php method = 'post'>";
    echo "<p>New name: <input type = 'text' name='renameTo' minlength = '1' maxlength = '16' placeholder = 'Enter New Name...' ></text><br /><br />";
    echo "<label for= 'class'>Change class to:</label>
    <select name='class'>
    <option value='charger'>Charger</option>
    <option value='charmer'>Charmer</option>
    <option value='crasher'>Crasher</option>
    </select>";

  
    echo "</form>";

  }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }

  
  ?>
</body>
</html>
