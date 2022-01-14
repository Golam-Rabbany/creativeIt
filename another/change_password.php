<?php
session_start();
require_once '../header_footer/header.php';
require_once '../db.php';
require_once 'navbar.php';
require_once 'checking.php';

$login_email = $_SESSION['admin_email'];

?>


<section>
    <div class="container">
        <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-4 ">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['pass_change_done'])){
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                    echo $_SESSION['pass_change_done'];
                                    unset($_SESSION['pass_change_done']);
                                ?>
                            </div>
                        <?php
                                }
                    ?>


                    <form action="change_password_post.php" method="post">
                                <div class="">
                                    <label for="" class="form-label">Old Password</label>
                                    <input type="hidden" class="form-control" name="email" value="<?=$login_email?>">
                                    <input type="password" class="form-control" name="old_password" value="">
                                </div>
                                <div class="">
                                    <label for="" class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="new_password" value="">
                                </div>
                                <div class="">
                                    <label for="" class="form-label">Confarm Password</label>
                                    <input type="password" class="form-control" name="confarm_password" value="">
                                </div>
                                <button type="submit" class="btn btn-warning mt-2" >Submit</button>
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
