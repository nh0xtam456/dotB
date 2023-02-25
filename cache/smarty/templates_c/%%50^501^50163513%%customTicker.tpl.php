<?php /* Smarty version 2.6.11, created on 2023-02-25 05:29:17
         compiled from custom/modules/A_Orders/tpls/customTicker.tpl */ ?>
<table id="tableorder" style="width:100%;">
      <thead>
         <tr>
            <th scope="col"style="width:5%;text-align:center;">#</th>
            <th scope="col"style="width:20%;text-align:center;">Product's Name</th>
            <th scope="col"style="width:10%;text-align:center;">Unit Price</th>
            <th scope="col"style="width:10%;text-align:center;">Quantity</th>
            <th scope="col"style="width:10%;text-align:center;">Temporary Total</th>
            <th scope="col"style="width:10%;text-align:center;">Discount(%)</th>
            <th scope="col"style="width:10%;text-align:center;">Total Price</th>
            <th scope="col"style="width:20%;text-align:center;"><input type="button" value="Add" id="add_row" style="width:80px;font-weight:bold;" /></th>
         </tr>
      </thead>
      <tbody id="bodyorder"></tbody>
      <tfoot id="rowtemplate" style="display:none">
         <tr class="clonene">
            <td scope="row" class="index" style="text-align:center;"></td>
            <td style="text-align:center;">
               <select class="my-select form-control" style="margin:auto;width:200px;text-align:center;height:35px;">
                  <option selected>Please choose a product</option>
                  <?php unset($this->_sections['item']);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['loop'] = is_array($_loop=$this->_tpl_vars['product_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['item']['show'] = true;
$this->_sections['item']['max'] = $this->_sections['item']['loop'];
$this->_sections['item']['step'] = 1;
$this->_sections['item']['start'] = $this->_sections['item']['step'] > 0 ? 0 : $this->_sections['item']['loop']-1;
if ($this->_sections['item']['show']) {
    $this->_sections['item']['total'] = $this->_sections['item']['loop'];
    if ($this->_sections['item']['total'] == 0)
        $this->_sections['item']['show'] = false;
} else
    $this->_sections['item']['total'] = 0;
if ($this->_sections['item']['show']):

            for ($this->_sections['item']['index'] = $this->_sections['item']['start'], $this->_sections['item']['iteration'] = 1;
                 $this->_sections['item']['iteration'] <= $this->_sections['item']['total'];
                 $this->_sections['item']['index'] += $this->_sections['item']['step'], $this->_sections['item']['iteration']++):
$this->_sections['item']['rownum'] = $this->_sections['item']['iteration'];
$this->_sections['item']['index_prev'] = $this->_sections['item']['index'] - $this->_sections['item']['step'];
$this->_sections['item']['index_next'] = $this->_sections['item']['index'] + $this->_sections['item']['step'];
$this->_sections['item']['first']      = ($this->_sections['item']['iteration'] == 1);
$this->_sections['item']['last']       = ($this->_sections['item']['iteration'] == $this->_sections['item']['total']);
?>
                  <option data-product-price=<?php echo $this->_tpl_vars['product_list'][$this->_sections['item']['index']]['price']; ?>

                     value=<?php echo $this->_tpl_vars['product_list'][$this->_sections['item']['index']]['product_id']; ?>
><?php echo $this->_tpl_vars['product_list'][$this->_sections['item']['index']]['name']; ?>
</option>
                  <?php endfor; endif; ?>
               </select>
            </td>
            <td class="price" style="text-align:center;font-weight:bold;font-size:16px;color:#3d83bd"></td>
            <td class="quantity" style="text-align:center;">
               <input type="number"  id="select_product" value="0" disabled style="width:70px;margin:auto;text-align:center;height:35px;" class="quantity_content form-control" min="0" />
            </td>
            <td class="temp_price" style="text-align:center;font-weight:bold;font-size:16px;">0</td>
            <td class="discount" style="text-align:center;">
               <input type="number" value="0" disabled style="margin:auto;width:70px;height:35px;text-align:center;" class="discount_content form-control" min="0" />
            </td>
            <td class="total_price" style="width:40px;text-align:center;">
               <input name=card type="text" class="form-control total_price_content" readonly disabled style="margin:auto;text-align:center;width:80px;height:35px;" value="0"/>
            </td>
            <td style="margin:auto;" ><input type="button" style="margin:auto;font-weight:bold;" value="Delete" class="delete_row"></input></td>
         </tr>
      </tfoot>
      <table style="display:flex;justify-content: space-between;margin-right:200px;margin-top:50px;">
         <thead>
         </thead>
         <tbody>
            <tr>
               <th style="text-align:right;font-size:20px;">Provisional Price</th>
               <td id="pro_price" style="font-size:20px;font-weight:italic;vertical-align:middle;color:#3d83bd"></td>
            </tr>
            <tr>
               <th style="text-align:right;font-size:20px;">Total Discount</th>
               <td id="total_discount" style="font-size:20px;font-weight:italic;vertical-align:middle;color:#3d83bd"></td>
            </tr>
            <tr>
               <th style="text-align:right;font-size:20px;">Total Price</th>
               <td id="total_price_final" style="font-size:20px;font-weight:bold;vertical-align:middle;color:#3d83bd"></td>
            </tr>
            <tr>
               <td><input type="button" id="submit" value="Submit" onClick=></td>
               <td><input type="button" id="order" value="Order" ></td>
            </tr>
         </tbody>
         <tfoot>
            <tr>
               <td>
                  <div class="alert alert-danger alert-submit"  style="display:none" role="alert">
                     Let's pick some products
                  </div>
                  <div class="alert alert-warning alert-order"  style="display:none" role="alert">
                     You can't pay for none product
                  </div>
                  <div class="alert alert-info alert-order-submit" style="display:none" role="alert">
                     Please submit your order by hit "Submit" button
                  </div>
               </td>
            </tr>
         </tfoot>
      </table>
   </table>
<script src="custom/modules/A_Orders/js/edit.js"></script>