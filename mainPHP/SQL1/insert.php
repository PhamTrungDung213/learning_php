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
        if($id== ''||$ht==''|| $ns== ''|| $sdt== ''){
            echo "<script>alert('Vui lòng nhập đủ dữ liệu!');</script>";
        }else{
            $conn = mysqli_connect("localhost", "root", "", "phptest");
            if (!$conn) { die("Kết nối thất bại: " . mysqli_connect_error()); }
            mysqli_set_charset($conn, 'utf8');

            $sql = "INSERT INTO $table_name (id, ht, ns, sdt) VALUES ('$id', '$ht', '$ns', '$sdt')";
        
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('Thêm thành công!');</script>";
                header("Location: sqlCRUD.php?load=1");
            } else {
                echo "Lỗi insert: " . mysqli_error($conn);
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
    <title>Insert</title>
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
    <h2>Insert vào bảng sinhvien:</h2>
    <hr>
    <form id="InForm" method="post">
    <p>ID: <input type="text" name="id" placeholder="Student id"></p>
    <p>Họ Tên: <input type="text" name="ht" placeholder="Student name"></p>
    <p>Ngày sinh: <input type="date" name="ns" placeholder="Student birth"></p>
    <p>SDT: <input type="number" name="sdt" placeholder="Student phone number"></p>
    <hr>
        <button type="submit" name="conf">Confirm</button>
        <button type="submit" name="exit">Exit</button>
    </form>
</body>
</html></html>