<?php
    class BaseModel
    {
        public $connect;
        public function __construct() {
            $this->connect = new PDO("mysql:host=localhost;dbname=camvanbakeryshop;charset=utf8", 'root', '');
        }

        public function kiemtradangnhap($phonenumber, $password)
        {
            $sql = "SELECT * FROM users WHERE phonenumber = :phonenumber AND password = :password";
            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function kiemtratontai($phonenumber) {
            $sql = "SELECT COUNT(*) AS count FROM users WHERE phonenumber = :phonenumber";
            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->execute();
        
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['count'];
            return $count > 0;
        }
    	public function dembanghi($phonenumber, $password)
        {
            $sql = "SELECT COUNT(*) AS count FROM users WHERE phonenumber = :phonenumber AND password = :password";
            $stmt = $this->connect->prepare($sql);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $dem = $result['count'];
            return $dem;
        }

        public static function all() {
            $model = new static();
            $sql = "SELECT * FROM $model->tableName";
            $stmt = $model->connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS,get_class(($model)));
            return $result;
        }

        public static function find($id){
            $model = new static();
            $sql = "select * from $model->tableName where id = $id";
            $stmt = $model->connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
            // var_dump($result);die;
            if (count($result) > 0) {
                return $result[0];
            } else {
                return null;  
            }
        }

        public function insert() {
            $this->queryBuilder = "insert into $this->tableName (";
            foreach ($this->columns as $col) {
                if($this->{$col} == null){
                    continue;
                }
                $this->queryBuilder .= "$col, ";
            }
            $this->queryBuilder = rtrim($this->queryBuilder, ", ");
            $this->queryBuilder .= ") values ( ";
            foreach ($this->columns as $col) {
                if($this->{$col} == null){
                    continue;
                }
                $this->queryBuilder .= "'" . $this->{$col} ."', ";
            }
            $this->queryBuilder = rtrim($this->queryBuilder, ", ");
            $this->queryBuilder .= ")";
    
            $stmt = $this->connect->prepare($this->queryBuilder);
            try{
    
                $stmt->execute();
                $this->id = $this->connect->lastInsertid();
                return $this;
            }catch(Exception $ex){
                var_dump($ex->getMessage());die;
            }
        }

        function update(){
            $this->queryBuilder = "update $this->tableName set ";
    
            foreach ($this->columns as $col) {
                if($this->{$col} == null){
                    continue;
                }
                $this->queryBuilder .= " $col = '" . $this->{$col} . "', ";
            }
    
            $this->queryBuilder = rtrim($this->queryBuilder, ", ");
    
            $this->queryBuilder .= " where id = $this->id";
    
            
            $stmt = $this->connect->prepare($this->queryBuilder);
            // var_dump($stmt);die;
            try{
                $stmt->execute();
                return $this;
            }catch(Exception $ex){
                var_dump($ex->getMessage());
                die;
            }
        }

        public function delete($id){
            $this->queryBuilder = "delete from $this->tableName where id = $this->id";
            $stmt = $this->connect->prepare($this->queryBuilder);
            try{
    
                $stmt->execute();
                return true;
            }catch(Exception $ex){
                var_dump($ex->getMessage());die;
            }
        }
    }
?>