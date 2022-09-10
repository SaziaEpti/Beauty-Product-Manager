<?php
include ('db/config.php');
include ('security.php');
?>

<?php
// Delete Product

if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];
    $query = "DELETE FROM `product` WHERE `id`= '$id' ";
    $query_run = mysqli_query($db_conn,$query);
    if($query_run){
        $_SESSION['delete'] = "Product is Delete Successfully";
        header('Location: product_view.php');
    }else{
        $_SESSION['delete'] = "Error while delete";
        header('Location: product_view.php');
    }
}

?>


