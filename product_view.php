<?php
include ('db/config.php');
include ('security.php');
include ('includes/header.php');
include ('includes/navbar.php');
?>


  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 text-center">Beauty Product is Here</h1>
 

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">All Product</h6>
    <?php 
                                      
          if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
            echo '<h6 class="text-center" style="color:green">'. $_SESSION['success'].'</h6>';
            unset($_SESSION['success']);
            }
     ?>
    
</div>
<div class="card-body">

    <?php 
            if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
                echo '<h4 class="text-center admin-error">'. $_SESSION['status'].'</h4>';
                unset($_SESSION['status']);
               
            }
            else if(isset($_SESSION['delete']) && $_SESSION['delete'] !=''){
                echo '<h4 class="text-center admin-error" style="color:red">'. $_SESSION['delete'].'</h4>';
                unset($_SESSION['delete']);
               
            }else if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
                echo '<h4 class="text-center admin-error">'. $_SESSION['success'].'</h4>';
                unset($_SESSION['success']);
               
            }


    ?>
    <div class="table-responsive">    

<?php 
    $query = "SELECT * FROM `product`";
    $query_run = mysqli_query($db_conn,$query);
?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Sales Price</th>
                    <th>Original Price</th>
                    <th>Product Details	</th>
                    <th>Category</th>
                    <th>Stock Limit</th>
                    <th>Sales Items</th>
                    <th>photo</th>
                    <th>Operation</th>
                     
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Sales Price</th>
                    <th>Original Price</th>
                    <th>Product Details	</th>
                    <th>Category</th>
                    <th>Stock Limit</th>
                    <th>Sales Items</th>
                    <th>photo</th>
                    <th>Operation</th>
                </tr>
            </tfoot>
            <tbody>
                
                 <?php

                 if(mysqli_num_rows($query_run) > 0){
                    while($row = mysqli_fetch_array($query_run)){
                        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['sales_price']; ?></td>
                    <td><?php echo $row['original_price']; ?></td>
                    <td><?php echo $row['product_details']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                     
                    <td>
                        <?php echo $row['stock_limit']; ?>
                    </td>
                    <td>
                        <?php echo $row['sales_items']; ?>
                    </td>
                    <td>                            
                            <?php echo '<img src='.$row['photo'].' alt="Product Image" width="150px">'; ?>
                     </td>
                    
                    
                    <td>

                        <form action="product_edit.php" method="post">
                             <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                             <button type="submit" class='btn btn-success' name='edit_btn'>Edit</button> 
                         </form>
                         <br>
                         <form action="product_delete.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class='btn btn-danger' name='delete_btn'>Delete</button>
                        </form>
                        

                          
                    </td>
                        
                                  
                </tr>    
                       
                        <?php
                    }

                 }else{
                    echo "No Product Found in Store";
                 }
                 ?>
                
                
            </tbody>
        </table>
    </div>
</div>
</div>

</div>

 


<?php
include ('includes/script.php');
include ('includes/footer.php');
?>