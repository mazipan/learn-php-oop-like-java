<?php
interface CategoryInterface {
    
   public function selectAll($conn);
   public function selectByIdReturnJson($conn, $id);
   public function update($conn, $cat);
   public function insert($conn, $category_name);
   public function delete($conn, $id);

}
?>