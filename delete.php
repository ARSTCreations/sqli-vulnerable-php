<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {header("Location: /");echo "forbidden";}
include 'db.php';
$uname=$_POST["uname"];
$sql = "DELETE FROM users WHERE uname='$uname'";
if ($conn->query($sql) === TRUE) {
    echo "$uname deleted successfully";
    header('Refresh: 1; URL=homepage.php');
} else {
    echo "Error! " . $conn->error;
    header('Refresh: 1; URL=homepage.php');
}
$conn->close();
?>