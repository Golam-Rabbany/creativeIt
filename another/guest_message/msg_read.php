<?php
require_once '../../db.php';

$id = $_GET['msg_id'];

$upadte_msg = "UPDATE guest_messages SET read_status=2 WHERE id=$id";
mysqli_query($db_connect,$upadte_msg);
header('location: guest_msg_show.php');



?>