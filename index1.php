<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Nhân Viên</title>
</head>
<body>
    <h2>THÔNG TIN NHÂN VIÊN</h2>
    <table>
        <tr>
            <th>Mã Nhân Viên</th>
            <th>Tên Nhân Viên</th>
            <th>Giới tính</th>
            <th>Nơi Sinh</th>
            <th>Tên Phòng</th>
            <th>Lương</th>
        </tr>
        <?php
        // Kết nối đến cơ sở dữ liệu
        require_once("config/db.class.php");

        // Query to retrieve employee data
        $sql = "SELECT n.*, p.Ten_Phong
                FROM NHANVIEN n
                JOIN PHONGBAN p ON n.Ma_Phong = p.Ma_Phong";
        $employees = $db->select_to_array($sql);

        // Display employee data
        foreach ($employees as $employee) {
            echo "<tr>";
            echo "<td>" . $employee['Ma_NV'] . "</td>";
            echo "<td>" . $employee['Ten_NV'] . "</td>";
            echo "<td>" . ($employee['Phai'] === 'NU' ? 'Nữ' : 'Nam') . "</td>";
            echo "<td>" . $employee['Noi_Sinh'] . "</td>";
            echo "<td>" . $employee['Ten_Phong'] . "</td>";
            echo "<td>" . $employee['Luong'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
