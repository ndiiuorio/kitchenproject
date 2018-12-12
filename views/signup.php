<?php require_once("../core/includes.php");
$title = 'Sign Up Page';
require_once("../elements/html_head.php");
require_once("../elements/nav.php");
?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <h1>Sign Up</h1>
                        <hr>
                        <form class="form" action="/users/add.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" name="username" value="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" value="">
                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input class="form-control" type="text" name="firstname" value="">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input class="form-control" type="text" name="lastname" value="">
                            </div>
                                <input class="btn btn-info" type="submit" name="Submit" value="Sign Up">
                                <hr>
                                <a class="btn btn-link" href="/views/login.php">Already have an account?</a>
                        </form>
                    </div><!--col-6 col-md-4-->
                    <div class="col-sm-12 col-md-8">
                        <img id="signupimg" class="img-fluid" src="/assets/files/profiledirect.png" alt="">
                    </div><!--.col-12 col-md-8-->
                </div><!--.row-->
            </div><!--.card-body-->
        </div><!--.card-->
    </div><!--.container-fluid-->







<?php require_once("../elements/footer.php");
