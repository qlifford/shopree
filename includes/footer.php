  <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/custom.js"></script>
<script>
  const swiper = new Swiper('.swiper', {
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
   loop: true,


  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});
</script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>

      alertify.set('notifier','position','top-right');
      <?php
        if (isset($_SESSION['message'])) 
        {?>
            alertify.success('<?= $_SESSION['message']; ?>');
        <?php    
          unset( $_SESSION['message']);
        }
      ?>
  </script>

  </body>
</html>