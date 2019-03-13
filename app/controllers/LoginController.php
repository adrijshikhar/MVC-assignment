<?php
namespace Controllers;
session_start();
use Models\Users;
class LoginController
{

    protected $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
        $this->twig = new \Twig_Environment($loader);
    }
    public function get(){
        header("Location: /");
    }
    public function post() {
        $email=$_POST["email"];
        $password=$_POST["password"];
        $user=Users::ValidateUser($email,$password);
        
        if ($user["validate"]=="true") {
            $u=$user["userDetails"];
            $_SESSION["id"] = $u["id"];
            $_SESSION["name"] = $u["name"];
            $_SESSION["email"] = $u["email"];
            $_SESSION["username"] = $u["username"];
            $_SESSION["admin"] = $u["admin"];
            $response="true";
        }
        else {
          $response="false";
        }
        echo $response;
    }
}
?>