$(document).ready(function () {
  
  $('.increment-btn').click(function (e) { 
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val();
    // alert(qty);
    
    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if(value < 10)
    {
      value++;
      var qty = $(this).closest('.product_data').find('.input-qty').val(value);

    }

  });
  

  $('.decrement-btn').click(function (e) { 
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val();
    // alert(qty)
    
    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1)
    {
      value--;
      var qty = $(this).closest('.product_data').find('.input-qty').val(value);
    }
  });
  $('.addToCartBtn').click(function (e) { 
    e.preventDefault();

    var qty = $(this).closest('.product_data').find('.input-qty').val();
    var prod_id = $(this).val();
// console.log(prod_id);
     alert(prod_id);

    $.ajax({
      method: "post",
      url: "functions/handlecart.php",
      data:
      {
        "prod_id": prod_id,
        "prod_qty": qty,
        "scope": "add"        
      },
        success: function (response) 
        {
          
            if(response == 201)
            {
                console.log(response);    
                // alert(response);         
              alertify.success("product added to cart");            
            }
              else if(response == 401)
            {            
              alertify.success("Login to continue");                
            }
            else if(response == 500)
            {            
              alertify.success("Not added");                
            }
          
        }
    });

    
  });
});
