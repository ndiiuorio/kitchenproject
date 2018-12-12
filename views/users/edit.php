<?php
require_once '../../core/includes.php';

$u = new User;

if ( !empty($_POST) ) {
    $u->edit();
    header("Location: /profile.php");
    exit();
}

$user = $u->get_by_id($_SESSION['user_logged_in']);

$title = 'Edit Profile';
require_once '../../elements/html_head.php';
require_once '../../elements/nav.php';
?>


<section class="splash">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <h1>Edit Profile</h1>
                        <hr>
                        <form class="form" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" name="username" value="<?=$user['username']?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password"  placeholder="Leave empty to keep your password">
                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input class="form-control" type="text" name="firstname" value="<?=$user['firstname']?>">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input class="form-control" type="text" name="lastname" value="<?=$user['lastname']?>">
                            </div>
                                <input class="btn btn-info" type="submit" value="Save Profile">
                        </form>
                    </div><!--col-6 col-md-4-->
                    <div class="col-12 col-md-8">
                        <img id="signupimg" class="img-fluid" src="/views/assets/files/sign-in-card.jpg" alt="">
                    </div><!--.col-12 col-md-8-->
                </div><!--.row-->
            </div><!--.card-body-->
        </div><!--.card-->
    </div><!--.container-fluid-->
</section><!--.signup-splash-->








<?php
require_once '../../elements/footer.php';
?>
