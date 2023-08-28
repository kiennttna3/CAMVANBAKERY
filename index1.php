<?php
    $url = isset($_GET['url']) == true ? $_GET['url'] :"/";
    require_once 'Controller/HomeController.php';
    require_once 'Controller/ProcessController.php';
    require_once 'Controller/ProductController.php';
    switch($url) {
        //đăng nhập
        case 'login':
            $ctr = new ProcessController();
            $ctr->login();
        break;
        //xem sản phẩm
        case 'product':
            $ctr = new ProductController();
            $ctr->product();
        break;
        //trang chủ
        case 'index':
            $ctr = new ProductController();
            $ctr->index();
        break;
        //đăng ký
        case 'register':
            $ctr = new ProcessController();
            $ctr->register();
        break;
            //đăng ký người dùng
        case 'save-register':
            $ctr = new ProcessController();
            $ctr->saveRegister();
        break;
        //tạo sản phẩm
        case 'createProduct':
            $ctr = new ProcessController();
            $ctr->createProduct();
        break;
        //thêm sản phẩm
        case 'save-product':
            $ctr = new ProcessController();
            $ctr->saveProduct();
        break;
        //sửa sản phẩm
        case 'update-product':
            $ctr = new ProcessController();
            $ctr->updateProduct();
        break;
        //cập nhật sản phẩm
        case 'save-update-product':
            $ctr = new ProcessController();
            $ctr->saveUpdateProduct();
        break;
        //quay về xem sản phẩm
        case 'btn-reload-product':
            $ctr = new ProcessController();
            $ctr->btnreloadProduct();
        break;
        //xóa sản phẩm
        case 'deleteProduct':
            $ctr = new ProcessController();
            $ctr->deleteProduct();
        break;
    }
?>