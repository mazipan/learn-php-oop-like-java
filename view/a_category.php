<?php


if($_POST){    
    
    include_once '../config/database.php'; 
    include_once '../model/dao/categoryDAO.php';
    
    $database = new Database();
    $db = $database->getConnection();
    $dao = new CategoryDAO();
        
   if(isset($_POST["getCategoryById"])){  
        
        $stmt = $dao->selectByIdReturnJson($db, htmlspecialchars($_POST["getCategoryById"]));
        
        echo $stmt; 
        
    }else if(isset($_POST["idForEdit"])){  
        
        $cat = new Category();
        $cat->setId(htmlspecialchars($_POST["idForEdit"]));
        $cat->setName(htmlspecialchars($_POST["name"]));
        
        $stmt = $dao->update($db, $cat);
        
        echo $stmt; 
        
    }else if(isset($_POST["idForDelete"])){  
        
        $stmt = $dao->delete($db, htmlspecialchars($_POST["idForDelete"]));
        
        echo $stmt; 
        
    }else if(isset($_POST["nameOfNewcategory"])){  
        
        $stmt = $dao->insert($db, htmlspecialchars($_POST["nameOfNewcategory"]));
        
        echo $stmt; 
        
    }
    

}



?>