<?php  require_once("../../core/includes.php");

    if ( !empty($_GET) ) {

        $p = new Recipe;
        $recipe = $p->get_by_id($_GET['id']);

        if ( !empty($_POST) ) {
            $p->edit($_GET['id']);
            header("Location: /recipes/index.php");
            exit();
        }

    }else {
        header("Location: /recipes/index.php");
        exit();
    }

    // unique html head vars
    $title = 'Edit Recipe';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");

?>


<section class="splash">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form class="form" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <h2 class="blue">Edit Recipe</h2>
                            <img id="img-preview"  class="img-fluid" src="/assets/files/<?=$recipe['filename']?>">
                            <br>
                            <div class="form-group">
                                <input id="file-with-preview" type="file" name="fileToUpload" onchange="previewFile()">
                            </div><!-- .form-group -->
                        </div><!-- .col-md-4 -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Recipe Title</label>
                                <input class="form-control" type="text" name="title" value="<?=$recipe['title']?>">
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label>Ingredients</label>
                                <textarea name="ingredients" class="form-control"><?=$recipe['ingredients']?></textarea>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label>Instructions</label>
                                <textarea name="instructions" class="form-control"><?=$recipe['instructions']?></textarea>
                            </div><!-- .form-group -->
                            <input class="btn btn-info" type="submit" value="Submit">
                        </form>
                    </div><!-- .col-md-8 -->
                </div><!-- .row -->
            </div><!-- .card-body -->
        </div><!-- .card -->
    </div><!-- .container -->
</section><!-- section.splash -->



<?php require_once("../../elements/footer.php");
