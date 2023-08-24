<?php
    // Gọi tập tin BaseModel.php để sử dụng lớp cơ sở
    require_once 'BaseModel.php';
    // Khai báo lớp Product kế thừa từ BaseModel
    class Product extends BaseModel{
        // Gán tên bảng cơ sở dữ liệu cho đối tượng Product
        public $tableName = 'products';
        // Gán danh sách cột dữ liệu của bảng
        public $columns = ['id','name','imageUrl','price'];
        // Định nghĩa phương thức tìm kiếm sản phẩm theo tên
        public function searchByName($name) {
            return $this->searchByName($name); // Gọi phương thức của BaseModel
        }
    }
?>