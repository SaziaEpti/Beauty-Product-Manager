<?php
    $admin_email = "epti@gmail.com";
    $admin_password  = "epti";

    session_start();

     if(isset($_POST['login_btn']))
     {
        if(!empty($admin_email) && !empty($admin_password)){
            if($_POST['admin_email']==$admin_email && $_POST['admin_password'] == $admin_password){
                    $_SESSION['admin_email'] = $admin_email;
                    
                    $_SESSION['success'] = "Admin Login is Successfull";
                    header("Location: dashboard.php");
            }
            else{       
                  $_SESSION['success'] = "Admin User name and password is not correct";
                  header("Location: login.php");
            }
    
        }else{
                $_SESSION['success'] = "Email / password is not type";
                header("Location: login.php");
        }     
    }else{
            header("Location: login.php");
    }
  
   
?>
  