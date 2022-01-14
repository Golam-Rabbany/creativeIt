<?php
require_once '../../db.php';

$id = $_GET['msg_id'];
$delete_msg = "DELETE FROM guest_messages WHERE id=$id";
mysqli_query($db_connect,$delete_msg);

header('location: guest_msg_show.php');

?>