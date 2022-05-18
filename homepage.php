<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tugas_web";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    error_reporting(0);
    session_start();
    if (!isset($_SESSION['uname'])) header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
<body>
    <form action="logout.php"><input type="submit"></form>
    <style>
        table,td,tr,th{
            border:1px solid black;
        }
    </style>
    <table>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Tanggal Daftar</th>
        <th>Aksi</th>
    </tr>
    <?php
        $sql = "SELECT uname, email, passwd, reg_date FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) while($row = $result->fetch_assoc()) echo "<tr>\n<td>".$row["uname"]."</td>\n<td>".$row["email"]."</td>\n<td>".$row["reg_date"]."</td>\n<td> <form action='delete.php' method='post'> <input type='hidden' name='uname' value=".$row["uname"]."><input type='submit'> </form></td>\n</tr>";
    ?>
    </table>
    <form action="add.php" method="post">
        Username: <input type="text" name="uname"><br>
        E-Mail: <input type="text" name="email"><br>
        Password: <input type="password" name="passwd"><br>
        <input type="submit">
    </form>
</body>
</html>