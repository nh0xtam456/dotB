<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

$dictionary['A_OrderDetail'] = array(
	'table'=>'a_orderdetail',
	'audited'=>true,
		'duplicate_merge'=>true,
		'fields'=>array (
),
	'relationships'=>array (
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('A_OrderDetail','A_OrderDetail', array('basic','assignable'));

$dictionary["A_OrderDetail"]["fields"]["order_name"] = array(
    'required'   => true,
    'source'     => 'non-db',
    'name'       => 'order_name',
    'vname'      => 'LBL_ORDER_NAME',
    'type'       => 'relate',
    'rname'      => 'order_id',
    'id_name'    => 'order_id',
    'join_name'  => 'a_orders',
    'link'       => 'order_orderdetail_link',
    'table'      => 'a_orders',
    'module'     => 'A_Orders',
);

$dictionary['A_OrderDetail']['fields']['order_id'] =
  array( 'name' => 'order_id',
   'rname' => 'id',
	'vname' => 'LBL_ORDER_NAME',
	'type' => 'id', 
    'table'  => 'a_orders',
    'isnull'  => 'true',
    'module' => 'A_Orders',
    'dbType' => 'id',
);

$dictionary["A_OrderDetail"]["fields"]["order_orderdetail_link"] = array(
    'name'          => 'order_orderdetail_link',
    'type'          => 'link',
    'relationship'  => 'order_orderdetail_link',
    'module'        => 'A_Orders',
    'bean_name'     => 'a_orders',
    'source'        => 'non-db',
    'vname'         => 'LBL_ORDER_NAME',
);

$dictionary["A_OrderDetail"]["fields"]["product_name"] = array(
    'required'   => true,
    'source'     => 'non-db',
    'name'       => 'product_name',
    'vname'      => 'LBL_PRODUCT_NAME',
    'type'       => 'relate',
    'rname'      => 'product_name',
    'id_name'    => 'product_id',
    'join_name'  => 'a_products',
    'link'       => 'productorder_link',
    'table'      => 'a_products',
    'module'     => 'A_Products',
);

$dictionary['A_OrderDetail']['fields']['product_id'] =
  array( 'name' => 'product_id',
   'rname' => 'id',
	'vname' => 'LBL_PRODUCT_NAME',
	'type' => 'id', 
    'table'  => 'a_products',
    'isnull'  => 'true',
    'module' => 'A_Products',
    'dbType' => 'id',
);

$dictionary["A_OrderDetail"]["fields"]["productorder_link"] = array(
    'name'          => 'productorder_link',
    'type'          => 'link',
    'relationship'  => 'product_order_link',
    'module'        => 'A_Products',
    'bean_name'     => 'a_products',
    'source'        => 'non-db',
    'vname'         => 'LBL_PRODUCT_NAME',
);

$dictionary['A_OrderDetail']['fields']['quantity'] =
	array( 'name' => 'quantity',
	 'type' => 'int', 
	 'label' => 'LBL_QUANTITY',
	 'vname' => 'LBL_QUANTITY' );
	 
$dictionary['A_OrderDetail']['fields']['price'] =
	array( 'name' => 'price',
	'type' => 'int', 
	'label' => 'LBL_PRICE',
	'vname' => 'LBL_PRICE' );	

$dictionary['A_OrderDetail']['fields']['discount'] =
	array( 'name' => 'discount',
	'type' => 'varchar', 
	'label' => 'LBL_DISCOUNT',
	'vname' => 'LBL_DISCOUNT' );	