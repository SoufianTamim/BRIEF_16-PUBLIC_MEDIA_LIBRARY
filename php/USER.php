<?php
require("CRUD.php");

class User extends Crud {
    
    private $crud;

    public function __construct($crud) {
        $this->crud = $crud;
    }

    public function register($username, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $data = array(
            "username" => $username,
            "email" => $email,
            "password" => $hashed_password
        );
        return $this->crud->create("users", $data);
    }
    

    public function login($username, $password) {
        $user = $this->crud->read("users", "*", "username='$username'")[0];
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function logout() {
        unset($_SESSION['user_id']);
    }
}


?>