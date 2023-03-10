<?php
    $hook_version = 1;

    // $hook_array['before_save'][] = array(
    //     1, //Integer
    //     'demo logic Supplier', //String
    //     'custom/modules/A_Orders/logicOrder.php', //String or null if using namespaces
    //     'logicOrder', //String
    //     'checkIsset', //String
    // );

    $hook_array['before_save'][] = array(
        1, //Integer
        'demo logic Supplier', //String
        'custom/modules/A_Orders/logicOrder.php', //String or null if using namespaces
        'logicOrder', //String
        'demoBeforeSave', //String
    );
?>