<?php

class logicOrder{
    public function demoBeforeSave(&$bean, $event, $arguments){
        $a = $_POST;
        global $db;
        $beanid_order = $bean->fetched_row['id'];
        $sqlSelect = "SELECT order_id FROM a_orders WHERE order_id LIKE '%HD00%' ORDER BY order_id DESC";
        $row = $db->fetchOne($sqlSelect);
        if(empty($row)){
            $bean->order_id ='HD001' ;
            $bean->name='HD001';
            $bean->total_price = $_POST['post_total_price'];
            $count_product = count($_POST['totalprice']);
            $temp=0;
            while($temp<$count_product-1)
            {
                $OrderDetail = BeanFactory::newBean('A_OrderDetail');
                $OrderDetail->order_id = 'HD001';
                $OrderDetail->product_id = $_POST['my-select'][$temp];
                $product_id = $_POST['my-select'][$temp];
                $sqlSelectProduct = "SELECT name FROM a_products WHERE product_id = '$product_id'";
                $resultSelectProduct = $db->fetchOne($sqlSelectProduct);
                $OrderDetail->product_name= $resultSelectProduct['name'];
                $OrderDetail->quantity = $_POST['quantity'][$temp];
                $OrderDetail->discount = $_POST['discount'][$temp];
                $OrderDetail->price = $_POST['totalprice'][$temp];
                $OrderDetail->save();
                $temp++;
            }
         }
        else{
            if(!isset($bean->date_entered) && isset($bean->date_modified)){
             //truong hop chinh sua
                $count_product = count ($_POST['totalprice'])-1;
                $temp=0;
                $sqlDelete = "DELETE FROM a_orderdetail WHERE order_id = '$bean->order_id'";
                $deletenow = $db->query($sqlDelete);
                while($temp<$count_product) //bỏ dòng ẩn sau khi add row mới 
                {
                    $OrderDetail = BeanFactory::newBean('A_OrderDetail');
                    $OrderDetail->order_id = $bean->order_id;
                    $OrderDetail->product_id = $_POST['my-select'][$temp];
                    $OrderDetail->quantity = $_POST['quantity'][$temp];
                    $OrderDetail->discount = $_POST['discount'][$temp];
                    $OrderDetail->price = $_POST['totalprice'][$temp];
                    $OrderDetail->save();
                    $temp++;
                }
            }
            else
            {
                $bean->name=++$row['order_id'];
                $bean->order_id = $row['order_id'];
                $bean->total_price = $_POST['post_total_price'];
                $count_product = count($_POST['totalprice'])-1;
                $temp=0;
                while($temp<$count_product)
                {
                    $OrderDetail = BeanFactory::newBean('A_OrderDetail');
                    $OrderDetail->order_id = $bean->order_id;
                    $OrderDetail->product_id = $_POST['my-select'][$temp];
                    $OrderDetail->quantity = $_POST['quantity'][$temp];
                    $OrderDetail->discount = $_POST['discount'][$temp];
                    $OrderDetail->price = $_POST['totalprice'][$temp];
                    $product_id = $_POST['my-select'][$temp];
                    $sqlSelectProduct = "SELECT name FROM a_products WHERE product_id = '$product_id'";
                    $resultSelectProduct = $db->fetchOne($sqlSelectProduct);
                    $OrderDetail->product_name= $resultSelectProduct['name'];
                    $OrderDetail->save();
                    $temp++;
                }
                
            }
        }
    }


}

?>