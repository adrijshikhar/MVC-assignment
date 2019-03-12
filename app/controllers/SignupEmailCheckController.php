<?php

namespace Controllers;

use Models\Signup;

class SignupEmailCheckCOntroller
{
    public function get()
    {
        header("Location: /");
    }
    public function post()
    {
        $email = $_POST["email"];
        $check = Signup::signupEmailCheck($email);
  
        echo $check;
    }

}
