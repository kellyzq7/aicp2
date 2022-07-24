<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table Dropper</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <?php
      require_once "sql_config.php";
      // PDO handaling documentaion https://www.php.net/manual/en/function.file-get-contents.php https://www.php.net/manual/en/pdo.exec.php
      try {
     $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
     //drop tables
     $query = file_get_contents('drop.sql');
     $dbh->exec($query);
     echo "<p>Tables Dropped</p>";
 }
     catch (PDOException $e) {
     echo "<p>Error: {$e->getMessage()}</p>";
        }


      ?>
  </body>
</html>
