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

@font-face {
  font-family: Gin;
  src: url("fonts/gin.otf");
}

h1 {
  font-family:brotherland;
  color:#430804;
  font-size:72px;
}
body {
  font-family:Gin;
  display:flex;
  justify-content:center;
  align-items:center;
  flex-direction:column;
  background-color:#F5D3B8;
}

a {
  font-family:Gin;
  color:#D8513D;
  text-align:center;
  display: block;
  margin:30px;
  font-size:36px;
}

input, label {
  margin-bottom:1.4vmax;
  padding:6px;
  color:#2A2B2A;
  font-size:36px;
}

input {
  font-family:sans-serif;
}

label {
  font-family:Gin;
}

form {
display:flex;
align-items:center;
flex-direction:column;
}
</style>
</head>
<body>
<h1> Register an Account </h1>
<form action="login.php" method="POST">

<div>
<label for="email"> Email: </label>
<input required type="email" name="email" id="email">
</div>

<div>
<label for="password"> Password: </label>
<input required type="password" name="password" id="password">
</div>

<input type="submit" value="Create Account">
</form>
</body>
</html>
