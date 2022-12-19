<?php

include('functions/userfunctions.php');
include('includes/header.php');
include('includes/slider.php');
 
 ?>

 <div class="bg-f2f2f2">
  <div class="container">
    <div class="row">  
      <div class="col-md-12">
      <h4>Trending Products</h4>
      <div class="underline mb-2"></div>
        <div class="owl-carousel">

              <?php 
              $trendingProducts = getAllTrending();
              if (mysqli_num_rows($trendingProducts) > 0)
              {
                foreach($trendingProducts as $item)
                {
                  ?>
                  <div class="item">
                    <a href="product-view.php?product=<?= $item['slug']; ?>">
                    <div class="card shadow h-100">
                      <div class="card-body">
                      <img src="uploads/<?= $item['image']; ?>" alt="Product name" height="200px"">
                      <h5 class="text-center"><?= $item['name']; ?></h5>
                      
                      </div>
                    </div>
                    </a>
                  </div>
                  <?php
                }
              }
              ?>          
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-5 bg-f2f2f2">
  <div class="container">
    <div class="row">  
      <div class="col-md-12">
      <h4>About Us</h4>
      <div class="underline mb-2"></div>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo qui exercitationem libero voluptatum aperiam fuga quis culpa, incidunt numquam iusto, in dolorem earum at perspiciatis unde magnam? Quas, et odio?
      </p>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci magnam ipsum numquam atque praesentium deleniti esse omnis quidem nisi architecto minus at, minima ex eaque molestiae blanditiis facilis modi libero?
      </p>
     
      
        </div>
      </div>
    </div>
  </div>

      <div class="py-5 bg-dark">
      <div class="container">
        <div class="row">  
          <div class="col-md-3">
          <h4 class="text-white">Shopree</h4>
          <div class="underline mb-2"></div>
          <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> Home</a> <br>    
          <a href="cart.php" class="text-white"><i class="fa fa-angle-right"></i> My Cart</a> <br>       
          <a href="categories.php" class="text-white"><i class="fa fa-angle-right"></i> Our Collections
        </a> <br>       
          <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> About Us</a>       
      
        </div>
        <div class="col-md-3">
          <h4 class="text-white">Address</h4>
          <div class="underline mb-2"></div>
          <p class="text-white">
            #33, 2nd Floor,
            Mama Ngina street,Githunguri,
            Utawala, Kenya.
          </p>
          <a href="tel:+254 123478990" class="text-white"> <i class="fa fa-phone"></i> +254 123478990</a> <br>
          <a href="mailto:cliff@gmail.com" class="text-white"> <i class="fa fa-envelope"></i> cliff@gmail.com</a>
        </div>
        <div class="col-md-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8088759903967!2d36.97237931415749!3d-1.2888768359910678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f6cbc273a4837%3A0xe208749bee2323da!2sUtawala%20Shopping%20Mall!5e0!3m2!1ssw!2ske!4v1671388322849!5m2!1ssw!2ske" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2 bg-light">
    <div class="text-dark">
      <div class="mb-0 text-center">All rights reserved. Copyright @ <a href="https://www.youtube.com" target="_blank">Agwati Kwach</a> Agwati Kwach <?= date('Y')?></div>
    </div>
  </div>
<?php include('includes/footer.php'); ?>
<script>
$(document).ready(function () {
    
 
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:4
          }
      }
    })
});
</script>