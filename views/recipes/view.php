<?php require_once("../../core/includes.php");
    $title = 'View Recipe Page';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");

?>
<?php
$r = new Recipe;
$recipe =$r->get_by_id($_GET['id']);
?>

<div class="container-fluid">
    <div  class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-fluid" src="/assets/files/<?=$recipe['filename']?>">
                </div><!--col-md-3-->
                <div class="col-md-9">
                    <h1 class="blue title-center"><?=$recipe['title']?></h1>
                    <h4 class="blue">Ingredients</h4>
                    <p><pre><?=$recipe['ingredients']?></pre></p>
                    <h4 class="blue">Instructions</h4>
                    <p><pre><?=$recipe['instructions']?></pre></p>
                </div><!--col-md-8-->

            </div><!--row-->

            <?php
            if ($_SESSION['user_logged_in'] == $recipe['user_id']){
            ?>
            <br><br>
            <div class="">
                <a href="/views/recipes/edit.php?id=<?=$recipe['id']?>">
                    <i class="btn btn-info" aria-hidden="true">Edit Post</i>
                </a>
                <a class="delete-btn text-danger delete-btn" href="/views/recipes/delete.php?id=<?=$recipe['id']?>">
                    <i class="btn btn-info" aria-hidden="true">Delete Post</i>
                </a>
            </div>
            <?php } ?>
            <br>

                <a href="/recipes/index.php" class="btn btn-info">Back to Recipes</a>
        </div><!-- .card-body -->
    </div><!--recipepane-->
</div><!-- .container -->
<?php require_once("../../elements/footer.php");
