<?php

include_once '../model/interface/i_category.php';
include_once '../model/category.php';

class CategoryDAO implements CategoryInterface{
    
    public function selectAll($conn) {       
        $result = $conn->query("SELECT * FROM categories ORDER BY name");  
        $categories = array();
        if($result->num_rows > 0){
            $index = 0;
             while($row = $result->fetch_assoc()) {
                $cat = new Category();
                
                $cat->setId($row["id"]);
                $cat->setName($row["name"]);
                
                $categories[$index] = $cat;                
                $index++;
            }
        }
        
        $result->close();
        $conn->close();  
        
        return $categories;    
    }
    
    public function selectByIdReturnJson($conn, $id) {        
        $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->bind_param('i', $id);
        
        $stmt->execute();
        
        $cat = new Category();
        $stmt->bind_result($idResult, $nameResult, $created, $modified);
        
        while ($stmt->fetch()) {
           $cat->setId($idResult);
           $cat->setName($nameResult);
        }
        
        $stmt->close();
        $conn->close();
        
        return json_encode($cat);        
    }
    
    public function update($conn, $cat) {        
        $stmt = $conn->prepare("UPDATE categories SET categories.name = ?, categories.modified = CURRENT_TIMESTAMP WHERE id = ?");  
        $stmt->bind_param('si', $cat->getName(), $cat->getId());       
   
        $stmt->execute();
        
        if($stmt->error != ''){
            $result = array("result" => $stmt->error); 
        }else{
            $result = array("result" => "success"); 
        }    
        
        $stmt->close();
        $conn->close(); 
        
        return json_encode($result);
    }
    
    public function insert($conn, $category_name) {
        $stmt = $conn->prepare("INSERT INTO categories VALUES (NULL, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");  
        $stmt->bind_param('s', $category_name);       
   
        $stmt->execute();
        
        if($stmt->error != ''){
            $result = array("result" => $stmt->error); 
        }else{
            $result = array("result" => "success"); 
        }    
        
        $stmt->close();
        $conn->close(); 
        
        return json_encode($result);
    }

    public function delete($conn, $id) {
        $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");  
        $stmt->bind_param('i', $id);
   
        $stmt->execute();
        
        if($stmt->error != ''){
            $result = array("result" => $stmt->error); 
        }else{
            $result = array("result" => "success"); 
        }    
        
        $stmt->close();
        $conn->close(); 
        
        return json_encode($result);
    }

}
?>