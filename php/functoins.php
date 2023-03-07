<?php

session_start();
require("CRUD.php");



class Register extends Crud{
  public function registration($name, $username, $email, $password, $confirmpassword){
    
    $duplicate = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
      return 10;
      // Username or email has already taken
    }
    else{
      if($password == $confirmpassword){
        $query = "INSERT INTO tb_user VALUES('', '$name', '$username', '$email', '$password')";
        mysqli_query($this->conn, $query);
        return 1;
        // Registration successful
      }
      else{
        return 100;
        // Password does not match
      }
    }
  }
}

class Login extends Crud{
  public $id;
  public function login($usernameemail, $password){
    $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
      if($password == $row["password"]){
        $this->id = $row["id"];
        return 1;
        // Login successful
      }
      else{
        return 10;
        // Wrong password
      }
    }
    else{
      return 100;
      // User not registered
    }
  }

  public function idUser(){
    return $this->id;
  }
}

class Select extends Crud{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}
