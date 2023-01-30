<?php 
    class DB {
        private $host = "fdb30.awardspace.net";
        //private $host = "sql101.epizy.com";
        //private $host = "localhost";
        
        private $db = "4252183_apidb";
        //private $db = "epiz_33482233_scandiweb";
        //private $db = "id20203218_swassignment_products";
        
        private $username = "4252183_apidb";
        //private $username = "epiz_33482233";
        //private $username = "id20203218_swa_admin";
    
        private $password = "4Xz;)8I54,k1y(gN";
        //private $password = "xJbU4AQDxVCWu";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host .
                 ";dbname=" . $this->db, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database not connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>