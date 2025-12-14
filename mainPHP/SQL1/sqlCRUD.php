<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "phptest");
    if (!$conn) { die("Kết nối thất bại: " . mysqli_connect_error()); }
    mysqli_set_charset($conn, 'utf8');

    $table_name="sinhvien";

    //xoa 1 dong:
    if (isset($_GET['delete_id'])) {
        $id_xoa = $_GET['delete_id'];
        
        $sql_xoa = "DELETE FROM $table_name WHERE `id` = $id_xoa";
        
        if (mysqli_query($conn, $sql_xoa)) {
            echo "<script>window.location.href='?load=1';</script>"; 
        } else {
            echo "Lỗi xóa: " . mysqli_error($conn);
        }
    }

    //chuyen trang insert:
    if(isset($_POST["ins"])) {
        $_SESSION["tenbang"] = $table_name;
        header("Location: insert.php");
    }

    //chuyen trang update:
    if(isset($_POST["up"])) {
        header("Location: update.php");
    }
?>
<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL CRUD</title>
    <style>
        body {
            background-color: #1a1a1a; /* Màu đen */
            color: #ffffff;            /* Màu chữ trắng */
            font-family: Arial, sans-serif;
        }
        table { border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #555;; padding: 5px; text-align: left; background-color: #333; }
        th { background-color: #000000ff; }
        .btn-delete { color: red; text-decoration: none; font-weight: bold; }
        button {margin-right: 10px;}
    </style>
</head>
<body>
    <form method="post">
        <button type="submit" name="load">@</button>
        <button type="submit" name="ins">Insert</button>
        <button type="submit" name="up">Update</button>
    </form>
    <hr>

    <?php
    //load bang:
    if (isset($_POST['load']) || isset($_GET['load'])) {
        
        $sql = "SELECT * FROM $table_name";
        try {
            // Cố gắng chạy lệnh này
            $result = mysqli_query($conn, $sql);
        } catch (Exception $e) {
            // Nếu lỗi (Exception), nó sẽ nhảy vào đây
            $result = false; 
        }
        if(!$result){
            echo "<p><span style='color:red;'>Không có bảng "." ".$table_name." !</p>";
        }else{
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<thead>
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>Ngày Sinh</th>
                        <th>Số điện thoại</th>
                        <th>Xóa dòng này ?</th>
                    </thead>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>"; 
                    echo "<td>" . $row['ht'] . "</td>";
                    echo "<td>" . $row['ns'] . "</td>";
                    echo "<td>" . $row['sdt'] . "</td>";
                    
                    // Cột nút Xóa: Gửi ID lên thanh địa chỉ (URL)
                    echo "<td>
                            <a class='btn-delete' href='?delete_id=" . $row['id'] . "' onclick='return confirm(\"Bạn chắc chắn muốn xóa?\")'>Xóa</a>
                        </td>";
                    echo "</tr>";
                    echo "</tbody>";
                }
                echo "</table>";
                
            } else {
                echo "<table>";
                echo "<thead>
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>Ngày Sinh</th>
                        <th>Số điện thoại</th>
                        <th>Xóa dòng này ?</th>
                    </thead>";
                    echo "<tbody>
                            <td colspan='4'>Không có dữ liệu<td>
                    </tbody>";
                echo "</table>";
            }
        }

    }

    mysqli_close($conn);
    ?>
</body>
</html></html>