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

$dictionary['A_Products'] = array(
	'table'=>'a_products',
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
$dictionary['A_Products']['fields']['price'] = 
array( 	'name' => 'price', 
		'type' => 'varchar ', 
		'label' => 'LBL_PRICE',
		'vname' => 'LBL_PRICE');
		
$dictionary['A_Products']['fields']['product_id'] = 
array( 	'name' => 'product_id', 
		'type' => 'varchar', 
		'label' => 'LBL_PRODUCT_ID',
		'vname' => 'LBL_PRODUCT_ID');

$dictionary['A_Products']['fields']['product_instock'] = 
array( 	'name' => 'product_instock', 
		'type' => 'int', 
		'label' => 'LBL_PRODUCT_INSTOCK',
		'vname' => 'LBL_PRODUCT_INSTOCK');

$dictionary["A_Products"]["relationships"]["product_order_link"] = array (
		'lhs_module' => 'A_Products',
		'lhs_table' => 'a_products',
		'lhs_key' => 'id',
		'rhs_module' => 'A_OrderDetail',
		'rhs_table' => 'a_orderdetail',
		'rhs_key' => 'product_id',
		'relationship_type' => 'one-to-many'
	);
VardefManager::createVardef('A_Products','A_Products', array('basic','assignable'));

