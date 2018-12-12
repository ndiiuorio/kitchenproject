<?php

class Recipe extends Db {

    function get_all(){

        if( !empty($_GET['search']) ){ //They're searching something

            $search = $this->params['search'];

            $sql = "SELECT recipes.*, users.username, users.firstname, users.lastname FROM recipes LEFT JOIN users ON recipes.user_id = users.id WHERE recipes.title LIKE '%$search%' OR recipes.instructions = '%$search%' OR recipes.ingredients = '%$search%' OR CONCAT(users.firstname, ' ', users.lastname) LIKE '%$search%' ORDER BY recipes.id DESC";

        }else{//they're not searching
            $sql = "SELECT recipes.*, users.username, users.firstname, users.lastname FROM recipes LEFT JOIN users ON recipes.user_id = users.id ORDER BY recipes.id DESC";
        }


        $recipes = $this->select($sql);

        return $recipes;
    }

    function get_all_by_user(){

        $user_id = $_SESSION['user_logged_in'];

        if( !empty($_GET['search']) ){ //They're searching something

            $search = $this->params['search'];

            $sql = "SELECT recipes.*, users.username, users.firstname, users.lastname FROM recipes LEFT JOIN users ON recipes.user_id = users.id WHERE recipes.title LIKE '%$search%' OR recipes.description OR CONCAT(users.firstname, ' ', users.lastname) LIKE '%$search%' AND users.id = '$user_id' ORDER BY recipes.posted_time DESC";

        }else{//they're not searching
            $sql = "SELECT recipes.*, users.username, users.firstname, users.lastname FROM recipes LEFT JOIN users ON recipes.user_id = users.id WHERE users.id = '$user_id' ORDER BY recipes.id DESC";
        }

        $recipes = $this->select($sql);

        return $recipes;
    }

    function add(){

        $title = $this->data['title'];
        $ingredients = $this->data['ingredients'];
        $instructions = $this->data['instructions'];
        $user_id = (int)$_SESSION['user_logged_in'];
        $util = new Util;
        $filename = $util->file_upload();


        $sql = "INSERT INTO recipes (title, ingredients, filename, instructions, user_id) VALUES ('$title', '$ingredients', '$filename', '$instructions', '$user_id')";

        $this->execute($sql);

    }

    function get_by_id($id){

        $id = (int)$id;

        $sql = "SELECT * FROM recipes WHERE id = '$id'";

        $recipe = $this->select($sql)[0];

        return $recipe;

    }

    function edit($id){

        $id = (int)$id;
        $this->check_ownership($id);//make sure user owns post that's being edited

        $title = $this->data['title'];
        $ingredients = $this->data['ingredients'];
        $instructions = $this->data['instructions'];

        $current_user_id = (int)$_SESSION['user_logged_in'];

        if ( !empty($_FILES['fileToUpload']['name']) ) { // check if new file submitted

            // delete the old project image file
            $old_project_image = trim($this->get_by_id($id)['filename']);
            if ( !empty($old_project_image) ) {
                if ( file_exists(APP_ROOT.'/views/assets/files/'.$old_project_image)) {
                unlink( APP_ROOT.'/views/assets/files/'.$old_project_image );
                }
            }

            $util = new Util;
            $filename = $util->file_upload();

            $sql ="UPDATE recipes SET title='$title', ingredients='$ingredients', instructions='$instructions', filename='$filename' WHERE id='$id' AND user_id='$current_user_id'";

            $this->execute($sql);


        }else { // if no new file was submitted
            $sql ="UPDATE recipes SET title='$title', ingredients='$ingredients', instructions='$instructions' WHERE id='$id' AND user_id='$current_user_id'";

            $this->execute($sql);
        }
    }

    //delete post function
    function delete(){

        $current_user_id = (int)$_SESSION['user_logged_in'];
        $id = (int)$_GET['id'];
        $this->check_ownership($id);

        // delete the old project image file
        $recipe_image = trim($this->get_by_id($id)['filename']);
        if ( !empty($recipe_image) ) {
            if ( file_exists(APP_ROOT.'/views/assets/files/'.$recipe_image)) {
            unlink( APP_ROOT.'/views/assets/files/'.$recipe_image );
            }
        }

        $sql = "DELETE FROM recipes WHERE id='$id' AND user_id='$current_user_id'";
        $this->execute($sql);

    }



    //this makes it so you cant edit a post if you don't own it
    function check_ownership($id){

        $id = (int)$id;

        $sql = "SELECT * FROM recipes WHERE id = '$id'";

        $recipe = $this->select($sql)[0];

        if ( $recipe['user_id'] == $_SESSION['user_logged_in'] ) {
            return true;
        }else {
            header("Location: /");
            exit();
        }

    }
}
