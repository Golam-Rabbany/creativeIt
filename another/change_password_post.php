<?php

    session_start();
    require_once '../db.php';
    $user_email = $_POST['email'];


    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confarm_password = $_POST['confarm_password'];

    if($new_password == $confarm_password){
        if($old_password == $new_password){
            echo "Your old & new pass is same";
        }else{
            $enc_old_pass = md5($old_password);
            $checking_old_pass_query = "SELECT COUNT(*) AS total_users FROM creative_users WHERE email='$user_email' AND password='$enc_old_pass'";
            $from_db = mysqli_query($db_connect,$checking_old_pass_query);
            $assoc_from_db = mysqli_fetch_assoc($from_db);
            
            if($assoc_from_db['total_users'] == 1){
                $enc_new_pass = md5($new_password);
                $update_pass_query = "UPDATE creative_users SET password='$enc_new_pass' WHERE email='$user_email'";
                mysqli_query($db_connect,$update_pass_query);
                $_SESSION['pass_change_done'] = "Change Password Successfully";
                header('location: change_password.php');

            }else{
                $_SESSION['pass_unchange'] = "Your Old Password is Wrong";
            }
        }
    }else{
        echo "wrong";
    }
?>