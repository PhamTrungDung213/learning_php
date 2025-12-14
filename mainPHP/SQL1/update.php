<?php
    session_start();
    if(!$_SESSION["tenbang"]){
        header("Location: sqlCRUD.php");
        exit();
    }

    //them:
    if(isset($_POST["conf"])){
        $table_name=$_SESSION["tenbang"];
        $id  = $_POST['id'];
        $ht  = $_POST['ht'];
        $ns  = $_POST['ns'];
        $sdt = $_POST['sdt'];
        if($id== ''&&($ht==''|| $ns== ''|| $sdt== '')){
            echo "<script>alert('Vui lòng nhập ID và dữ liệu muốn sửa!');</script>";
        }else{
            $conn = mysqli_connect("localhost", "root", "", "phptest");
            if (!$conn) { die("Kết nối thất bại: " . mysqli_connect_error()); }
            mysqli_set_charset($conn, 'utf8');

            $sql = "UPDATE $table_name SET ht='$ht', ns='$ns', sdt='$sdt' WHERE id=$id";
        
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('Cập nhật thành công!');</script>";
                header("Location: sqlCRUD.php?load=1");
            } else {
                echo "Lỗi update: " . mysqli_error($conn);
            }

            Mysqli_close($conn);
        }
    }

    if(isset($_POST["exit"])){
        header("Location: sqlCRUD.php?load=1");
        exit();
    }
?>

<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style>
        body {
            background-color: #1a1a1a; /* Màu đen */
            color: #ffffff;            /* Màu chữ trắng */
            font-family: Arial, sans-serif;
        }
        h2{font-weight: bold; font-family: 'Times New Roman', Times, serif;}
    </style>
</head>
<body>
    <h2>Update vào bảng sinhvien:</h2>
    <hr>
    <form id="InForm" method="post">
    <p>ID muốn cập nhật: <input type="text" name="id" placeholder="Student id"></p><hr>
    <p>Họ Tên: <input type="text" name="ht" placeholder="Student name"></p>
    <p>Ngày sinh: <input type="date" name="ns" placeholder="Student birth"></p>
    <p>SDT: <input type="number" name="sdt" placeholder="Student phone number"></p>
    <hr>
        <button type="submit" name="conf">Confirm</button>
        <button type="submit" name="exit">Exit</button>
    </form>
</body>
</html></html>