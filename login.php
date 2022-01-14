<?php
    session_start();

    if(isset($_SESSION['user_status'])){
        header('location: ../login.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative_IT</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="card-title d-flex justify-content-between">
                            <h3>Log In Form</h3>
                            <a href="main_form.php" style="text-decoration: none; margin-top: 5px; color:darkturquoise; font-weight: bold;">Register</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_SESSION['log_in_error'])){
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                    echo $_SESSION['log_in_error'];
                                    unset($_SESSION['log_in_error']);
                                ?>
                            </div>
                        <?php
                                }
                        ?>
                        
                        <form action="login_form.php" method="post">
                            <div class="">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    








    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</body>
</html>