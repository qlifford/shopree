<?php
 include('functions/userfunctions.php'); 
 include('includes/header.php'); 
 ?>

<div class="py-3 bg-success">
    <div class="container">
      <h6>
      <a href="index.php" class="text-white">
        Home /
        </a>
      <a href="" class="text-white">
      Collections
        </a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
                
          <h1>Our Collections</h1> 
          <hr>
          <div class="row">

          
              <?php
              $categories = getAllActive("categories");

              if(mysqli_num_rows($categories) > 0 ) 
              {
                foreach($categories as $item)
                {
                  ?>
                  <div class="col-md-3 mb-2">
                    <a href="products.php?category=<?= $item['slug']; ?>">
                    <div class="card shadow" class="w-100 h-150">
                      <div class="card-body">
                        <img src="uploads/<?= $item['image']; ?>" alt="Category image" class="w-100 h-150">
                      <h4 class="text-center"><?= $item['name']; ?></h4>
                      
                      </div>
                    </div>
                    </a>
                  </div>


                  <?php
                }
                
              }
              else
              {
                echo "No records found ";
              }
              
              ?>
          </div>
          </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>