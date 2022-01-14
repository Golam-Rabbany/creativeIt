<?php
session_start();
require_once '../../db.php';
require_once "again_navbar.php";

if(!isset($_SESSION['user_status'])){
    header('location: ../../login.php');
}

$get_message_query = "SELECT * FROM guest_messages";
$message_from_db = mysqli_query($db_connect,$get_message_query);



?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4 class="card-title">Guest Message List</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Id</th>
                                <th>Guest Name</th>
                                <th>Guest Email</th>
                                <th>Guest Subject</th>
                                <th>Guest Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php     foreach($message_from_db as $key=> $message): ?>
                                    <tr class=" <?php echo
                                    ($message['read_status']==1)? "bg-info" : "text-dark"
                                    ?> ">
                                        <td><?=$key?></td>
                                        <td><?=$message['guest_name']?></td>
                                        <td><?=$message['guest_email']?></td>
                                        <td><?=$message['guest_subject']?></td>
                                        <td><?=$message['guest_message']?></td>
                                        <td>
                                            <?php
                                                if($message['read_status']==1):  ?>
                                                    <a href="msg_read.php?msg_id=<?=$message['id']?>" class="btn btn-info">Mark as Read</a>
                                                <?php  endif ?>
                                                <a href="msg_delete.php?msg_id=<?=$message['id']?>" class="btn btn-danger">Delete</a>
                                        </td>
                             

                                    </tr>
                                <?php      endforeach  ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

// require_once '../../header_footer/footer.php';

?>