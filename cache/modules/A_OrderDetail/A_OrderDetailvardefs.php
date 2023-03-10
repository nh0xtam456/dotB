<?php 
 $GLOBALS["dictionary"]["A_OrderDetail"]=array (
  'table' => 'a_orderdetail',
  'audited' => true,
  'duplicate_merge' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'required',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'a_orderdetail_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'a_orderdetail_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'a_orderdetail_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'order_name' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'order_name',
      'vname' => 'LBL_ORDER_NAME',
      'type' => 'relate',
      'rname' => 'order_id',
      'id_name' => 'order_id',
      'join_name' => 'a_orders',
      'link' => 'order_orderdetail_link',
      'table' => 'a_orders',
      'module' => 'A_Orders',
    ),
    'order_id' => 
    array (
      'name' => 'order_id',
      'rname' => 'id',
      'vname' => 'LBL_ORDER_NAME',
      'type' => 'id',
      'table' => 'a_orders',
      'isnull' => 'true',
      'module' => 'A_Orders',
      'dbType' => 'id',
    ),
    'order_orderdetail_link' => 
    array (
      'name' => 'order_orderdetail_link',
      'type' => 'link',
      'relationship' => 'order_orderdetail_link',
      'module' => 'A_Orders',
      'bean_name' => 'a_orders',
      'source' => 'non-db',
      'vname' => 'LBL_ORDER_NAME',
    ),
    'product_name' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'name' => 'product_name',
      'vname' => 'LBL_PRODUCT_NAME',
      'type' => 'relate',
      'rname' => 'product_name',
      'id_name' => 'product_id',
      'join_name' => 'a_products',
      'link' => 'productorder_link',
      'table' => 'a_products',
      'module' => 'A_Products',
    ),
    'product_id' => 
    array (
      'name' => 'product_id',
      'rname' => 'id',
      'vname' => 'LBL_PRODUCT_NAME',
      'type' => 'id',
      'table' => 'a_products',
      'isnull' => 'true',
      'module' => 'A_Products',
      'dbType' => 'id',
    ),
    'productorder_link' => 
    array (
      'name' => 'productorder_link',
      'type' => 'link',
      'relationship' => 'product_order_link',
      'module' => 'A_Products',
      'bean_name' => 'a_products',
      'source' => 'non-db',
      'vname' => 'LBL_PRODUCT_NAME',
    ),
    'quantity' => 
    array (
      'name' => 'quantity',
      'type' => 'int',
      'label' => 'LBL_QUANTITY',
      'vname' => 'LBL_QUANTITY',
    ),
    'price' => 
    array (
      'name' => 'price',
      'type' => 'int',
      'label' => 'LBL_PRICE',
      'vname' => 'LBL_PRICE',
    ),
    'discount' => 
    array (
      'name' => 'discount',
      'type' => 'varchar',
      'label' => 'LBL_DISCOUNT',
      'vname' => 'LBL_DISCOUNT',
    ),
  ),
  'relationships' => 
  array (
    'a_orderdetail_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'A_OrderDetail',
      'rhs_table' => 'a_orderdetail',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'a_orderdetail_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'A_OrderDetail',
      'rhs_table' => 'a_orderdetail',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'a_orderdetail_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'A_OrderDetail',
      'rhs_table' => 'a_orderdetail',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'unified_search' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'a_orderdetailpk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'templates' => 
  array (
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => false,
);