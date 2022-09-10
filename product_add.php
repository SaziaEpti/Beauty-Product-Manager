<?php
include ('security.php');
include ('includes/header.php');
include ('includes/navbar.php');
?>


  <div class="container-fluid">


        <div class="container">
                <!-- Button trigger modal -->
                <h2 class='text-center title'>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalLong">
                    Add Product 
                </button>
                </h2>  
                <img src="img/cream-face.jpg" alt="" width="1140" height="600px">
                <?php 
                                     
                                     if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
                                         echo '<h6 class="text-center " style="color:red">'. $_SESSION['success'].'</h6>';
                                         unset($_SESSION['success']);
                                        
                                     }
                                     ?>
    

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="add_product_action.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class='form-control' name='product_name' placeholder='Product Name'>
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='sales_price' placeholder='Product Sales Pice'>
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='original_price' placeholder='Product Original Price'>
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='product_details' placeholder='Product Details'>
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='category' placeholder='Product Category'>
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='stock_limit' placeholder='Product Stock'>
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='sales_items' placeholder='Product Sales Items'>
                            </div>
                            <div class="form-group">
                                <input type="file" class='form-control' name='photo' placeholder='Product Photo'>
                                <label for="">Please upload product photo</label>
                            </div>
                            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name='add_product'>Add Product</button>
                </div>
            </form>

            </div>
     
        </div>
        </div>
       </div>



 


<?php
include ('includes/script.php');
include ('includes/footer.php');
?>