<?php
$module_name = 'A_Suppliers';
$listViewDefs [$module_name] = 
array (
  'SUPPLIER_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SUP_ID',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
