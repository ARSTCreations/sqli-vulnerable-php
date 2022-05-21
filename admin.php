<?php
include 'db.php';
error_reporting(0);
session_start();
if (!isset($_SESSION['uname'])) header("Location: index.php");
if ($_SESSION['uname']!='admin') header("Location: homepage.php");
echo "Welcome " . $_SESSION['uname'] . "!"; 
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
    <form action="logout.php"><input type="submit" value="Log Out"></form>
    <style>table,td,tr,th{border:1px solid black}</style>
    <table>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Reg Date</th>
        <th>Action</th>
    </tr>
    <?php
        $sql = "SELECT uname, email, passwd, reg_date FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) while($row = $result->fetch_assoc()) {
            if ($row['uname']!='admin')echo "<tr>\n<td>".$row["uname"]."</td>\n<td>".$row["email"]."</td>\n<td>".$row["reg_date"]."</td>\n<td> <form action='delete.php' method='post'> <input type='hidden' name='uname' value=".$row["uname"]." method='post'><input type='submit' value='Remove'> </form></td>\n</tr>";
            else echo "<tr>\n<td>".$row["uname"]."</td>\n<td>".$row["email"]."</td>\n<td>".$row["reg_date"]."</td>\n<td><input type='submit' value='Nah Bro' disabled></td>\n</tr>";
        }
    ?>
    </table>
    <form action="add.php" method="post">
        Username: <input type="text" name="uname" required><br>
        E-Mail: <input type="text" name="email" required><br>
        Password: <input type="password" name="passwd" required><br>
        <input type="submit"  value='Add User'>
    </form>
</body>
</html>