else if(isset($_POST['add_product_btn']))
{   
   $category_id            = $_POST['category_id'];
   $name                   = $_POST['name'];
   $slug                   = $_POST['slug'];
   $small_description      = $_POST['small_description'];
   $description            = $_POST['description'];
   $original_price         = $_POST['original_price'];
   $selling_price          = $_POST['selling_price'];
   $qty                    = $_POST['qty'];
   $status                 = isset($_POST['status']) ? '1':'0';
   $trending               = isset($_POST['trending']) ? '1':'0';
   $meta_title             = $_POST['meta_title'];
   $meta_description       = $_POST['meta_description'];
   $meta_keywords          = $_POST['meta_keywords'];  

   $image = $_FILES['image']['name'];   

   $path = "../uploads";

   $image_ext = pathinfo( $image, PATHINFO_EXTENSION);
   $filename = time().'.'.$image_ext;

   if($name != "" && $selling_price != "")
   { 
      move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);             $product_query = "INSERT INTO products(category_id,name,slug,small_description,description,original_price,selling_price,image,qty,status,trending, meta_title,meta_keywords,meta_description) VALUES('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$filename','$qty','$status','$trending','meta_title','$meta_keywords','$meta_description')";
      $product_query_run = mysqli_query($con, $product_query);

      if ($product_query_run)
      {
      echo "<script> window.location.href='add-product.php'</script>";
      $_SESSION['message'] = "Product added successfully!"; 
      }
      else
      {
      echo "<script> window.location.href='add-product.php'</script>";
      $_SESSION['message'] = "Uknown error occured!";
      }
     
   }
   else
   {
      echo "<script> window.location.href='add-product.php'</script>";
      $_SESSION['message'] = "All fields must be filled!";

   }

}

else if(isset($_POST['update_product_btn']))
{
   $product_id             = $_POST['product_id'];
   $category_id            = $_POST['category_id'];
   $name                   = $_POST['name'];
   $slug                   = $_POST['slug'];
   $small_description      = $_POST['small_description'];
   $description            = $_POST['description'];
   $original_price         = $_POST['original_price'];
   $selling_price          = $_POST['selling_price'];
   $qty                    = $_POST['qty'];
   $status                 = isset($_POST['status']) ? '1':'0';
   $trending               = isset($_POST['trending']) ? '1':'0';
   $meta_title             = $_POST['meta_title'];
   $meta_description       = $_POST['meta_description'];
   $meta_keywords          = $_POST['meta_keywords'];  

   $path = "../uploads";

   $new_image = $_FILES['image']['name'];
   $old_image = $_POST['old_mage'];

   if($new_image != "")
         {
         $image_ext = pathinfo( $new_image, PATHINFO_EXTENSION);
         $update_filename = time().'.'.$image_ext;

         }
         else
         {
         $update_filename = $old_image;
         }

         $update_product_query = "Update products set category_id='$category_id',name='$name',slug='$slug',small_description='$small_description',description='$description',original_price='$original_price',selling_price='$selling_price',qty='$qty',status='$status',trending='$trending',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords',image='$update_filename' where id='$product_id'";

         $update_product_query_run = mysqli_query($con, $update_product_query);

         if($update_product_query_run)
         {
            if($_FILES['image']['name'] != "")
            {
               move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
               
               if(file_exists("../uploads".$old_image))
               {
               unlink("../uploads/".$old_image);
               }

            }
            echo "<script> window.location.href='edit-product.php?id=$product_id'</script>";
            $_SESSION['message'] = "Product updated successfully!";
           
         }
         else
         {
            echo "<script> window.location.href='product.php?id=$product_id'</script>";
            $_SESSION['message'] = "product update failed!";

         } 
}

else if(isset($_POST['delete_product_btn']))
{
   $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

         $product_query = "Select * from products where id = '$product_id'";
         $product_query_run  = mysqli_query($con, $product_query);
         $product_data       = mysqli_fetch_array($product_query_run);
         $image               = $product_data['image'];

         $delete_query = "Delete from products where id = '$product_id'";                    
         $delete_query_run  = mysqli_query($con, $delete_query);

         if($delete_query_run)
         {
            if(file_exists("../uploads".$image))
            {
            unlink("../uploads".$image);
            }     
               echo 200;                   
               // echo "<script> window.location.href='product.php'</script>";
               // $_SESSION['message'] = "product deleted!";
         }
         else
         {
               echo 500;
               //echo "<script> window.location.href='product.php'</script>";
            // $_SESSION['message'] = "Three was fatal error!";
         }
