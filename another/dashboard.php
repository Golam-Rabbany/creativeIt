<?php
session_start();
require_once '../header_footer/header.php';
require_once '../db.php';
require_once 'navbar.php';
require_once 'checking.php';


$get_user_query = "SELECT * FROM creative_users";
$user_db = mysqli_query($db_connect,$get_user_query);


?>


<section>
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">User List</h3> 
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Mobile</th>
                        </thead>

                        <tbody>
                            <?php
                            foreach($user_db as $user):
                            ?>
                            <tr>
                                <td><?=$user['Name'] ?></td>
                                <td><?=$user['Email'] ?></td>
                                <td><?=$user['Number'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<?php
require_once '../header_footer/header.php';
?>
