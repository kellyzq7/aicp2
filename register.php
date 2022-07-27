<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<title>Cul Cavboj</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script></script>
<link rel = "stylesheet" href = "cssandjs/login.css">
</head>
<body>
<h1> Register an Account </h1>
<form action="login.php" method="POST">
<label for="email"> Email: </label>
<input required type="email" name="email" id="email">
<br />
<label for="password"> Password: </label>
<input required type="password" name="password" id="password">
<br />
<input type="submit" value="Create Account">
</form>
</body>
</html>
