<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas_web";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$uname=$_POST["uname"];
$sql = "DELETE FROM users WHERE uname='$uname'";
if ($conn->query($sql) === TRUE) {
    echo "$uname deleted successfully";
    header('Refresh: 1; URL=homepage.php');
}
else {
    echo "Error! " . $conn->error;
    header('Refresh: 1; URL=homepage.php');
}
$conn->close();
?>