<?php

namespace Controllers;

use Models\Signup;

class UsernameCheckController{
    public function get()
    {
        header("Location: /");
    }
    public function post(){
        $username=$_POST["username"];
        $check=Signup::signupUsernameCheck($username);
       
        echo $check;
    }
}