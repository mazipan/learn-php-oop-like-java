<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "products";
 
    // object properties
    public $id;
    public $name;
    public $price;
    public $description;
    public $category_id;
    public $date_created;
 
 	// getter & setter
	function setId($par){
       $this->id = $par;
    }
    function getId(){
       return $this->id;
    }
	function setName($par){
       $this->name = $par;
    }
    function getName(){
       return $this->name;
    }
	function setPrice($par){
       $this->price = $par;
    }
    function getPrice(){
       return $this->price;
    }
	function setDescription($par){
       $this->description = $par;
    }
    function getDescription(){
       return $this->description;
    }
	function setCategory_id($par){
       $this->category_id = $par;
    }
    function getCategory_id(){
       return $this->category_id;
    }    
	function setDate_created($par){
       $this->date_created = $par;
    }
    function getDate_created(){
       return $this->date_created;
    }
    
    
    public function __construct($db){
        $this->conn = $db;
    }
    
    public function __toString(){
        return "Product -> [id:".$this->id.", name:".$this->name."]</br>";
    }
     
    public function selectAll(){
        $result = $this->selectQuery("SELECT * FROM ".$this->table_name." ORDER BY name");  
        $products = array();
        if($result->num_rows > 0){
            $index = 0;
             while($row = $result->fetch_assoc()) {
                $product = new Product($this->conn);
                
                $product->setId($row["id"]);
                $product->setName($row["name"]);
                $product->setPrice($row["price"]);
                $product->setDescription($row["description"]);
                $product->setCategory_id($row["category_id"]);
                $product->setDate_created($row["created"]);
                
                $products[$index] = $product;                
                $index++;
            }
        }
        
        $result->close();
        $this->conn->close();  
        
        return $products;    
    }
 
    // create product
    function create(){
 
        // to get time-stamp for 'created' field
        $this->getTimestamp();
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name = ?, price = ?, description = ?, category_id = ?, created = ?";
 
        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->price);
        $stmt->bindParam(3, $this->description);
        $stmt->bindParam(4, $this->category_id);
        $stmt->bindParam(5, $this->timestamp);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    
    private function selectQuery($StringQuery){ 
        $stmt = $this->conn->query($StringQuery);        		
        return $stmt;
    }
    
    private function prepareQuery($StringQuery){ 
        $stmt = $this->conn->prepare($StringQuery);        		
        return $stmt;
    }
}
?>