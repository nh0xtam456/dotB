<?php
class A_OrdersViewCheckProduct extends SugarView
{ 

    public function display()
    {
        global $bean;
        global $db;
        $sqlSelect = "SELECT order_id FROM a_orders WHERE order_id LIKE 'HD%' ORDER BY order_id DESC";
        $row = $db->fetchOne($sqlSelect);
        if(empty($row)){
            //Create bean
            $bean = BeanFactory::getBean('A_Orders');

            //Populate bean fields
            $bean->name = 'Example Record';

            //Save
            $bean->save();

            //Retrieve the bean id
         }
        else{
            if(!isset($bean->date_entered) && isset($bean->date_modified)){
                return false;
                break;
            }
            $bean->order_id = ++$row['order_id'];   
        }
    }
      
}
