<?php
session_start();
require_once '../header_footer/header.php';
require_once '../db.php';
require_once 'navbar.php';
require_once 'checking.php';

$login_email = $_SESSION['admin_email'];


$get_profile_query = "SELECT name,number FROM creative_users WHERE email = '$login_email'";
$user_db = mysqli_query($db_connect,$get_profile_query);
$after_assoc = mysqli_fetch_assoc($user_db);

?>


<section>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Profile List</h3>
                    <a class="btn btn-primary btn-sm" href="profile_edit.php">Edit</a>
                </div>
                <div class="card-body">
                    <p><strong class="card-title">User Name: </strong><?=$after_assoc['name']?></p>
                    <p><strong class="card-title">User Number: </strong><?=$after_assoc['number']?></p>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<?php
require_once '../header_footer/header.php';
?>
