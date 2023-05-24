<?php
    class BillModel extends BaseModel{
        const TABLE = 'hoadon';

        public function getAll($select = ['*'], $limit = 15, $orderBys = []) {
            //Lấy dữ liệu từ DB
            return $this->all(self::TABLE, $select, $limit, $orderBys);
        }

        public function findById($id) {

            return $this->getById(self::TABLE, $id);
        }
        public function staticticalForTime($startDate = "2021-01-01", $endDate = "2050-01-01") {

            $sql = "SELECT * FROM ".self::TABLE." where NgayTao BETWEEN '$startDate' and '$endDate' and TinhTrang = 3";
            return $this->getByQuery($sql);

        }
        public function getByIDUser($IDU)
        {
            $sql = "SELECT * FROM ".self::TABLE." where MaKH = $IDU";
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