<?php

class logicProduct{
    public function demoBeforeSave(&$bean, $event, $arguments){
        global $db;
        $sqlSelect = "SELECT product_id FROM a_products WHERE product_id LIKE 'SKU%' ORDER BY product_id DESC";
        $row = $db->fetchOne($sqlSelect);
        if(empty($row)){
           $bean->product_id = 'SKU001';
        }
        if($row['product_id']==$bean->product_id || substr($bean->product_id,0,-3)=='SKU'){
            return false;
        }
        else{
            $bean->product_id = ++$row['product_id'];   
        }
    }
}

?>