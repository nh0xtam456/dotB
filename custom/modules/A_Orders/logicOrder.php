<?php

class logicOrder{
    public function demoBeforeSave(&$bean, $event, $arguments){
        global $db;
        $sqlSelect = "SELECT order_id FROM a_orders WHERE order_id LIKE 'HD%' ORDER BY order_id DESC";
        $row = $db->fetchOne($sqlSelect);
        if(empty($row)){
           $bean->order_id = 'HD001';
        }
        elseif($row['order_id']==$bean->order_id){
            $bean->order_id = $bean->order_id;
        }
        else{
            $bean->order_id = ++$row['order_id'];   
        }
    }
}

?>