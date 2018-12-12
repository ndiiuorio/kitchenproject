<?php require_once("../../core/includes.php");
    $title = 'Recipes Page';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");

?>

    <div class="container">



        <div class="card">
            <div class="card-body">
                <form class="form" action="/recipes/add.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <h2 class="blue">Upload a Recipe</h2>
                            <div class="form-group">
                                <input id="file-with-preview" type="file" name="fileToUpload" onchange="previewFile()" required>
                            </div><!-- .form-group -->
                        </div><!-- .col-md-4 -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Recipe Title</label>
                                <input class="form-control" type="text" name="title" value="" required>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label>Ingredients</label>
                                <textarea name="ingredients" class="form-control" required></textarea>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label>Instructions</label>
                                <textarea name="instructions" class="form-control" required></textarea>
                            </div><!-- .form-group -->
                            <input class="btn btn-info" type="submit" value="Upload">
                        </form>
                    </div><!-- .col-md-8 -->
                </div><!-- .row -->
            </div><!-- .card-body -->
        </div><!-- .card -->
    </div><!--container-->

    <hr class="seperate">
    <h1 class="text-center white"> Recipes</h1>

     <div class="container">
           <div class="col-md-12">
               <div class="form-group">
                   <form method="get">
                       <div class="form-group title-center">
                           <label>Search</label>
                           <input type="text" name="search">
                          <input class="btn btn-info title-center" type="submit" value="Search">
                      </div>
                   </form>
               </div><!--.form-group-->
           </div><!--.col-md-12-->
   </div><!-- .container -->


<!--{posts}-->

<div class="container">
    <div class="row">
        <?php
        $r = new Recipe;
        $recipes = $r->get_all();

        foreach($recipes as $recipe){
        ?>
        <div class="col-sm-4">
            <h2 class="title-center blue">
            <?php
            if (strlen($recipe['title']) > 20){
                echo substr($recipe['title'], 0, 20) . '...';
            }else{
                echo $recipe['title'];
            }
            ?>
            </h2>

            <h6 class="blue center">Posted By: <?=$recipe['username']?>
            <?php
            if ($_SESSION['user_logged_in'] == $recipe['user_id']){
            ?>
                <a href="/views/recipes/edit.php?id=<?=$recipe['id']?>">
                    <i class="far fa-edit" aria-hidden="true"></i>
                </a>
                <a class="delete-btn text-danger delete-btn" href="/views/recipes/delete.php?id=<?=$recipe['id']?>">
                    <i class="far fa-trash-alt" aria-hidden="true"></i>
                </a>
            <?php } ?>
            </h6>
                <a  href="/recipes/view.php?id=<?=$recipe['id']?>">
                    <div class="your-recipes-imgs" style= "background: url(/assets/files/<?=$recipe['filename']?>)"></div>
                </a>
                <br>
                <hr class="recipe_hr">
        </div><!-- .col-sm-4 -->
        <br>
        <?php } // END FOREACH ?>
    </div><!-- .row -->
</div><!-- .container -->

<?php require_once("../../elements/footer.php");
