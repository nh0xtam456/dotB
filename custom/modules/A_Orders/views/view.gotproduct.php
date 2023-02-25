<?php
header("Content-type: application/json");

class A_OrdersViewGotProduct extends SugarView
{   
    public function display()
    { 
        global $db;
        $sqlSelect = "SELECT order_id FROM a_orders WHERE order_id LIKE 'HD%' ORDER BY order_id DESC";
        $row = $db->fetchOne($sqlSelect);
        $order_total_price= $_POST['order_total_price'];
        if(empty($row)){
            $id_hash= md5('HD001');
            $sqlInsertOrder = "INSERT INTO `a_orders` (`id`,`order_id`,`total_price`) VALUES ('$id_hash','HD001','$order_total_price')";
            $db->query($sqlInsertOrder); 
        }
        else{
            $order_id= $row['order_id'];
            $order_id++;
            $id_hash= md5($order_id);
            $sqlInsertOrder = "INSERT INTO `a_orders` (`id`,`order_id`,`total_price`) VALUES ('$id_hash','$order_id','$order_total_price')";
            $db->query($sqlInsertOrder); 
        }
        // for($a=0;$a<count($_POST['product_id'])-1;$a++)
        // {
        //     $insertOrderDetail = "INSERT INTO `a_orderdetail` (`date_entered`, `id`, `price`, `order_id`, `quantity`, `product_name`, `discount`) VALUES ";
        //     $product_id= $_POST['product_id'][$a];
        // //produc_total_price for orderdetail
        //     $product_total_price = $_POST['product_total_price'][$a];
        //     $quantity = $_POST['quantity'][$a];
        //     $product_name = $_POST['product_name'][$a];
        //     $discount = $_POST['discount'][$a];
        //     $idhash = md5($product_id);
        //     $date= date("Y/m/d");
        //     $valuesOrderDetail="('$date', '$idhash', '$product_total_price', '$quantity', '$quantity', '$product_name', '$discount')";
        //     $insertOrderDetail .= ($valuesOrderDetail);
        //     $db->query($insertOrderDetail); 
        // } // a
        // $id_hash1 = hash('md5','thanhtam');
        // $id_hash2 = hash('md5','tamdang');
        // $sqlInsert1 = "INSERT INTO a_orderdetail(name,id)
        //              VALUES IN ((".$data['price'][0]."),2)";
        // $sqlInsert2 = "INSERT INTO a_orderdetail(name,id)
        //             VALUES('$newName','$id_hash2')";
        // $db->query($sqlInsert2);
    }
}
?>