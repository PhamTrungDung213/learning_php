<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
       $_SESSION["username"]=$_POST["username"];
       header("Location: welcome.php");
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
    <h2>Login</h2>
    <form method="post" action="">
        <label>Nhap ten cua ban:</label><br>
        <input type="text" name="username" required><br>
        <button type="submit">DANG NHAP</button>
    </form>
</body>
</html></htmL>