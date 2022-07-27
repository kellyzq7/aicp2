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
<style></style>
</head>
<body>
  <?php
    
  try {
    
    //character
    $inactiveCharacterID = (int) htmlspecialchars($_POST["inactiveCharacters"]);

    //backend validating inputs
    if(isset($inactiveCharacterID)){
      
      //select chosen character to alter celerity, charisma, and combat
      $sth = $dbh -> prepare("SELECT * FROM player_character WHERE id = :character_id");
      $sth -> bindValue(":character_id", $inactiveCharacterID);
      $sth -> execute();
      $chosenCharacter = $sth -> fetch();
      
      
      
      $_SESSION["is_admin"] = "true";
      echo "<br />You're good to go <a href = 'redirect.php'>back to the game!</a>";
      echo "<br /><a href = 'admin_page.php'>Back to admin page</a>";
      
    }else{
      echo "<p>Error: you filled out the form incorrectly! Go <a href = 'admin_page.php'>back</a> and redo</p>";
    }
    
    

  }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }

  
  ?>
</body>
</html>
