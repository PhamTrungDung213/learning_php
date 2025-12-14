<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Sinh Viên</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn-delete { color: red; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

    <form method="post">
        <button type="submit" name="load">Load Bảng</button>
    </form>
    <hr>

    <?php
    // --- PHẦN 1: KẾT NỐI DATABASE ---
    // Chúng ta kết nối chung ở ngoài để dùng cho cả việc Xóa và Load
    $conn = mysqli_connect("localhost", "root", "", "testdb");
    if (!$conn) { die("Kết nối thất bại: " . mysqli_connect_error()); }
    mysqli_set_charset($conn, 'utf8');


    // --- PHẦN 2: XỬ LÝ XÓA (DELETE) ---
    // Kiểm tra trên thanh địa chỉ có chữ "delete_id" không
    if (isset($_GET['delete_id'])) {
        $id_xoa = $_GET['delete_id'];
        
        // Câu lệnh SQL xóa
        $sql_xoa = "DELETE FROM `sinhvien` WHERE `id` = $id_xoa";
        
        if (mysqli_query($conn, $sql_xoa)) {
            echo "<script>alert('Đã xóa thành công!'); window.location.href='?load=1';</script>"; 
            // Đoạn script trên giúp load lại trang sau khi xóa để cập nhật bảng
        } else {
            echo "Lỗi xóa: " . mysqli_error($conn);
        }
    }


    // --- PHẦN 3: XỬ LÝ HIỂN THỊ (LOAD) ---
    // Kiểm tra nút Load được bấm HOẶC vừa xóa xong (để bảng tự hiện lại)
    if (isset($_POST['load']) || isset($_GET['load'])) {
        
        $sql = "SELECT * FROM `sinhvien`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Mở thẻ bảng
            echo "<table>";
            echo "<tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Hành động</th>
                  </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                // Cột ID (Nếu bạn chưa có cột id trong database thì hãy thêm vào, hoặc thay bằng MSSV)
                echo "<td>" . $row['id'] . "</td>"; 
                echo "<td>" . $row['HoTen'] . "</td>";
                echo "<td>" . $row['NgaySinh'] . "</td>";
                
                // Cột nút Xóa: Gửi ID lên thanh địa chỉ (URL)
                echo "<td>
                        <a class='btn-delete' href='?delete_id=" . $row['id'] . "' onclick='return confirm(\"Bạn chắc chắn muốn xóa?\")'>Xóa</a>
                      </td>";
                echo "</tr>";
            }
            // Đóng thẻ bảng
            echo "</table>";
            
        } else {
            echo "Không có bản ghi nào.";
        }
    }

    // Đóng kết nối
    mysqli_close($conn);
    ?>

</body>
</html>