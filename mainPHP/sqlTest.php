<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL TEST</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="load">Load Bang</button><br>
    </form>
    <hr>
    <?php
        if(isset($_POST['load'])){
            $conn=mysqli_connect("localhost","root","","testdb");
            if(!$conn){
                die("Ket noi that bai".mysqli_connect_error());
            }
            $sql = "SELECT * FROM `sinhvien` WHERE 1;";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)> 0){
                echo "Danh sach hoc sinh:<br>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "Ho ten: ".$row["HoTen"]." - Ngay sinh: ".$row["NgaySinh"]."<br>";
                }
            }else{
                echo "Khong co record nao";
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html></html>