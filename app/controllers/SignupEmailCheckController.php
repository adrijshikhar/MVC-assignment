<?php

namespace Controllers;

use Models\SignupChecks;

class SignupEmailCheckCOntroller
{
    public function get()
    {
        header("Location: /");
    }
    public function post()
    {
        $email = $_POST["email"];
        $check = SignupChecks::signupEmailCheck($email);
  
        echo $check;
    }

}
