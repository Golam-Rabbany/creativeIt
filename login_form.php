<?php
    session_start();
    require_once 'db.php';

    $user_mail = $_POST['email'];
    $user_pass = md5($_POST['password']);

    if($user_mail == NULL || $user_pass == NULL){
        $_SESSION['log_in_error'] = "Enter all bio";
        header('location: login.php');
    }else{
        $checking_query = "SELECT  COUNT(*) AS total_users FROM creative_users WHERE email = '$user_mail' AND password = '$user_pass'";
        $result_from_db = mysqli_query($db_connect,$checking_query);
        $after_assoc = mysqli_fetch_assoc($result_from_db);
        if($after_assoc['total_users'] == 1){
            $_SESSION['admin_email'] = $user_mail;
            $_SESSION['user_status'] = "yes";
            header('location: another/dashboard.php');
        }else{
            $_SESSION['log_in_error'] = "Register First or incorrect Password";
            header('location: login.php');
        }

    }


?>