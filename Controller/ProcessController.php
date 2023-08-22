<?php
    session_start();
    class ProcessController {
        public $model;
        public function __construct() {
            $this->model = new BaseModel(); // Adjust this line based on your actual model class
        }
        public function login() { 
            include_once 'login.php';
            if (isset($_POST['buttonlogin'])) {
                $phonenumber = $_POST['phonenumber'];
                $password = $_POST['password'];
                $dem1 = $this->model->dembanghi($phonenumber, $password);
                $data2 = $this->model->kiemtradangnhap($phonenumber, $password);
                if ($dem1 == 0) {
                    echo "Đăng nhập thất bại";
                } else {
                    $_SESSION['phonenumber'] = $phonenumber;
                    $_SESSION['id'] = $data2[0]['id'];
                    header('Location:index');
                    exit();
                }
            }
        }

        public function register() {
            include_once 'register.php';
        }

        public function createProduct() {
            include_once 'createProduct.php';
        }

        public function saveRegister() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['phonenumber'], $_POST['password'], $_POST['confirm_password'])) {
                $phonenumber = $_POST['phonenumber'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                
                if ($phonenumber === "" || $password === "" || $confirm_password === "") {
                    header("Location:register");
                } elseif ($password !== $confirm_password) {
                    header("Location:register");
                } else {
                    if ($this->model->kiemtratontai($phonenumber)) {
                        header("Location:register");
                    } else {
                        $user = new User();
                        $user->phonenumber = $phonenumber;
                        $user->password = $password;
                        $user->insert();
                        header("Location:login");
                        exit();
                    }
                }
            } else {
                header("Location:register");
                exit();
            }
        }

        public function saveProduct() {
            $productname = $_POST['productname'];
            $image = $_FILES['productimage'];
            $productprice = $_POST['productprice'];

            $product = new Product();
            $product->productname = $productname;
			$fileName = "";
			if ($image ['size'] > 0) {
				$fileName = 'assets/img/'.time().'_'.$image['name'];
				move_uploaded_file($image['tmp_name'], $fileName);
			}
            $product->productimage = $fileName;
            $product->productprice = $productprice;
            $product->insert();
            header("location:product");
        }

        public function updateProduct() {
            $id = $_GET['id'];
            $product = Product::find($id);
            if ($product == null) {
                header("location:product");
            }
            include "editProduct.php";
        }

        public function saveUpdateProduct() {
            $id = $_POST['id'];
            $productname = $_POST['productname'];
            $image = $_FILES['productimage'];
            $productprice = $_POST['productprice'];

            $product = Product::find($id);
            $product->productname = $productname;
			$fileName = "";
			if ($image ['size'] > 0) {
				$fileName = 'assets/img/'.time().'_'.$image['name'];
				move_uploaded_file($image['tmp_name'], $fileName);
			}
            $product->productimage = $fileName;
            $product->productprice = $productprice;
            $product->update();
            header("location:product");
        }

        public function btnreloadProduct() {
            header("location:product");
        }

        public function deleteProduct() {
            $id = $_GET['id'];
            $product = Product::find($id);
            if ($product) {
                $product->delete('GET',[]);
            }
            header("location:product");
        }
    }
?>