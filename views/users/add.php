<?php
require_once '../../core/includes.php';


if( !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) ){


    $u = new User;


    $exists = $u->exists();

    if( empty($exists) ){
        $new_user_id = $u->add();
        $_SESSION['user_logged_in'] = $new_user_id;

    }else{
        $_SESSION['create_acc_msg'] = '<p class="text-danger">* Username already exists</p>';
    }




}

header("Location: /profile.php");
