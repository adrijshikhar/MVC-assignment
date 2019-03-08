<?php
namespace Controllers;
use Models\QuestionListUser;
session_start();
class WelcomeController
{
    protected $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
        $this->twig = new \Twig_Environment($loader);
    }
    public function get()
    {
        QuestionListUser::QuestionListUser(1);
        
        
        
        echo $this->twig->render("welcome.html", $welcome = array('user_name' => $_SESSION["name"]));

    }
}
