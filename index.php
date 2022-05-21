<?php
error_reporting(0);
session_start();
if (isset($_SESSION['uname'])) header("Location: homepage.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
    Username: <input type="text" name="uname" required><br>
    Password: <input type="password" name="passwd" required><br>
    <input type="submit" value="login">
    </form>
</body>
</html>
