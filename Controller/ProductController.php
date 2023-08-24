<?php
    // Gọi tập tin Product.php để sử dụng lớp Product
    require_once 'Model/Product.php';
    // Khai báo lớp ProductController để quản lý tương tác với sản phẩm
    class ProductController{
        // Phương thức xử lý hiển thị sản phẩm và tìm kiếm
        public function product() {
            // Lấy thông tin từ biểu mẫu tìm kiếm, nếu không tồn tại thì để chuỗi rỗng
            // Xử lý tìm kiếm theo tên sản phẩm
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
            // Kiểm tra xem có giá trị tìm kiếm không rỗng
            if (!empty($searchTerm)) {
                // Gọi phương thức tìm kiếm theo tên sản phẩm của lớp Product
                $products = Product::searchByName($searchTerm);
            // Nếu không có giá trị tìm kiếm
            } else {
                // Gọi phương thức lấy tất cả sản phẩm của lớp Product
                $products = Product::all();
            }
            // Hiển thị trang quản lý sản phẩm với danh sách sản phẩm đã tìm kiếm hoặc toàn bộ sản phẩm
            include "privilege.php";
        }
        // Phương thức hiển thị danh sách tất cả sản phẩm
        public function index() {
            // Gọi phương thức lấy tất cả sản phẩm của lớp Product
            $products = Product::all();
            // Hiển thị trang danh sách tất cả sản phẩm
            include "index.php";
        }
    }
?>