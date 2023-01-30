<?php
    class Product{

        private $conn;
        private $dbTable = "products";
        public $id;
        public $SKU;
        public $name;
        public $price;
        public $type;
        public $size;
        public $height;
        public $width;
        public $length;
        public $weight;
      
        // db conn
        public function __construct($db){
            $this->conn = $db;
        }

        // GET Products
        public function getProducts(){
            $sqlQuery = "SELECT * FROM " . $this->dbTable . " ORDER BY id DESC";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }


        // ADD Product
        public function addProduct(){
            
            try {

                $sqlQuery = "INSERT INTO ". $this->dbTable ." (SKU, name, price, type, size, height, width, length, weight) VALUES (:SKU, :name, :price, :type, :size, :height, :width, :length, :weight)";
    
                $stmt = $this->conn->prepare($sqlQuery);
                       
                $stmt->bindParam(":SKU", $this->SKU);
                $stmt->bindParam(":name", $this->name);
                $stmt->bindParam(":price", $this->price);
                $stmt->bindParam(":type", $this->type);
                $stmt->bindParam(":size", $this->size);
                $stmt->bindParam(":height", $this->height);
                $stmt->bindParam(":width", $this->width);
                $stmt->bindParam(":length", $this->length);
                $stmt->bindParam(":weight", $this->weight);
    
                $stmt->execute();
                
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return($result);
                
                
            } 
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        

        // DELETE Products
        function massDelete($ids){
        
            $sqlQuery = "DELETE FROM " . $this->dbTable . " WHERE id IN (".$ids.")";
           
            $stmt = $this->conn->prepare($sqlQuery);
       
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>