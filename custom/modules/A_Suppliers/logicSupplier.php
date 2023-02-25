<?php

class logicSupplier{
    public function demoBeforeSave(&$bean, $event, $arguments){
        global $db;
        $sqlSelect = "SELECT supplier_id FROM a_suppliers WHERE supplier_id LIKE 'NCC%' ORDER BY supplier_id DESC";
        $row = $db->fetchOne($sqlSelect);
        if(empty($row)){
           $bean->supplier_id = 'NCC001';
        }
        elseif($row['supplier_id']==$bean->supplier_id){
            $bean->supplier_id = $bean->supplier_id;
        }
        else{
            $bean->supplier_id = ++$row['supplier_id'];   
        }
    }
}

?>