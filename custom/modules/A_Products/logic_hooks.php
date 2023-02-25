<?php
    $hook_version = 1;

    $hook_array['before_save'][] = array(
        1, //Integer
        'demo logic Product', //String
        'custom/modules/A_Products/logicProduct.php', //String or null if using namespaces
        'logicProduct', //String
        'demoBeforeSave', //String
    );
?>