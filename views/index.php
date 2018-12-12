<?php  require_once("../core/includes.php");

    $title = 'Home Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");

?>

<!--landing page-->

    <div class="container">

        <div class="row">
            <div id="landing" class="col-lg-12 text-center">
                <h1 class="blue">Welcome!</h1>
                <h2 class="white">Share your recipes with the world!</h2>
                <br><br>
                <a  href="/signup.php" class="btn btn-recipe text-right">Sign Up</a>
                <a href="/login.php" class="btn btn-recipe text-center">Sign In</a>
                <div id="landingpage">

                </div>
            </div><!-- .col-lg-12 -->
            <!-- <div id="landingpage"></div> -->
        </div><!--.row-->
    </div><!-- .container -->


<?php require_once("../elements/footer.php");
