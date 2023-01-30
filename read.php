<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json;");
    
    include_once 'config/database.php';
    include_once 'class/product.php';

    $database = new DB();
    $db = $database->getConnection();

    $items = new Product($db);

    $stmt = $items->getProducts();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $productsArr = array();
       

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id"  => $id,
                "SKU" => $SKU,
                "name" => $name,
                "price" => $price,
                "type" => $type,
                "size" => $size,
                "height" => $height,
                "width" => $width,
                "length" => $length,
                "weight" => $weight
            );

            array_push($productsArr, $e);
        }
        echo json_encode($productsArr);
    }
    else{
        echo json_encode('no products to retrieve');
    }

?>