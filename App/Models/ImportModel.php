<?php
    class ImportModel extends BaseModel{
        const TABLE = 'phieunhap';

        public function getAll($select = ['*'], $limit = 15, $orderBys = []) {
            //Lấy dữ liệu từ DB
            return $this->all(self::TABLE, $select, $limit, $orderBys);
        }

        public function findById($id) {

            return $this->getById(self::TABLE, $id);
        }

        public function staticticalForTime($startDate = "2021-01-01", $endDate = "2022-01-01") {

            $sql = "SELECT * FROM ".self::TABLE." where NgayNhap BETWEEN '$startDate' and '$endDate' and TinhTrang = 1";
            return $this->getByQuery($sql);

        }
        public function store($data) {

            return $this->create(self::TABLE, $data);
        }

        public function updateData($data, $id) {

            return $this->update(self::TABLE, $data, $id);
        }
        public function deleteCheckForeignKey($tables, $id, $column) {
            
            return $this->checkForeignKey($tables, $id, $column);  
        }
        
        public function deleteData($id) {
            
            return $this->delete(self::TABLE, $id);  
        }
    } 
?>