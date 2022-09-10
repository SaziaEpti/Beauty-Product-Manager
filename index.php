<?php
include ('db/config.php');
?>
 

 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@200;300;400&display=swap"
        rel="stylesheet">

    <title>Hello, world!</title>
  </head>
  <body>

 
  <div style="margin-top: 80px;">

</div>
<!-- Header Section -->

<header class="fixed-top" id="header">
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container">
                <h1 id="logo">
                    Beauty Product 
                    <sub id="subTxt">Shop</sub>
                </h1>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    
                </ul>
                <a href="login.php"><button class="btn btn-primary">Admin Login</button></a>
            </div>
        </div>
    </nav>
</header>

<!-- DataTales Example -->
<div class="card mb-4">
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

                    <th>Product Name</th>
                    <th>Sales Price</th>
                    <th>Original Price</th>
                    <th>Product Details	</th>
                    <th>Category</th>
                    <th>Stock Limit</th>
                    <th>Sales Items</th>
                    <th>photo</th>
                   
                     
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
    
                    <th>Product Name</th>
                    <th>Sales Price</th>
                    <th>Original Price</th>
                    <th>Product Details	</th>
                    <th>Category</th>
                    <th>Stock Limit</th>
                    <th>Sales Items</th>
                    <th>photo</th>
                  
                </tr>
            </tfoot>
            <tbody>
                
                 <?php

                 if(mysqli_num_rows($query_run) > 0){
                    while($row = mysqli_fetch_array($query_run)){
                        ?>
                <tr>
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
                            <?php echo '<img src='.$row['photo'].' alt="Product Image" width="200px">'; ?>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>