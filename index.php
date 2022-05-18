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
    Name: <input type="text" name="uname"><br>
    Password: <input type="password" name="passwd"><br>
    <input type="submit">
    </form>
</body>
<script>
    $(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("action performed successfully");
        });
    });
});
</script>
</html>
