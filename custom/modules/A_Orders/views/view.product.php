<?php
header('Content-Type: application/json; charset=utf-8');
class A_OrdersViewProduct extends SugarView
{
    public function display()
    {
        global $db;
        $hehe = $_POST['hehe'];
        $sqlSelect = "SELECT * FROM A_Products WHERE product_id = '$hehe'";
        $result = $db->query($sqlSelect);  
        $arrayResult=[];
        while($row = $db->fetchByAssoc($result)){
            //Chuyển kết quả select sang dạng array
            $arrayResult = $row;
            // $arrayResult[$row['product_id']] = $row['price'];
        }
        echo json_encode($arrayResult);
        parent::display();
    }
}
?>