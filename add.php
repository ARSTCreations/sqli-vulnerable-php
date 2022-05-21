<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {header("Location: /");echo "forbidden";}
include 'db.php';
$uname=$_POST["uname"];
$email=$_POST["email"];
$passwd=password_hash($_POST["passwd"], PASSWORD_DEFAULT);
$sql = "INSERT INTO users(uname,email,passwd) VALUES('$uname','$email','$passwd')";
if ($conn->query($sql) === TRUE) {
    echo "record created!";
    header('Refresh: 1; URL=homepage.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header('Refresh: 1; URL=homepage.php');
}
  $conn->close();
?>