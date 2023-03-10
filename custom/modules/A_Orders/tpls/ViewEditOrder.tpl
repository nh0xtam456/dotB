<p style="text-align:center;font-weight:bold;font-size:18px;color:#3d83bd;">{$order_id}</p>
<table id="tableorder" style="width:100%;background-color:#f6f6f6;">
      <thead>
         <tr>
            <th scope="col"style="width:20%;text-align:center;">#</th>
            <th scope="col"style="width:20%;text-align:center;">Product's Name</th>
            <th scope="col"style="width:10%;text-align:center;">Unit Price</th>
            <th scope="col"style="width:10%;text-align:center;">Quantity</th>
            <th scope="col"style="width:10%;text-align:center;">Temporary Total</th>
            <th scope="col"style="width:10%;text-align:center;">Discount(%)</th>
            <th scope="col"style="width:10%;text-align:center;">Total Price</th>
            <th scope="col"style="width:20%;text-align:center;"><input type="button" value="Add" id="add_row" style="width:80px;font-weight:bold;" /></th>
         </tr>
      </thead>
      <tbody id="bodyorder">
         {if $order_detail}
            {section name=item loop=$order_detail }
               <tr class="clonene">
                  <td scope="row" class="index" style="text-align:center;"></td>
                  <td style="text-align:center;">
                     <select name='my-select[]' class="my-select form-control" style="margin:auto;width:200px;text-align:center;height:35px">
                        {section name=item1 loop=$product_list }
                        <option class='item_product'  
                         data-product-price={$product_list[item1].price}
                           value={$product_list[item1].product_id}
                           {if $product_list[item1].name == $order_detail[item].product_name }
                              selected
                           {/if}>{$product_list[item1].name}</option>
                        {/section}
                     </select>
                  </td>
                  <td class="price" style="text-align:center;font-weight:bold;font-size:16px;color:#3d83bd">{$order_detail[item].unit_price}</td>
                  <td class="quantity" style="text-align:center;">
                     <input type="number" name='quantity[]'  id="select_product" value="{$order_detail[item].quantity}" style="width:70px;margin:auto;text-align:center;height:35px;" class="quantity_content form-control" min="0" />
                  </td>
                  <td class="temp_price" style="text-align:center;font-weight:bold;font-size:16px;">{math equation='x*y' x=$order_detail[item].unit_price y=$order_detail[item].quantity}</td>
                  <td class="discount" style="text-align:center;">
                     <input type="number" name='discount[]' value="{$order_detail[item].discount}" style="margin:auto;width:70px;height:35px;text-align:center;" class="discount_content form-control" min="0" />
                  </td>
                  <td class="total_price" style="width:40px;text-align:center;">
                     <input type="number"  name='totalprice[]' readonly class="form-control total_price_content" style="margin:auto;text-align:center;width:90px;height:35px;" value="{math equation='(x*y)-(x*y*(c/100))' x=$order_detail[item].unit_price y=$order_detail[item].quantity c=$order_detail[item].discount}"/>
                  </td>
                  <td style="margin:auto;vertical-align:middle;" ><input type="button" style="margin:auto;font-weight:bold;" value="Delete" class="delete_row"></input></td>
               </tr>
            {/section}
         {else}
         {/if}
      </tbody>
      <tfoot id="rowtemplate" style="display:none">
         <tr class="clonene">
            <td scope="row" class="index" style="text-align:center;"></td>
            <td style="text-align:center;">
               <select name='my-select[]' class="my-select form-control" style="margin:auto;width:200px;text-align:center;height:35px;">
                  <option selected>Please choose a product</option>
                  {section name=item loop=$product_list }
                  <option class='item_product' data-product-price={$product_list[item].price}
                     value={$product_list[item].product_id}>{$product_list[item].name}</option>
                  {/section}
               </select>
            </td>
            <td class="price" style="text-align:center;font-weight:bold;font-size:16px;color:#3d83bd"></td>
            <td class="quantity" style="text-align:center;">
               <input type="number" name='quantity[]'  id="select_product" value="0" disabled style="width:70px;margin:auto;text-align:center;height:35px;" class="quantity_content form-control" min="0" />
            </td>
            <td class="temp_price" style="text-align:center;font-weight:bold;font-size:16px;">0</td>
            <td class="discount" style="text-align:center;">
               <input type="number" name='discount[]' value="0" disabled style="margin:auto;width:70px;height:35px;text-align:center;" class="discount_content form-control" min="0" />
            </td>
            <td class="total_price" style="width:40px;text-align:center;">
               <input type="number" readonly  name='totalprice[]' class="form-control total_price_content" style="margin:auto;text-align:center;width:90px;height:35px;" value="0"/>
            </td>
            <td style="margin:auto;vertical-align:middle;" ><input type="button" style="margin:auto;font-weight:bold;" value="Delete" class="delete_row"></input></td>
         </tr>
      </tfoot>
      <table class="tablefooter" style="display:flex;justify-content: space-between;margin-right:200px;margin-top:50px;">
         <thead>
         </thead>
         <tbody>
            <tr>
               <th style="text-align:right;font-size:20px;">Provisional Price:</th>
               <td id="pro_price" style="font-size:20px;text-align:center;vertical-align:middle;color:#3d83bd">{$total_temp_price_order}</td>
            </tr>
            <tr>
               <th style="text-align:right;font-size:20px;">Total Discount:</th>
               <td id="total_discount" style="font-size:20px;text-align:center;vertical-align:middle;color:#3d83bd">{$total_discount_order}</td>
            </tr>
            <tr >
               <th style="text-align:right;font-size:20px;">Total Price:</th>
               <td>
                  <input type="number" name='post_total_price' readonly value="{$order_total_price}" id="total_price_final" style="font-size:20px;text-align:center;font-weight:bold;vertical-align:middle;color:#3d83bd;" class="discount_content form-control"  />
               </td>
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