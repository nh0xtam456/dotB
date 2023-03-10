<?php

class logicOrder{
    function add_data($case, $bean=null)
        {
            $count_product = count($_POST['quantity']);
            $temp=0;
            while($temp<$count_product)
            {
                $obj = BeanFactory::newBean('A_OrderDetail');
                if ($case=="none") // nếu chưa có hóa đơn nào được tạo
                {
                    $obj->order_id = 'HD001';
                }
                else
                {
                    $obj->order_id=$bean;
                    $obj->load_relationship('order_orderdetail_link');
                } 
                $obj->product_id = $_POST['my-select'][$temp];
                $obj->quantity = $_POST['quantity'][$temp];
                $obj->discount = $_POST['discount'][$temp];
                $obj->price = $_POST['totalprice'][$temp];
                $obj->save();
                $temp++;
            }
        }
    public function demoBeforeSave(&$bean, $event, $arguments){
        // function BeanFactory($action)
        // {
        //     switch($action){
        //         case 'add_if_noneexist':
        //             $OrderDetail = BeanFactory::newBean('A_OrderDetail');
        //             $OrderDetail->order_id = 'HD001';
        //             $OrderDetail->product_id = $_POST['my-select'][$temp];
        //             $OrderDetail->quantity = $_POST['quantity'][$temp];
        //             $OrderDetail->discount = $_POST['discount'][$temp];
        //             $OrderDetail->price = $_POST['totalprice'][$temp];
        //             $OrderDetail->save();
        //             $temp++;
        //     }
        // }
        global $db;
        $a = $_POST;
        $case = '';
        $beanid_order = $bean->fetched_row['id'];
        $sqlSelect = "SELECT order_id FROM a_orders WHERE order_id LIKE '%HD%' ORDER BY order_id DESC";
        $row = $db->fetchOne($sqlSelect);


        if(empty($row)){
            $bean->order_id ='HD001' ;
            $bean->name='HD001';
            $bean->total_price = $_POST['post_total_price'];
            $bean->customer = $_POST['customer_c'];
            $case='none';
            $this->add_data($case);
         }
        else{
            if(!isset($bean->date_entered) && isset($bean->date_modified)){
             //truong hop chinh sua
                $count_product = count ($_POST['totalprice'])-1;
                $sqlDelete = "DELETE FROM a_orderdetail WHERE order_id = '$bean->name'";   
                $db->query($sqlDelete);
                $bean->customer = $_POST['customer_c'];
                $bean->total_price = array_sum($_POST['totalprice']);
                $this->add_data($case, $bean->name);
            }
            else
            {// add mới bình thường ko có điều kiện ràng buộc
                $bean->name=++$row['order_id'];
                $bean->order_id = $bean->name;
                $bean->total_price = $_POST['post_total_price'];
                $bean->customer = $_POST['customer_c'];
                $this->add_data($case, $bean->order_id);
            }
        }
        }
}
?>