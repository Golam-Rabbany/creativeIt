<?php
session_start();
require_once('db.php'); 

$data_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
// echo "<br>";
$data_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) ;
// echo "<br>";
$data_number =filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT) ;
// echo "<br>";
$data_pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
// echo "<br>";



$str_cap =preg_match('@[A-Z]@',$data_pass);
$str_sml = preg_match('@[a-z]@',$data_pass);
$str_nmbr = preg_match('@[0-9]@',$data_pass);
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$str_pattern = preg_match($pattern,$data_pass);




if($data_name == NULL || $data_email == NULL || $data_number == NULL || $data_pass == NULL){
    $_SESSION['sign_in_error'] = "Enter your all Bio";
    header('location: main_form.php');
}else{
    if(strlen($data_number) == 11){
        $checking_mail = "SELECT COUNT(*) AS total_users FROM creative_users WHERE Email='$data_email'";
        $transfer_query = mysqli_query($db_connect,$checking_mail);
        $convert_array = mysqli_fetch_assoc($transfer_query);
        if($convert_array['total_users'] == 0){
            if($convert_array){
                if(strlen($data_pass) >= 3 && $str_cap == 1 && $str_sml == 1 && $str_nmbr == 1 && $str_pattern ==1){
                    $encript_pass = md5($data_pass);
                    $insert_query = "INSERT INTO creative_users(name,email,number,password) VALUES('$data_name','$data_email','$data_number','$encript_pass')";
                    mysqli_query($db_connect,$insert_query);
                    $_SESSION['reg_success'] = "Congress!! All done";

                    header('location: main_form.php');
                }else{
                    $_SESSION['sign_in_error'] = "You need more strong Password";
                    header('location: main_form.php');
                }
            }else{
                $_SESSION['sign_in_error'] = "invalied email";
                header('location: main_form.php');
            }
        }else{
            $_SESSION['sign_in_error'] = "already registered";
            header('location: main_form.php');
        }
    }else{
        $_SESSION['sign_in_error'] = "plz enter 3 number";
        header('location: main_form.php');
    }
}




?>
