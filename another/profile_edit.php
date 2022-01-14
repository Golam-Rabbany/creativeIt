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
                    <h3 class="card-title">Profile Edit</h3>
                </div>
                <div class="card-body">
                    <form action="profile_edit_post.php" method="post">
                                <div class="">
                                    <label for="" class="form-label">User Name</label>
                                    <input type="hidden" class="form-control" name="email" value="<?=$login_email?>">
                                    <input type="text" class="form-control" name="name" value="<?=$after_assoc['name']?>">
                                </div>
                                <div class="">
                                    <label for="" class="form-label">User Number</label>
                                    <input type="text" class="form-control" name="number" value="<?=$after_assoc['number']?>">
                                </div>
                                <button type="submit" class="btn btn-info mt-2" >Submit</button>
                            </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<?php
require_once '../header_footer/header.php';
?>
