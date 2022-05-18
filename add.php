<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas_web";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$uname=$_POST["uname"];
$email=$_POST["email"];
$passwd=$_POST["passwd"];
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