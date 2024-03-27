<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Nhân Viên</title>
    <style>
        /* CSS styling */
    </style>
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
        require_once("employee/employees.php"); // Sử dụng file employee.php để lấy danh sách nhân viên
        if ($employees) { // Kiểm tra xem có dữ liệu nhân viên không
            foreach ($employees as $employee): 
        ?>
            <tr>
                <td><?php echo $employee['Ma_NV']; ?></td>
                <td><?php echo $employee['Ten_NV']; ?></td>
                <td>
                    <?php if ($employee['Phai'] === 'NU'): ?>
                        <img src="woman.jpg" alt="Woman" width="50" height="50">
                    <?php else: ?>
                        <img src="man.jpg" alt="Man" width="50" height="50">
                    <?php endif; ?>
                </td>
                <td><?php echo $employee['Noi_Sinh']; ?></td>
                <td><?php echo $employee['Ten_Phong']; ?></td>
                <td><?php echo $employee['Luong']; ?></td>
            </tr>
        <?php 
            endforeach; 
        } else {
            echo "<tr><td colspan='6'>Không có nhân viên để hiển thị.</td></tr>";
        }
        ?>
    </table>

    <!-- Phân trang -->
    <div>
        <?php if ($total_pages > 1): ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
        <?php endif; ?>
    </div>
</body>
</html>
