<?php require_once '../core/includes.php';

    $title = 'Login Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");

?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div id="profilebuttons"><!-- #profilebuttons -->
                            <img id="profileimage" class="img-fluid" src="/assets/files/proifile-icon.png" alt="profile clipart icon">
                            <hr>
                            <a href="http://www.google.com" target="_blank"><i class="fab fa-google-plus-square fa-2x"></i></a>
                            <a href="http://www.facebook.com" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a>
                            <a href="http://www.instagram.com" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                            <a href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a>
                            <br><br>
                            <a class="btn btn-info justify-content-center" href="/users/edit.php">Edit Profile</a>
                        </div>
                    </div><!-- .col-md-4 -->

                    <div class="col-md-6">
                        <h1><?=$user['firstname'] . ' ' . $user['lastname']?></h1>
                        <h3>Username: <?=$user['username']?></h3><!--php here-->
                        <hr>
                        <div class="row">
                            <div class="col-md-10 text-center">
                                <img id="profile-decoration" class="img-fluid" src="/assets/files/cooking.png" alt="recipe vector image">
                            </div><!-- .col-md-3 -->
                            <br>
                            <div class="col-md-2 vertical-center">
                                <a href="/recipes/index.php" class="btn btn-info">Browse Recipes</a>
                            </div><!-- .col-md-3 -->
                        </div><!-- .row -->
                    </div><!-- .col-md-6 -->
                </div><!-- .row -->
            </div><!-- .card-body -->
        </div><!-- .card -->

        <hr class="seperate">
        <h1 class="text-center white"> Your Recipes</h1>
        <div class="row">
            <?php
            $r = new Recipe;
            $recipes = $r->get_all_by_user();

            foreach($recipes as $recipe){
            ?>
                <div class="col-md-4">
                    <a href="/recipes/view.php?id=<?=$recipe['id']?>">
                        <h3 class="blue center"><?=$recipe['title']?></h3>
                        <div class="your-recipes-imgs" style="background: url(/assets/files/<?=$recipe['filename']?>);"></div>
                    </a>
                </div><!-- .col-md-4 -->
            <?php } ?>
        </div><!-- .row -->
    </div><!-- .container -->




<?php require_once("../elements/footer.php");
