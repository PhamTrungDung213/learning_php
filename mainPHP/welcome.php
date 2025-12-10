<?php
    session_start();
    if(!isset($_SESSION["username"])){
       header("Location: login.php");
       exit();
    }
?>

<htmL><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Xin chao, <?php echo $_SESSION["username"]; ?>!</h2>
    <p>Chao mung ban da dang nhap.</p>
    <a href="logout.php">DANG XUAT</a>
</body>
</html></htmL>