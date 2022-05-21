<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {header("Location: /");echo "forbidden";}
include 'db.php';
$uname = $_POST["uname"];
$passwd = $_POST["passwd"];
$sql = "SELECT uname, passwd FROM users WHERE uname='$uname'";
$result = $conn->query($sql);

session_start();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // echo $row["passwd"];
    if (password_verify($passwd, $row["passwd"])){
        echo "Login Success!";
        $_SESSION['uname'] = $row['uname'];
        header('Refresh: 1; URL=homepage.php');
    } else {
        echo "wrong passwd!";
        header('Refresh: 1; URL=index.php');
    }
} else {
    echo "Wrong Credential";
    header('Refresh: 1; URL=index.php');
}
?>