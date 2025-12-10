<?php
    if(isset($_GET['search'])){
        echo "Tu khoa: ".htmlspecialchars($_GET['search']);
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo "Ho ten: ".htmlspecialchars($_POST['fullname']);
    }
?>