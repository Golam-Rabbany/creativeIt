<?php
    session_start();
    require_once '../db.php';

    $email = $_POST['email'];
    $name = $_POST['name'];
    $number = $_POST['number'];

    $update_query = "UPDATE creative_users SET name='$name', number='$number' WHERE email='$email'";
    mysqli_query($db_connect,$update_query);
    header('location: profile.php');
?>