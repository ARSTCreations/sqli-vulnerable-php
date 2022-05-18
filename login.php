<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas_web";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$uname = $_POST["uname"];
$passwd = $_POST["passwd"];

$sql = "SELECT uname, passwd FROM users WHERE uname='$uname'";
$result = $conn->query($sql);

session_start();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // echo $row["passwd"];
    if ($row["passwd"] == $passwd){
        echo "Login Success!";
        $_SESSION['uname'] = $row['uname'];
        header('Refresh: 3; URL=homepage.php');
    }
    else{
        echo "wrong passwd!";
        header('Refresh: 3; URL=index.php');
    }
} else {
    echo "Wrong Credential";
    header('Refresh: 3; URL=index.php');
}
?>