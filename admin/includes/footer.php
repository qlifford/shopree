<footer class="footer pt-5">
    <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
      
            </div>
            <div class="col-lg-12">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                  <a href="#" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link pe-0 text-muted" target="_blank">Services</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link pe-0 text-muted" target="_blank">More</a>
                </li>
              </ul>
            </div>
          </div>
    </div>
</footer>
  </main>

  <script src="assets/js/jquery-3.6.1.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>
  <!-- <script src="assets/js/custom.js"></script> -->
  
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

  <script src="assets/js/sweetalert.min.js"></script>
  <script>
$(document).ready(function (e) 
{

      $('.delete_product_btn').click(function (e) { 
        e.preventDefault();
        // console.log("heloo");

        var id = $(this).val();
        // console.log(id);
       // alert(id);

        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => 
    {
      if (willDelete) 
      {
            $.ajax({
              method: "post",
              url: "./code.php",
              data: {
                'product_id':id,
                'delete_product_btn': true
              },
              success: function (response) {
                  //  console.log(response);
                if(response == 200)
                {
                  swal("Success!","Product Deleted!","success");
                  $("#products_table").load(location.href + " #products_table");

                }
                else if(response == 500)
                {
                  swal("Error!","Something went wrong!", "error");
 
                }
               
          }
        });
       
      } 
    
    });

  });
});

$(document).ready(function (e) 
{

      $('.delete_category_btn').click(function (e) { 
        e.preventDefault();

        var id = $(this).val();

        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => 
    {
      if (willDelete) 
      {
            $.ajax({
              method: "post",
              url: "./code.php",
              data: {
                'category_id':id,
                'delete_category_btn': true
              },
              success: function (response) {
                    console.log(response);
                if(response == 200)
                {
                  swal("Success!","Category Deleted!","success");
                  $("#categories_table").load(location.href + " #categories_table");

                }
                else if(response == 500)
                {
                  swal("Error!","Something went wrong!", "error");
 
                }
               
          }
        });
       
      } 
    
    });

  });
});

  </script>

  

  </body>
</html>