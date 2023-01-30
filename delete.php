<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
   
      
    include_once 'config/database.php';
    include_once 'class/product.php';
    
    $database = new DB();
    $db = $database->getConnection();
    
    $item = new Product($db);
    $ids = isset($_GET['id']) ? $_GET['id'] : die();
    
    if($item->massDelete($ids)){
        echo json_encode("Products deleted.");
    } else{
        echo json_encode("Not deleted");
    }
    
?>