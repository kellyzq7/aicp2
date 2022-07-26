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
<style>
@font-face {
  font-family: brotherland;
  src: url("fonts/Brotherlands.ttf");
}
h1 {
  font-size:64px;
}
body {
  font-family:sans-serif;
  display:flex;
  justify-content:center;
  align-items:center;
  flex-direction:column;
}

a {
  text-align:center;
  display: block;
  margin:20px;
  font-size:36px;
}
input {
  margin-right:20px;
}
form, input {
  font-size:36px;
}
</style>
</head>
<body>
<h1> Register an Account </h1>
<form action="login.php" method="POST">
<label for="email"> Email: </label>
<input required type="email" name="email" id="email">

<label for="password"> Password: </label>
<input required type="password" name="password" id="password">

<input type="submit" value="Create Account">
</form>
</body>
</html>
