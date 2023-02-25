$(document).ready(function() {
  var total_price = 0
  var total_discount = 0
  var temp_price = 0

  $("#add_row").click(function() {
      $("#bodyorder").append($("#rowtemplate").html())
      // let selected_product = $(this).parent().parent().parent().parent().find('.my-select').val()
      // let product_id = 'SKU'
      // // $("#bodyorder").append($("#rowtemplate").html())
      // if($("#bodyorder").html())
      // {
      //    if(selected_product.indexOf(product_id) != -1 )
      //    {
      //     alert('đã điền')

      //    }
      //    else
      //    {
      //     alert('do nothing')
      //    }
      // }
      // else
      // {
      //   $("#bodyorder").append($("#rowtemplate").html())

      // }

      // $(this).parent().parent().parent().append('
      // <tr><td><input type="button" value="Add" class="add_row"></input><input type="button" value="Delete" class="delete_row"></input></td></tr>')
      $(".my-select").off("change");
      $(".my-select").on("change", function() {
          var t = $(this)
          var selectedValue = $(this).val();
          // In giá trị được chọn ra console để kiểm tra
          $(this).find('option').attr('selected', false);
          $(this).find('option[value="' + selectedValue + '"]').attr('selected', true);
          $.ajax({
              type: "POST",
              url: "http://localhost/SugarCE-Full-6.5.26/SugarCE-Full-6.5.26/index.php?module=A_Orders&action=product&sugar_body_only=true",
              data: {
                  hehe: t.find(':selected').val()
              },
              dataType: "json",
              success: function(result) {
                  t.parent().parent().find('.price').text(parseInt(result['price']));
                  if (t.parent().parent().find('.price').text() != 0) {
                      t.parent().parent().find('.quantity .quantity_content').attr('disabled', false)
                  }
                  var price = parseFloat(t.parent().parent().find('.price').text());
                  var quantity = parseInt(t.parent().parent().find('.quantity .quantity_content').val());
                  var discount_content = parseInt(t.parent().parent().find('.discount .discount_content').val());
                  var total_discount = parseInt(price) * quantity * (discount_content / 100)
                  if (quantity > 0 || discount_content > 0) {
                      t.parent().parent().find('.temp_price').text(parseInt(price) * quantity)
                      t.parent().parent().find('.total_price .total_price_content').attr("value", total_discount)
                  }
              }
          })

      })



      $(".quantity_content").off("change")
      $(".quantity_content").on("change", function() {
          var price = parseFloat($(this).parent().parent().find('.price').text());
          var quantity = parseInt($(this).val());
          var discount_content = parseInt($(this).parent().parent().find('.discount .discount_content').val());
          var total_discount = parseInt(price) * quantity * (discount_content / 100)
          $(this).parent().parent().find('.temp_price').text(parseFloat(price) * parseInt(quantity, 10));
          if (typeof price !== 'undefined' && quantity > 0) {
              $(this).parent().parent().find('.temp_price').text(parseFloat(price) * quantity);
              $(this).parent().parent().find('.total_price .total_price_content').attr("value", parseFloat(price) * quantity);
          }
          $(this).parent().parent().find('.discount .discount_content').attr('disabled', false)
          if (discount_content > 0) {
              $(this).parent().parent().find('.total_price .total_price_content').attr("value", parseFloat(price) * quantity - total_discount);
          }
          if (quantity == '') {
              $(this).parent().parent().find('.temp_price').text('0')
              $(this).parent().parent().find('.total_price .total_price_content').attr("value", '0');
              alert('Please enter quantity')
          }
  
      })
      $(".discount_content").off("change")
      $(".discount_content").on("change", function() {
          var price = parseFloat($(this).parent().parent().find('.price').text());
          var quantity = parseInt($(this).parent().parent().find('.quantity .quantity_content').val());
          var discount_content = parseInt($(this).val());
          var pre_price = parseInt(price) * quantity * (discount_content / 100)
          $(this).parent().parent().find('.total_price .total_price_content').attr("value", parseFloat(price) * parseInt(quantity, 10) - pre_price);

         
      })


    //   $('.total_price_content').each(function() {
    //       var t = $(this)
    //       let product_price_pos = t.val()
    //       let temp_price_pos = $(this).parent().parent().find('.temp_price').text()
    //       total_price += parseInt(product_price_pos, 10);
    //       temp_price += parseInt(temp_price_pos, 10);
    //       total_discount = temp_price - total_price;
    //       });
    //   $("#total_price_final").html(total_price)
    //   $("#total_discount").html(total_discount)
    //   $("#pro_price").html(temp_price)

      $(".delete_row").off("click")
      $(".delete_row").click(function() {
        let deleted_product_total_price = $(this).parent().parent().find('.total_price_content').val()
        let deleted_product_temp_price = $(this).parent().parent().find('.temp_price').text()
        let deleted_product_discount = deleted_product_temp_price-deleted_product_total_price
        console.log(deleted_product_discount)
        console.log(deleted_product_temp_price)
        console.log(deleted_product_total_price)
        $(this).parent().parent().remove()
      })
      $("#submit").one("click", function() {
        if($(".total_price .total_price_content").val()=='' || $(".total_price .total_price_content").val()==0)
        {
            alert('Please choose some product')
            location.reload()
            return false;
        }
        if($(".total_price .total_price_content").val()!=0)
        {
            $('.total_price_content').each(function() {
            var t = $(this)
            let product_price_pos = t.val()
            let temp_price_pos = $(this).parent().parent().find('.temp_price').text()
            total_price += parseInt(product_price_pos, 10);
            temp_price += parseInt(temp_price_pos, 10);
            total_discount = temp_price - total_price;
            });
            $("#total_price_final").html(total_price)
            $("#total_discount").html(total_discount)
            $("#pro_price").html(temp_price)
            $("#add_row").one("click",function(){
                alert('Please pick product again')
                location.reload();
                return false;
        })
        }
      })
      $("#order").one("click",function()
      {
        if($("#total_price_final").text()=='' && $('.total_price .total_price_content').first().val()!=0)
        {
            $(".alert-order-submit").fadeIn();
            $(".alert-order-submit").fadeIn("slow");
            $(".alert-order-submit").fadeIn(3000);
            setTimeout(function() {
                $(".alert-order-submit").fadeOut();
                $(".alert-order-submit").fadeOut("slow");
                $(".alert-order-submit").fadeOut(6000);
            }, 2000);
            alert('Please hit submit button after pick product')
            location.reload();
            return false;
        }
        if($("#total_price_final").text()=='')
        {
            alert('Please pick some product')
            location.reload();
            return false;
        }
        else{
                var arrayne=[]
                arrayne['product_id']=[]
                arrayne['product_name']=[]
                arrayne['quantity']=[]
                arrayne['product_total_price']=[]
                arrayne['discount']=[]
                // arrayne['price']=[]
                // arrayne['name']=[]
                //id sẽ hash từ chuỗi order_id
                //name để trống

                $('.my-select').each(function() {
                    arrayne['product_id'].push($(this).val())
                    })
                //order_id có
                $('.quantity .quantity_content ').each(function() {
                    arrayne['quantity'].push($(this).val())
                    })
                //quantity có
                $('.total_price .total_price_content').each(function() {
                    arrayne['product_total_price'].push($(this).val())
                    })   
                //total_price của sản phẩm và số lượng, có
                $('.my-select :selected').each(function() {
                    arrayne['product_name'].push($(this).text())
                    })      
                //product_name có
                $('.discount .discount_content ').each(function() {
                    arrayne['discount'].push($(this).val())
                    }) 
                $('.my-select').each(function() {
                    arrayne['product_id'].push($(this).val())
                    })
                console.log(arrayne)
                $.ajax({
                type: "POST",
                // contentType: "application/json",
                url: "http://localhost/SugarCE-Full-6.5.26/SugarCE-Full-6.5.26/index.php?module=A_Orders&action=gotproduct&sugar_body_only=true",
                data: {
                    product_id:arrayne['product_id'],
                    product_total_price:arrayne['product_total_price'],
                    quantity:arrayne['quantity'],
                    product_name:arrayne['product_name'],
                    discount:arrayne['discount'],
                    order_total_price:$("#total_price_final").text()
                        },
                // dataType: "json",
                success: function (result){
                    // $(this).location.href = "http://localhost/SugarCE-Full-6.5.26/SugarCE-Full-6.5.26/index.php?module=A_Orders&action=gotproduct&sugar_body_only=true"
                }
            })
        }
      })
  })
  
  $("#submit").on("click", function() {
      if (!$("#bodyorder").html()) {
        $(".alert-submit").fadeIn();
          $(".alert-submit").fadeIn("slow");
          $(".alert-submit").fadeIn(3000);
          setTimeout(function() {
              $(".alert-submit").fadeOut();
              $(".alert-submit").fadeOut("slow");
              $(".alert-submit").fadeOut(6000);
          }, 2000);

        //   let t = $(this)
        //   let temp_price_pos = t.parent().parent().parent().parent().parent().find('.temp_price').last()  .html() 
        //   let total_price_pos = t.parent().parent().parent().parent().parent().find('.total_price .total_price_content').last().val()
        //   //chỗ ở trên này nếu dùng .text thì sẽ in ra luôn số 0 mặc định của HTML
        //   // let a = parseFloat(temp_price_pos);
        //   // let b = parseFloat(total_price);
        //   $("#total_price_final").html(total_price)
        //   $("#pro_price").html(temp_price)
        //   $("#total_discount").html(temp_price-total_price)
      } else {
          
      }

  })
  $("#order").on("click", function() {
    
      if ($("#bodyorder").html()) {
        
      } else {
          $(".alert-order").fadeIn();
          $(".alert-order").fadeIn("slow");
          $(".alert-order").fadeIn(3000);
          setTimeout(function() {
              $(".alert-order").fadeOut();
              $(".alert-order").fadeOut("slow");
              $(".alert-order").fadeOut(6000);
          }, 2000);
      }
  })

})