<?php
if(isset($_SESSION['submit'])){
    header('location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    </head>
<body>
    <center>
        <h1>Selamat Datang!</h1>
        <h4>Silahkan keluar <span><a href="logout.php">log out</a></span></h4>
    </center>
</body>
</html>
