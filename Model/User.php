<?php
    // Gọi tập tin BaseModel.php để sử dụng lớp cơ sở
    require_once 'BaseModel.php';
    // Khai báo lớp User kế thừa từ BaseModel
    class User extends BaseModel{
        // Gán tên bảng cơ sở dữ liệu cho đối tượng User
        public $tableName = 'users';
        // Gán danh sách cột dữ liệu của bảng, bao gồm id, phonenumber và password
        public $columns = ['id', 'phonenumber','password'];
    }
?>