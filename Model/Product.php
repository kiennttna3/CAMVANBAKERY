<?php
    require_once 'BaseModel.php';
    class Product extends BaseModel{
        public $tableName = 'products';
        public $columns = ['id','productname','productimage','productprice'];
    }
?>