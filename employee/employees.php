<?php
// Kết nối đến cơ sở dữ liệu
require_once("config/db.class.php");

// Hàm lấy danh sách nhân viên từ cơ sở dữ liệu
function getEmployees($start, $limit) {
    global $db;
    $sql = "SELECT n.*, p.Ten_Phong
            FROM nhanvien n
            JOIN phongban p ON n.Ma_Phong = p.Ma_Phong
            LIMIT $start, $limit";
    return $db->select_to_array($sql);
}

// Hàm lấy tổng số lượng nhân viên từ cơ sở dữ liệu
function getTotalEmployees() {
    global $db;
    $sql = "SELECT COUNT(*) AS total FROM nhanvien";
    $result = $db->select_to_array($sql);
    return $result[0]['total'];
}

// Xác định trang hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$employees_per_page = 5;
$total_employees = getTotalEmployees();
$total_pages = ceil($total_employees / $employees_per_page);
$start_index = ($current_page - 1) * $employees_per_page;

// Lấy danh sách nhân viên cho trang hiện tại
$employees = getEmployees($start_index, $employees_per_page);
?>
