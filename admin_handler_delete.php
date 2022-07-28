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
    $inactiveCharacterID = (int) htmlspecialchars($_POST["inactiveCharacters"]);

    //backend validating inputs
    if(isset($inactiveCharacterID)){
      
      //select chosen character to alter celerity, charisma, and combat
      $sth = $dbh -> prepare("SELECT * FROM player_character WHERE id = :inactive_id");
      $sth -> bindValue(":inactive_id", $inactiveCharacterID);
      $sth -> execute();
      $chosenCharacter = $sth -> fetch();
      
      $sth2 = $dbh -> prepare("DELETE FROM player_character WHERE id =:inactive_id");
      $sth2 -> bindValue(":inactive_id", $inactiveCharacterID);
      $sth2 -> execute();
      echo "<p>Chosen inactive player deleted successfully</p>";
      
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
