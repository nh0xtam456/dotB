<?php
    $hook_version = 1;

    $hook_array['before_save'][] = array(
        1, //Integer
        'demo logic Supplier', //String
        'custom/modules/A_Suppliers/logicSupplier.php', //String or null if using namespaces
        'logicSupplier', //String
        'demoBeforeSave', //String
    );
?>