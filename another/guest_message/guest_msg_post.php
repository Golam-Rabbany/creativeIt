<?php

session_start();
require_once '../../db.php';
// print_r($_POST);

$guest_name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];
$guest_subject = $_POST['guest_subject'];
$guest_message = $_POST['guest_message'];

$flag = true;
if(!$guest_name){
    $_SESSION['guest_name_error'] = "Fill first";
    $flag = false;
}
if(!$guest_email){
    $_SESSION['guest_email_error'] = "Fill first";
    $flag = false;
}
if(!$guest_subject){
    $_SESSION['guest_subject_error'] = "Fill first";
    $flag = false;
}
if(!$guest_message){
    $_SESSION['guest_message_error'] = "Fill first";
    $flag = false;
}



if($flag){
    $msg_insart_query = "INSERT INTO guest_messages (guest_name,guest_email,guest_subject,guest_message) VALUES('$guest_name','$guest_email','$guest_subject','$guest_message')";
    mysqli_query($db_connect,$msg_insart_query);

    $_SESSION['guest_msg_done'] = "Your msg received successfully";
    header('location: ../../index.php');
}else{
    header('location: ../../index.php');
}


?>