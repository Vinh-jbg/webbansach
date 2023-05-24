<?php
    class  PromotionModel extends BaseModel{
        const TABLE = 'ctkm';

        public function getAll($select = ['*'], $limit = 15, $orderBys = []) {
            //Lấy dữ liệu từ DB
            return $this->all(self::TABLE, $select, $limit, $orderBys);
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