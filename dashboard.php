<?php
include ('db/config.php');
 include('security.php');
 include ('includes/header.php');
 include ('includes/navbar.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <?php 
                                       
                           if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
                            echo '<h6 class="text-center admin_error">'. $_SESSION['success'].'</h6>';
                            unset($_SESSION['success']);
                                          
                      }
                     ?>
                           <div class="container text-center">
                                <h1 class="newtext">Beauty Product Management Admin Panel</h1>
                           </div>        
                         
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Number of Product</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    
                                                    $query = "SELECT `id` FROM `product` ORDER BY `id`";
                                                    $query_run= mysqli_query($db_conn,$query);
                                                    $row = mysqli_num_rows($query_run); 
                                                                                            
                                                ?>
                                                 <h4><?php echo '<p> Product => '.$row.'	</h3>';  ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
 


                        
                            
                        
 
                    </div>

                    
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


<?php
include('includes/script.php');
 include('includes/footer.php');
?>