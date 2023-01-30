<?php
   
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json;");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
   
     include_once 'config/database.php';
     include_once 'class/product.php';

     $database = new DB();
     $db = $database->getConnection();

     $item = new Product($db);

     $data = json_decode(file_get_contents("php://input"));

     $item->SKU    = $data->SKU;
     $item->name   = $data->name;
     $item->price  = $data->price;
     $item->type   = $data->type;
     $item->size   = $data->size;
     $item->height = $data->height;
     $item->width  = $data->width;
     $item->length = $data->length;
     $item->weight = $data->weight;
      
     if($item->addProduct()){
         echo json_encode("Product Added.");
     } else{
         echo json_encode("Failed to Add Product.");
     }
    
?>

