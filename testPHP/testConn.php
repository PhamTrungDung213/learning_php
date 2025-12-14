<?php
    $conn=mysqli_connect("localhost","root","","testdb");
    if(!$conn){
        die('Could not connect: '.mysqli_connect_error());
    }
    echo "Truy cap thanh cong";
    //code
    mysqli_close($conn);
?>