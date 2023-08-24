<?php
    // Gọi tập tin User.php để sử dụng lớp User
    require_once 'Model/User.php';
    // Khai báo lớp HomeController để quản lý tương tác với người dùng
    class HomeController{
        // Phương thức hiển thị danh sách tất cả người dùng
        public function user() {
            // Gọi phương thức lấy tất cả người dùng của lớp User
            // Kết quả sẽ được lưu vào biến $users
            $users = User::all();
        }
    }
?>