<?php require_once '../../core/includes.php';



if( !empty($_POST['title']) && !empty($_POST['instructions']) && !empty($_POST['ingredients']) && !empty($_FILES['fileToUpload']['name']) ){ // Form was submitted

    // Add new project to db
    $p = new Recipe;
    $p->add();

}

header("Location: /recipes/");
