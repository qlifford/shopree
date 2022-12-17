<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/custom.js"></script>


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>

    alertify.set('notifier','position','top-left');
    <?php
      if (isset($_SESSION['message'])) 
      {?>
          alertify.success('<?= $_SESSION['message']; ?>');
      <?php    
        unset( $_SESSION['message']);
      }
    ?>
</script>

<script>
$(document).ready(function () {
  
  $(document).on('click', '.updateQty', function () 
  { 
    var qty = $(this).closest('.product_data').find('.input-qty').val();
    // var prod_id = $(this).val();
    var prod_id = $(this).closest('.product_data').find('.prodId').val();

    
    $.ajax({
      method: "post",
      url: "functions/handlecart.php",
      data:
      {
        "prod_id": prod_id,
        "prod_qty": qty,
        "scope": "update" 
      },
      success:function(response)
      {
        // alert(response);

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