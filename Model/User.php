<?php
    require_once 'BaseModel.php';
    class User extends BaseModel{
        public $tableName = 'users';
        public $columns = ['id', 'phonenumber','password'];
    }
?>