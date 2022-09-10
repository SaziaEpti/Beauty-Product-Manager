<?php
include ('db/config.php');
include ('security.php');
include ('includes/header.php');
include ('includes/navbar.php');
?>



<div class="cotainer-fluid">

<div class="container">
 <!-- DataTales Example -->
 <div class="card  mb-4">
        <div class="card-header py-3 bg-primary">
          <h6 class="m-0 font-weight-bold text-center text-white">Update Poduct</h6>    
       </div>
        
       <div class="container">
        <div class="card-body">

        <?php 
                if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
                    echo '<h4 class="text-center admin-error">'. $_SESSION['success'].'</h4>';
                    unset($_SESSION['success']);
                   
                }
        ?>
          
            <?php 
                // Edit Button Actions 
                if(isset($_POST['edit_btn'])){
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM `product` WHERE id = '$id'";
                    $query_run = mysqli_query($db_conn,$query);
                

                    foreach($query_run as $row)
                    {
                        ?>
                         <form action="add_product_action.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="text" class='form-control' name='product_name' placeholder='Product Name' value="<?php echo $row['name']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='sales_price' placeholder='Product Sales Pice' value="<?php echo $row['sales_price']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='original_price' placeholder='Product Original Price' value="<?php echo $row['original_price']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='product_details' placeholder='Product Details' value="<?php echo $row['product_details']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='category' placeholder='Product Category' value="<?php echo $row['category']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='stock_limit' placeholder='Product Stock' value="<?php echo $row['stock_limit']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class='form-control' name='sales_items' placeholder='Product Sales Items' value="<?php echo $row['sales_items']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="file" class='form-control' name='photo' placeholder='Product Photo' value="<?php echo $row['photo']; ?>">
                                <label for="">Please upload product photo</label>
                            </div>
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                            <button type='submit' class='btn btn-primary' name='update_btn'> Update </button>
                            
                        </form>
                         <br>
                         <div class="d-flex justify-content-end">
                         <a href='product_view.php'><button type='submit' class='btn btn-primary '> CANCEL </button></a>
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
 



  
 


<?php
include ('includes/script.php');
include ('includes/footer.php');
?>