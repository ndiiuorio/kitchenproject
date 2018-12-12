<?php
class User extends Db {

    function get_by_id($id){

        $id =(int)$id;

        $sql = "SELECT * FROM users WHERE id = '$id'";

        $user = $this->select($sql)[0];

        return $user;
    }

    function add(){

        $_SESSION = array();

        $username = trim($this->data['username']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        $firstname = trim($this->data['firstname']);
        $lastname = trim($this->data['lastname']);

        $sql = "INSERT INTO users (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')";

        $new_user_id = $this->execute_return_id($sql);

        return $new_user_id;
    }

    function exists(){

        $username = $this->data['username'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $user = $this->select($sql)[0];



        return $user;

    }

    function login(){



        $_SESSION = array();

        $username = $this->data['username'];
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $user = $this->select($sql)[0];



        if( password_verify($_POST['password'], $user['password']) ){

            $_SESSION['user_logged_in'] = $user['id'];

        }else{
            $_SESSION['login_attempt_msg'] = '<p class="text-danger">* Incorrect username and/or password</p>';
        }
    }


    function edit(){

        $id = (int)$_SESSION['user_logged_in'];
        $username = trim($this->data['username']);
        $password = password_hash(trim($this->data['password']), PASSWORD_DEFAULT);
        $firstname = trim($this->data['firstname']);
        $lastname = trim($this->data['lastname']);

        if ( !empty(trim($_POST['password'])) ) {

            $sql = "UPDATE users SET username='$username', password='$password', firstname='$firstname', lastname='$lastname' WHERE id='$id'";

        }else {

            $sql = "UPDATE users SET username='$username', firstname='$firstname', lastname='$lastname' WHERE id='$id'";

        }

        $this->execute($sql);
    }
}
