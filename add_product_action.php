<?php
include ('db/config.php');
include ('security.php');
?>

<?php 

// Add Product

if(isset($_POST['add_product'])){

    $product_name = $_POST['product_name'];
    $sales_price = $_POST['sales_price'];
    $original_price = $_POST['original_price'];
    $product_details = $_POST['product_details'];
    $category = $_POST['category'];
    $stock_limit = $_POST['stock_limit'];
    $sales_items = $_POST['sales_items'];
    $photo = $_FILES['photo'];


    $imageLocation = $_FILES['photo']['tmp_name'];
    $imageName = $_FILES['photo']['name'];
    $image_des = "img/".$imageName;
    
 
if(!empty($product_name) && !empty($sales_price) && !empty($original_price) && !empty($product_details) &&!empty($category) && !empty($stock_limit) && !empty($sales_items) && !empty($photo)){

    $query = "INSERT INTO `product`(`name`, `sales_price`, `original_price`, `product_details`, `category`, `stock_limit`, `sales_items`, `photo`) VALUES ('$product_name','$sales_price','$original_price','$product_details','$category','$stock_limit','$sales_items','$image_des')";

    $query_run = mysqli_query($db_conn, $query);
    

    if($query_run){

        move_uploaded_file($imageLocation,$image_des);

        $_SESSION['success'] = "Product is added";
        header('Location: product_view.php');
    }
    else{
        $_SESSION['success'] = " Product is not added";
        header('Location: product_add.php');
    }

}else{
  $_SESSION['success'] = "Something is wrong";
  header('Location: product_add.php');
} 
   
}




// Edit Product

if(isset($_POST['update_btn'])){  

    $id = $_POST['edit_id'];
    $product_name = $_POST['product_name'];
    $sales_price = $_POST['sales_price'];
    $original_price = $_POST['original_price'];
    $product_details = $_POST['product_details'];
    $category = $_POST['category'];
    $stock_limit = $_POST['stock_limit'];
    $sales_items = $_POST['sales_items'];
    $photo = $_FILES['photo'];

    $imageLocation = $_FILES['photo']['tmp_name'];
    $imageName = $_FILES['photo']['name'];
    $image_des = "img/".$imageName;
    

    $query = "UPDATE `product` SET `name`='$product_name',`sales_price`='$sales_price',`original_price`='$original_price',`product_details`='$product_details',`category`='$category',`stock_limit`='$stock_limit',`sales_items`='$sales_items',`photo`='$image_des' WHERE id = '$id'";

    $query_run = mysqli_query($db_conn,$query);

    if($query_run){
        move_uploaded_file($imageLocation,$image_des);
       // echo "<script>alert('Success')</script>";
        $_SESSION['success'] = "Product is update successfully";
        header ('Location: product_view.php');
    }else{
        $_SESSION['success'] = "Data is not Updated";
        header ('Location: product_view.php');
    }

}





?>
