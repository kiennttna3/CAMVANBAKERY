<?php
    $url = isset($_GET['url']) == true ? $_GET['url'] :"/";
    require_once 'Controller/HomeController.php';
    require_once 'Controller/ProcessController.php';
    require_once 'Controller/ProductController.php';
    switch($url) {

        case 'login':
            $ctr = new ProcessController();
            $ctr->login();
        break;

        case 'product':
            $ctr = new ProductController();
            $ctr->product();
        break;

        case 'index':
            $ctr = new ProductController();
            $ctr->index();
        break;

        case 'register':
            $ctr = new ProcessController();
            $ctr->register();
        break;

        case 'createProduct':
            $ctr = new ProcessController();
            $ctr->createProduct();
        break;

        case 'save-register':
            $ctr = new ProcessController();
            $ctr->saveRegister();
        break;

        case 'save-product':
            $ctr = new ProcessController();
            $ctr->saveProduct();
        break;

        case 'update-product':
            $ctr = new ProcessController();
            $ctr->updateProduct();
        break;

        case 'save-update-product':
            $ctr = new ProcessController();
            $ctr->saveUpdateProduct();
        break;

        case 'btn-reload-product':
            $ctr = new ProcessController();
            $ctr->btnreloadProduct();
        break;

        case 'deleteProduct':
            $ctr = new ProcessController();
            $ctr->deleteProduct();
        break;
    }
?>