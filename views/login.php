<?php require_once '../core/includes.php';

    $title = 'Login Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");

?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <h1>Login</h1>
                        <hr>
                        <form class="form" action="/users/login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" name="username" >
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" >
                            </div>
                                <input class="btn btn-info" type="submit" value="Login">
                                <hr>
                                <a class=" btn btn-link" href="#">Forgot Password?</a>
                        </form>
                    </div><!-- col-6 col-md-4 -->
                    <div class="col-sm-12 col-md-8">
                        <img id="loginimg" class="img-fluid" src="/views/assets/files/teablue.png" alt="tea cooking vector instructions">
                    </div><!-- .col-12 col-md-8 -->
                </div><!-- .row -->
            </div><!-- .card-body -->
        </div><!-- .card -->
    </div><!-- .container -->







<?php require_once("../elements/footer.php");
