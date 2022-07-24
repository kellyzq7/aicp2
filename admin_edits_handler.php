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
    
    //new name
    $newName = htmlspecialchars($_POST["renameTo"]);
    
    //new class and the array to check later
    $newClass = htmlspecialchars($_POST["class"]);
    $classList = array("Charger", "Charmer", "Crasher");
    
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
      
      
      
    }else{
      echo "<p>Error: you filled out the form incorrect</p>";
    }
    
    

  }catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
  }

  
  ?>
</body>
</html>
