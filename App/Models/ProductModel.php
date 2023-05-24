<?php
    class ProductModel extends BaseModel{
        const TABLE = 'sach';

        public function getAll($select = ['*'], $limit = 1000, $orderBys = []) {
            //Lấy dữ liệu từ DB
            return $this->all(self::TABLE, $select, $limit, $orderBys);
        }
        public function updateMount($id, $mount) {

            $sql = "UPDATE ".self::TABLE." SET SoLuong = $mount where MaSP = $id";
            return $this->getByQuery($sql);

        }
        public function searchByName($name) {

            $sql = "SELECT * FROM ".self::TABLE." where TenSp like '%$name%'";
            return $this->getByQuery($sql);
        }

        public function getByCategoryId($id, $limit = 6) {

            $sql = "SELECT * FROM ".self::TABLE." where MaTl = $id limit $limit";
            return $this->getByQuery($sql);
        }

        public function findById($id) {

            return $this->getById(self::TABLE, $id);
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