<?php
    require_once 'Model/Product.php';
    class ProductController{
        public function product() {
            $products = Product::all();
            include "privilege.php";
        }

        public function index() {
            $products = Product::all();
            include "index.php";
        }
    }
?>