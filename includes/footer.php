<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/custom.js"></script>

<script>
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
    // console.log(prod_id)

    $.ajax({
      method: "post",
      url: "functions/handlecart.php",
      data: 
      {
        "prod_id": prod_id,
        "prod_qty": prod_qty,
        "scope": "add"
      },
      success: function (response) 
      {
        if (response == 201) 
        {
          alertify.success("Product added to cart");
        }
        else if (response == 401) 
        {
        alertify.success("Please Login to continue");
        }
        else if (response == 500) 
        {
        alertify.success("Something went wrong");
        }
        
      }
    });

    
  });
});

</script>


<!-- <script src="assets/js/custom.js"></script> -->




     <!-- <script src="assets/js/sweetalert.min.js"></script>

scr

          


  </body>
</html>