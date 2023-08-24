<?php
    class BaseModel
    {
        public $connect;
        // Constructor: Kết nối đến cơ sở dữ liệu khi khởi tạo đối tượng
        public function __construct() {
            $this->connect = new PDO("mysql:host=localhost;dbname=camvanbakeryshop;charset=utf8", 'root', '');
        }
        // Kiểm tra đăng nhập với số điện thoại và mật khẩu
        public function kiemtradangnhap($phonenumber, $password)
        {
            // Xây dựng câu truy vấn SQL để lấy thông tin người dùng với số điện thoại và mật khẩu tương ứng
            $sql = "select * from users where phonenumber = :phonenumber and password = :password";
            // Chuẩn bị câu truy vấn bằng cách sử dụng kết nối và câu truy vấn SQL
            $stmt = $this->connect->prepare($sql);
            // Gắn các giá trị tham số cho các tham số trong câu truy vấn
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':password', $password);
            // Thực thi câu truy vấn
            $stmt->execute();
            // Lấy tất cả các dòng dữ liệu kết quả và chuyển chúng thành mảng kết hợp
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Trả về dữ liệu kết quả (có thể là mảng chứa thông tin người dùng hoặc rỗng nếu không tìm thấy)
            return $data;
        }
        // Kiểm tra sự tồn tại của số điện thoại trong cơ sở dữ liệu
        public function kiemtratontai($phonenumber) {
            // Xây dựng câu truy vấn SQL để đếm số lượng bản ghi có số điện thoại tương ứng
            $sql = "select count(*) as count from users where phonenumber = :phonenumber";
            // Chuẩn bị câu truy vấn bằng cách sử dụng kết nối và câu truy vấn SQL
            $stmt = $this->connect->prepare($sql);
            // Gắn giá trị tham số cho tham số trong câu truy vấn
            $stmt->bindParam(':phonenumber', $phonenumber);
            // Thực thi câu truy vấn
            $stmt->execute();
            // Lấy kết quả đếm số lượng bản ghi và chuyển nó thành mảng kết hợp
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // Lấy giá trị đếm từ mảng kết hợp
            $count = $result['count'];
            // Trả về true nếu số lượng bản ghi > 0, ngược lại trả về false
            return $count > 0;
        }
        // Đếm số bản ghi có số điện thoại và mật khẩu tương ứng
    	public function dembanghi($phonenumber, $password)
        {
            // Xây dựng câu truy vấn SQL để đếm số lượng bản ghi có số điện thoại và mật khẩu tương ứng
            $sql = "select count(*) as count from users where phonenumber = :phonenumber and password = :password";
            // Chuẩn bị câu truy vấn bằng cách sử dụng kết nối và câu truy vấn SQL
            $stmt = $this->connect->prepare($sql);
            // Gắn giá trị tham số cho các tham số trong câu truy vấn
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':password', $password);
            // Thực thi câu truy vấn
            $stmt->execute();
            // Lấy kết quả đếm số lượng bản ghi và chuyển nó thành mảng kết hợp
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // Lấy giá trị đếm từ mảng kết hợp
            $dem = $result['count'];
            // Trả về số lượng bản ghi đếm được
            return $dem;
        }
        // Tìm kiếm bản ghi theo tên
        public function searchByName($name) {
            // Xây dựng câu truy vấn SQL để tìm kiếm các bản ghi trong bảng tương ứng với tên chứa chuỗi name
            $sql = "select * from $this->tableName where name like :name";
            // Chuẩn bị câu truy vấn bằng cách sử dụng kết nối và câu truy vấn SQL
            $stmt = $this->connect->prepare($sql);
            // Gắn giá trị tham số cho tham số trong câu truy vấn, sử dụng phần trung tâm của LIKE với dấu % để tìm kiếm tên chứa chuỗi name
            $stmt->bindValue(':name', '%' . $name . '%', PDO::PARAM_STR);
            // Thực thi câu truy vấn
            $stmt->execute();
            // Lấy tất cả các dòng dữ liệu kết quả và chuyển chúng thành mảng đối tượng của lớp hiện tại (get_class($this))
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));
            // Trả về mảng các đối tượng chứa thông tin các bản ghi tìm thấy
            return $result;
        }
        // Lấy tất cả bản ghi từ bảng tương ứng
        public static function all() {
            // Tạo một đối tượng model mới của lớp con (kế thừa từ BaseModel)
            $model = new static();
            // Xây dựng câu truy vấn SQL để lấy tất cả các bản ghi từ bảng tương ứng
            $sql = "SELECT * FROM $model->tableName";
            // Chuẩn bị câu truy vấn bằng cách sử dụng kết nối và câu truy vấn SQL
            $stmt = $model->connect->prepare($sql);
            // Thực thi câu truy vấn
            $stmt->execute();
            // Lấy tất cả các dòng dữ liệu kết quả và chuyển chúng thành mảng đối tượng của lớp con
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,get_class(($model)));
            // Trả về mảng các đối tượng chứa thông tin tất cả các bản ghi từ bảng tương ứng
            return $result;
        }
        // Tìm kiếm bản ghi theo id
        public static function find($id){
            // Tạo một đối tượng model mới của lớp con (kế thừa từ BaseModel)
            $model = new static();
            // Xây dựng câu truy vấn SQL để lấy bản ghi từ bảng tương ứng dựa trên id
            $sql = "select * from $model->tableName where id = $id";
            // Chuẩn bị câu truy vấn bằng cách sử dụng kết nối và câu truy vấn SQL
            $stmt = $model->connect->prepare($sql);
            // Thực thi câu truy vấn
            $stmt->execute();
            // Lấy tất cả các dòng dữ liệu kết quả và chuyển chúng thành mảng đối tượng của lớp con
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
            // Kiểm tra xem có bản ghi nào tìm thấy không
            if (count($result) > 0) {
                // Trả về đối tượng đầu tiên trong mảng kết quả (đại diện cho bản ghi tìm thấy)
                return $result[0];
            } else {
                // Trả về giá trị null nếu không tìm thấy bản ghi nào phù hợp
                return null;  
            }
        }
        // Thêm bản ghi mới
        public function insert() {
            // Xây dựng chuỗi truy vấn insert cơ sở trên các cột và giá trị tương ứng
            $this->queryBuilder = "insert into $this->tableName (";
            // Duyệt qua các cột trong danh sách cột của đối tượng
            foreach ($this->columns as $col) {
                // Kiểm tra xem giá trị của cột có là null hay không
                if($this->{$col} == null){
                    // Nếu là null, bỏ qua cột này và tiếp tục với cột khác
                    continue;
                }
                // Nếu giá trị của cột không phải null, thêm tên cột vào câu truy vấn
                $this->queryBuilder .= "$col, ";
            }
            // Loại bỏ dấu phẩy cuối cùng và thêm phần values vào câu truy vấn
            $this->queryBuilder = rtrim($this->queryBuilder, ", ");
            $this->queryBuilder .= ") values ( ";
            // Tiếp tục duyệt qua các cột để thêm giá trị tương ứng vào câu truy vấn
            foreach ($this->columns as $col) {
                if($this->{$col} == null){
                    // Nếu là null, bỏ qua cột này và tiếp tục với cột khác
                    continue;
                }
                // Thêm giá trị của cột vào câu truy vấn, được bọc trong dấu nháy đơn
                $this->queryBuilder .= "'" . $this->{$col} ."', ";
            }
            // Loại bỏ dấu phẩy cuối cùng và đóng câu truy vấn insert
            $this->queryBuilder = rtrim($this->queryBuilder, ", ");
            $this->queryBuilder .= ")";
            // Chuẩn bị câu truy vấn INSERT bằng cách sử dụng kết nối và câu truy vấn đã xây dựng
            $stmt = $this->connect->prepare($this->queryBuilder);
            try{
                // Thực thi câu truy vấn insert
                $stmt->execute();
                // Lấy id của bản ghi mới được chèn vào cơ sở dữ liệu
                $this->id = $this->connect->lastInsertid();
                // Trả về chính đối tượng hiện tại sau khi thực hiện thao tác chèn
                return $this;
            }catch(Exception $ex){
                // Nếu có lỗi trong quá trình thực thi, hiển thị thông báo lỗi
                var_dump($ex->getMessage());
                die;
            }
        }
        // Cập nhật bản ghi
        function update(){
            // Xây dựng chuỗi truy vấn update để cập nhật thông tin bản ghi
            $this->queryBuilder = "update $this->tableName set ";
            // Duyệt qua các cột trong danh sách cột của đối tượng
            foreach ($this->columns as $col) {
                // Kiểm tra xem giá trị của cột có là null hay không
                if($this->{$col} == null){
                    // Nếu là null, bỏ qua cột này và tiếp tục với cột khác
                    continue;
                }
                // Nếu giá trị của cột không phải null, thêm tên cột và giá trị tương ứng vào câu truy vấn update
                $this->queryBuilder .= " $col = '" . $this->{$col} . "', ";
            }
            // Loại bỏ dấu phẩy cuối cùng trong câu truy vấn update
            $this->queryBuilder = rtrim($this->queryBuilder, ", ");
            // Thêm điều kiện where để chỉ cập nhật bản ghi có id tương ứng
            $this->queryBuilder .= " where id = $this->id";
            // Chuẩn bị câu truy vấn update bằng cách sử dụng kết nối và câu truy vấn đã xây dựng
            $stmt = $this->connect->prepare($this->queryBuilder);
            try{
                // Thực thi câu truy vấn UPDATE
                $stmt->execute();
                // Trả về chính đối tượng hiện tại sau khi thực hiện thao tác cập nhật
                return $this;
            }catch(Exception $ex){
                // Nếu có lỗi trong quá trình thực thi, hiển thị thông báo lỗi
                var_dump($ex->getMessage());
                die;
            }
        }
        // Xóa bản ghi dựa trên id
        public function delete($id){
            // Xây dựng chuỗi truy vấn DELETE để xóa bản ghi dựa trên id
            $this->queryBuilder = "delete from $this->tableName where id = $this->id";
            // Chuẩn bị câu truy vấn delete bằng cách sử dụng kết nối và câu truy vấn đã xây dựng
            $stmt = $this->connect->prepare($this->queryBuilder);
            try{
                // Thực thi câu truy vấn delete
                $stmt->execute();
                // Trả về true để thể hiện rằng thao tác xóa đã thành công
                return true;
            }catch(Exception $ex){
                // Nếu có lỗi trong quá trình thực thi, hiển thị thông báo lỗi
                var_dump($ex->getMessage())
                ;die;
            }
        }
    }
?>