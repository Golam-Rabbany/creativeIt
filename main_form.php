<?php
    session_start();
    require_once 'header_footer/header.php';

    if(isset($_SESSION['user_status'])){
        header('location: another/dashboard.php');
    }
?>


    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="card-title d-flex justify-content-between">
                            <h3>Creative Form</h3>
                            <a href="login.php" style="text-decoration: none; margin-top: 5px; color:darkturquoise; font-weight: bold;">Log In</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_SESSION['sign_in_error'])){
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['sign_in_error'];
                                    unset($_SESSION['sign_in_error']);
                                ?>
                            </div>
                        <?php
                                }
                        ?>

                        <?php
                            if(isset($_SESSION['reg_success'])){
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                    echo $_SESSION['reg_success'];
                                    unset($_SESSION['reg_success']);
                                ?>
                            </div>
                        <?php
                                }
                        ?>
                        
                    
                        <form action="creative.php" method="post">
                            <div class="">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="">
                                <label for="" class="form-label">Number</label>
                                <input type="number" class="form-control" name="number">
                            </div>
                            <div class="">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    




<?php
require_once 'header_footer/footer.php';
?>