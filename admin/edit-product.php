<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
            <div class="col-md-12">

                    <?php
                    if(isset($_SESSION['message']))
                    {
                        ?>
                        <div class="alert alert-light alert-dismissible fade show" role="alert">
                            <strong></strong> <?= $_SESSION['message']; ?>
                            <button type="" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    }?>


                <?php               
                if (isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    
                
                    $id = $_GET['id'];
                    $product = getByID("products", $id);

                    if (mysqli_num_rows($product) > 0) 
                    {
                        $data = mysqli_fetch_array($product);

                                ?>
            
                        <div class="card">
                        <div class="card-header">
                                <h4>Edit Products
                                <a href="product.php" class="btn btn-primary float-end">Back</a>

                                </h4>
                            </div>
                                <div class="card-body">
                                <form action="code.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="mb-0">Select Category</label class="mb-0">
                                            <select name="category_id"class="form-select mb-2">
                                                <option selected>Select Category</option>

                                        <?php                                         
                                $categories = getAll("categories");

                                if(mysqli_num_rows($categories) > 0)
                                {
                                    foreach($categories as $item)
                                    {
                                                        ?>
                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':'' ?>><?= $item['name']; ?></option>
                                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No records";                                        
                                }
                                                    ?>                                        
                                    
                                </select>
                                    </div>

                                    <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
            
                                            <div class="col-md-6">
                                                <label class="mb-0">Name</label class="mb-0">
                                                <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control mb2" placeholder="Enter Category Name">
                                            </div>
            
                                            <div class="col-md-6">
                                                <label class="mb-0">Slug</label class="mb-0">
                                                <input type="text" name="slug" value="<?= $data['slug']; ?>" class="form-control mb2" placeholder="Enter Slug">
                                            </div>
            
                                            
                                            <div class="col-md-12">
                                                <label class="mb-0">Small Description</label class="mb-0">
                                                <textarea rows="3" name="small_description" class="form-control mb2" placeholder="Enter Small Description"><?= $data['small_description']; ?></textarea>
                                            </div>
            
                                            <div class="col-md-12">
                                                <label class="mb-0">Description</label class="mb-0">
                                                <textarea rows="3" name="description" class="form-control mb2" placeholder="Enter Description"><?= $data['description']; ?></textarea>
                                            </div>
            
                                            <div class="col-md-6">
                                                <label class="mb-0">Original Price</label class="mb-0">
                                                <input type="text" name="original_price" value="<?= $data['original_price']; ?>" class="form-control mb2" placeholder="Enter Original Price">
                                            </div>
            
                                            <div class="col-md-6">
                                                <label class="mb-0">Selling Price</label class="mb-0">
                                                <input type="text" name="selling_price" value="<?= $data['selling_price']; ?>" class="form-control mb2" placeholder="Enter Selling Price">
                                            </div>
            
                                        <div class="col-md-12">
                                            <label class="mb-0">Upload Image</label>
                                            <input type="hidden" value="<?= $image['image']; ?>" name="old_image">
                                            <input type="file" name="image" class="form-control mb2">
                                            <label class="mb-0">Current image</label>
                                            <img src="../uploads/<?= $image['image']; ?>" alt="product image" height="50px" height="50px">
                                        </div>
            
                                                <div class="row">
            
                                                        <div class="col-md-6">
                                                            <label class="mb-0">Quantity</label class="mb-0">
                                                            <input type="number" name="qty" value="<?= $data['qty']; ?>" class="form-control mb2" placeholder="Enter Quantity">
                                                        </div>
                                                        <div class="col-md-3">
                                <label class="mb-0">Status</label class="mb-0"> <input type="checkbox" name="status" <?= $data['status'] == '0'?'':'checked' ?>>
                                                        </div>
                                                        <div class="col-md-3">
                            <label class="mb-0">Trending</label class="mb-0"> <br>
                            <input type="checkbox" name="trending" <?= $data['trending'] == '0'?'':'checked' ?>> 
                                                        </div>
                                                </div>
                                        
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Title</label class="mb-0">
                                                    <input type="text" name="meta_title" value="<?= $data['meta_title']; ?>"   class="form-control mb2" placeholder="Enter Meta Title">
                                            </div>
            
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Description</label class="mb-0">
                                            <textarea rows="3" name="meta_description" class="form-control mb2" placeholder="Enter Meta Description"><?= $data['meta_description']; ?></textarea>
                                            </div>
            
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Keywords</label class="mb-0">
                                                <textarea rows="3" name="meta_keywords"     class="form-control mb2" placeholder="Enter Meta Keywords"><?= $data['meta_keywords']; ?></textarea>
                                            </div>
            
                                            <div class="col-md-12 mt-2">
                                            <button type="submit" class="btn btn-primary" name="update_product_btn">Finish</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        
                            </div>
                    <?php 
                    }
                    else
                    {
                        echo "Product not available";
                    }
                }                           
                else
                {
                    echo "Id missing from url";
                }
                        ?>


        </div>
    </div>
</div>

<?php include('includes/footer.php');?>