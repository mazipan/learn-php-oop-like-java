<?php
class Category{
  
    // object properties
    public $id;
    public $name;
	
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
	
    // overide toSting method    
    public function __toString(){
        return "Category -> [id:".$this->id.", name:".$this->name."]</br>";
    }   
}
?>