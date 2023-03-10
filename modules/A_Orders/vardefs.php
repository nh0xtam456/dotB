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

$dictionary['A_Orders'] = array(
	'table'=>'a_orders',
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
VardefManager::createVardef('A_Orders','A_Orders', array('basic','assignable'));
$dictionary['A_Orders']['fields']['order_id'] =
 array( 'name' => 'order_id',
  'type' => 'varchar',
  'label' => 'LBL_ORDER_ID',
	'vname' => 'LBL_ORDER_ID',
	'len' => '255',
	'default' => '' );

$dictionary['A_Orders']['fields']['total_price'] =
 array( 'name' => 'total_price',
  'type' => 'int', 
  'label' => 'LBL_TOTAL_PRICE' ,
	'vname' => 'LBL_TOTAL_PRICE');

$dictionary['A_Orders']['fields']['customer'] =
 array( 'name' => 'customer',
  'type' => 'varchar', 
  'label' => 'LBL_CUSTOMER' ,
	'vname' => 'LBL_CUSTOMER');

$dictionary['A_Orders']['fields']['total_product_of_customer'] =
 array( 'name' => 'total_product_of_customer',
  	'type' => 'varchar', 
  	'label' => 'LBL_TOTAL_CUS' ,
	'vname' => 'LBL_TOTAL_CUS');

$dictionary["A_Orders"]["relationships"]["order_orderdetail_link"] = array (
	'lhs_module' => 'A_Orders',
	'lhs_table' => 'a_orders',
	'lhs_key' => 'id',
	'rhs_module' => 'A_OrderDetail',
	'rhs_table' => 'a_orderdetail',
	'rhs_key' => 'order_id',
	'relationship_type' => 'one-to-many'
);