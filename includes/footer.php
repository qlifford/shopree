<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/custom.js"></script>


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- Alertify js -->
<script>
  // alertify.alert('Ready!');

     alertify.set('notifier','position','top-left');
    <?php
      if (isset($_SESSION['message'])) 
      {?>
        alertify.alert('Product added to cart', '<?= $_SESSION['message']; ?>', function(){ alertify.success('Ok'); });

          // alertify.alert('<?= $_SESSION['message']; ?>');
      <?php    
        unset( $_SESSION['message']);
      }
    ?>
</script>





<!-- <script src="assets/js/custom.js"></script> -->




     <!-- <script src="assets/js/sweetalert.min.js"></script>

scr

          


  </body>
</html>