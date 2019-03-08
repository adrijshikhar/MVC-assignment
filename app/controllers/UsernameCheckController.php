<?php

namespace Controllers;

use Models\SignupChecks;

class UsernameCheckController{
    public function get()
    {
        header("Location: /");
    }
    public function post(){
        $username=$_POST["username"];
        $check=SignupChecks::signupUsernameCheck($username);
       
        echo $check;
    }
}