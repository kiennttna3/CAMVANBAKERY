<?php
    session_start();
    class ProcessController {
        public $model;
        // Khai báo biến $model để lưu trữ một đối tượng của lớp BaseModel
        // Đối tượng này sẽ được sử dụng để thực hiện các phương thức và truy vấn vào cơ sở dữ liệu
        public function __construct() {
            // Trong hàm khởi tạo của lớp hiện tại
            // Tạo một đối tượng mới của lớp BaseModel và gán vào biến $model
            $this->model = new BaseModel(); // Adjust this line based on your actual model class
        }
        // Phương thức xử lý quá trình đăng nhập
        public function login() { 
            // Include tập tin login.php để sử dụng biểu mẫu đăng nhập
            include_once 'View/login.php';
            // Kiểm tra xem nút đăng nhập đã được nhấn hay chưa
            if (isset($_POST['buttonlogin'])) {
                // Lấy số điện thoại từ dữ liệu POST
                $phonenumber = $_POST['phonenumber'];
                // Lấy mật khẩu từ dữ liệu POST
                $password = $_POST['password'];
                // Gọi phương thức dembanghi từ đối tượng $model để kiểm tra số lượng bản ghi phù hợp với số điện thoại và mật khẩu
                $dem1 = $this->model->dembanghi($phonenumber, $password);
                // Gọi phương thức kiemtradangnhap từ đối tượng $model để kiểm tra việc đăng nhập
                $data2 = $this->model->kiemtradangnhap($phonenumber, $password);
                // Nếu không tìm thấy bản ghi phù hợp
                if ($dem1 == 0) {
                    echo "Đăng nhập thất bại";
                    // Nếu có bản ghi phù hợp
                } else {
                    // Lưu thông tin phiên đăng nhập và chuyển hướng về trang index
                    $_SESSION['phonenumber'] = $phonenumber;
                    $_SESSION['id'] = $data2[0]['id'];
                    // Chuyển hướng đến trang index
                    header('Location:index');
                    // Dừng thực thi mã sau khi chuyển hướng
                    exit();
                }
            }
        }
        // Phương thức hiển thị trang đăng ký
        public function register() {
            include_once 'View/register.php';
        }
        // Phương thức hiển thị trang tạo sản phẩm
        public function createProduct() {
            include_once 'View/createProduct.php';
        }
        // Phương thức xử lý lưu thông tin đăng ký
        public function saveRegister() {
            // Kiểm tra xem phương thức của yêu cầu là POST và tồn tại dữ liệu từ biểu mẫu
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['phonenumber'], $_POST['password'], $_POST['confirm_password'])) {
                // Lấy số điện thoại từ dữ liệu POST
                $phonenumber = $_POST['phonenumber'];
                // Lấy mật khẩu từ dữ liệu POST
                $password = $_POST['password'];
                // Lấy xác nhận mật khẩu từ dữ liệu POST
                $confirm_password = $_POST['confirm_password'];
                // Kiểm tra xem các trường dữ liệu có bị để trống không
                if ($phonenumber === "" || $password === "" || $confirm_password === "") {
                    header("Location:register");
                // Kiểm tra xem mật khẩu và xác nhận mật khẩu có khớp nhau không
                } elseif ($password !== $confirm_password) {
                    header("Location:register");
                } else {
                    // Kiểm tra xem số điện thoại đã tồn tại trong cơ sở dữ liệu chưa
                    if ($this->model->kiemtratontai($phonenumber)) {
                        header("Location:register");
                    // Nếu số điện thoại chưa tồn tại trong cơ sở dữ liệu
                    } else {
                        // Tạo một đối tượng User mới
                        $user = new User();
                        // Gán số điện thoại
                        $user->phonenumber = $phonenumber;
                        // Gán mật khẩu
                        $user->password = $password;
                        // Thực hiện chèn bản ghi User mới vào cơ sở dữ liệu
                        $user->insert();
                        // Chuyển hướng đến trang đăng nhập
                        header("Location:login");
                        // Dừng thực thi mã sau khi chuyển hướng
                        exit();
                    }
                }
            // Nếu không có dữ liệu từ biểu mẫu POST
            } else {
                // Chuyển hướng đến trang đăng ký
                header("Location:register");
                // Dừng thực thi mã sau khi chuyển hướng
                exit();
            }
        }
        // Phương thức xử lý lưu thông tin sản phẩm mới
        public function saveProduct() {
            // Lấy tên sản phẩm từ dữ liệu POST
            $name = $_POST['name'];
            // Lấy thông tin về hình ảnh sản phẩm từ dữ liệu FILES
            $image = $_FILES['imageUrl'];
            // Lấy giá sản phẩm từ dữ liệu POST
            $price = $_POST['price'];
            // Tạo một đối tượng Product mới
            $product = new Product();
            // Gán tên sản phẩm
            $product->name = $name;
            // Khởi tạo biến lưu trữ tên tập tin hình ảnh
			$fileName = "";
            // Kiểm tra xem có tải lên hình ảnh hay không
			if ($image ['size'] > 0) {
                // Xây dựng tên tập tin hình ảnh
				$fileName = 'assets/img/'.time().'_'.$image['name'];
                // Di chuyển tập tin tải lên vào thư mục hình ảnh
				move_uploaded_file($image['tmp_name'], $fileName);
			}
            // Gán đường dẫn hình ảnh cho sản phẩm
            $product->imageUrl = $fileName;
            // Gán giá cho sản phẩm
            $product->price = $price;
            // Thực hiện chèn bản ghi Product mới vào cơ sở dữ liệu
            $product->insert();
            // Chuyển hướng đến trang danh sách sản phẩm
            header("location:product");
        }
        // Phương thức hiển thị trang chỉnh sửa thông tin sản phẩm
        public function updateProduct() {
            // Lấy ID sản phẩm từ dữ liệu GET
            $id = $_GET['id'];
            // Tìm sản phẩm dựa trên ID
            $product = Product::find($id);
            // Nếu không tìm thấy sản phẩm có ID tương ứng
            if ($product == null) {
                // Chuyển hướng đến trang danh sách sản phẩm
                header("location:product");
            }
            // Hiển thị trang chỉnh sửa thông tin sản phẩm
            include "View/editProduct.php";
        }
        // Phương thức xử lý lưu thông tin cập nhật sản phẩm
        public function saveUpdateProduct() {
            // Lấy ID sản phẩm từ dữ liệu POST
            $id = $_POST['id'];
            // Lấy tên sản phẩm từ dữ liệu POST
            $name = $_POST['name'];
            // Lấy thông tin về hình ảnh sản phẩm từ dữ liệu FILES
            $image = $_FILES['imageUrl'];
            // Lấy giá sản phẩm từ dữ liệu POST
            $price = $_POST['price'];
            // Tìm sản phẩm dựa trên ID
            $product = Product::find($id);
            // Gán tên sản phẩm
            $product->name = $name;
            // Khởi tạo biến lưu trữ tên tập tin hình ảnh
			$fileName = "";
            // Kiểm tra xem có tải lên hình ảnh hay không
			if ($image ['size'] > 0) {
                // Xây dựng tên tập tin hình ảnh
				$fileName = 'assets/img/'.time().'_'.$image['name'];
                // Di chuyển tập tin tải lên vào thư mục hình ảnh
				move_uploaded_file($image['tmp_name'], $fileName);
			}
            // Gán đường dẫn hình ảnh cho sản phẩm
            $product->imageUrl = $fileName;
            // Gán giá cho sản phẩm
            $product->price = $price;
            // Thực hiện cập nhật thông tin sản phẩm vào cơ sở dữ liệu
            $product->update();
            // Chuyển hướng đến trang danh sách sản phẩm
            header("location:product");
        }
        // Phương thức xử lý chức năng nạp lại trang danh sách sản phẩm
        public function btnreloadProduct() {
            // Chuyển hướng đến trang danh sách sản phẩm
            header("location:product");
        }
        // Phương thức xử lý xóa sản phẩm
        public function deleteProduct() {
            // Lấy ID sản phẩm từ dữ liệu GET
            $id = $_GET['id'];
            // Tìm sản phẩm dựa trên ID
            $product = Product::find($id);
            // Nếu tìm thấy sản phẩm
            if ($product) {
                // Thực hiện xóa sản phẩm
                $product->delete('GET',[]);
            }
            // Chuyển hướng đến trang danh sách sản phẩm
            header("location:product");
        }
    }
?>