<?php
    class BaseModel extends Database{
        protected  $connect;

        public function __construct() {
            $this->connect = $this->connect();
        }

        // lấy tất cả bản ghi
        public function all($table, $select = ['*'], $limit = 15, $orderBys = ['column' => 'ID' , "by" => 'asc']) {
            //Xử lý chuỗi select 
            $select = implode(', ' , $select);
            //Xử lý chuỗi order by
            $orderByString = implode(' ', $orderBys);
            if(is_array($limit)) {
                $limit = implode(', ' , $limit);
            }

            if($orderByString) {
                $sql = "SELECT ${select} FROM ${table} order by ${orderByString} limit ${limit} ";
            } else {
                $sql = "SELECT ${select} FROM ${table} limit ${limit}";
            }

            $query = $this->_query($sql);
            
            $data = [];
            if($query) {
                while($row = mysqli_fetch_assoc($query)) {
                    array_push($data, $row);
                }
            }
            
            return $data;
        }

        // lấy 1 bản ghi
        public function getById($table, $id) {

            $condition = implode( ' = ', $id);  
            $sql = "SELECT * FROM ${table} where ${condition} limit 1";
            $query = $this->_query($sql);

            return mysqli_fetch_assoc($query);
        }

        public function getByQuery($sql) {
            $query = $this->_query($sql);

            $data = [];
            if($query) {
                while($row = mysqli_fetch_assoc($query)) {
                    array_push($data, $row);
                }
            }
            return $data;
        }
        // Thêm mới
        public function create($table, $data = []) {

            $columns = implode(', ', array_keys($data));
            $valueString = array_map(function($value) {
                return "'" . $value . "'"; 
            }, array_values($data));

            $valueString = implode(', ', $valueString);

            $sql = "INSERT INTO ${table} (${columns}) VALUES (${valueString})";

            // die($sql);
            return $this->_query($sql);

            
        }
        // Chỉnh sửa
        public function update($table, $data, $id) {
            if(is_array($id)) {

                $condition = implode( ' = ', $id);  
            } else {
                $condition = $id;
            }

            
            $dataSets = [];
            foreach($data as $key => $value) {
                array_push($dataSets, "${key} = '".$value."'");
            }
            $dataString = implode(', ', $dataSets);
            
            $sql = "UPDATE ${table} set ${dataString}  where ${condition}";

            return $this->_query($sql);
        }
        // Xóa
        public function delete($table, $id) {
            if(is_array($id)) {

                $condition = implode( ' = ', $id);  
            } else {

                $condition = $id;
            }
            $sql = "DELETE FROM ${table} where $condition";
            return $this->_query($sql);
        }
        // select * form $table = "a, b, c" where a.id = b.id or b.id = c.id
        // [danhmuc, tacgia, nxb, theloai] 'column' value
        public function checkForeignKey($table, $id, $column) {
            $checkFK = true;
            for($i =0 ; $i< count($table); $i++) {

                $sql = "SELECT * FROM $table[$i] WHERE $table[$i].$column = $id";
                $query = $this->_query($sql);
                $data = [];
                if($query) {
                    while($row = mysqli_fetch_assoc($query)) {
                        array_push($data, $row);
                    }
                } 
                if(count($data) > 0) {
                    $checkFK =  false;
                }
            }
           return $checkFK;
        }
        private function _query($sql) {
            return mysqli_query($this->connect, $sql);
        }
    }
?>