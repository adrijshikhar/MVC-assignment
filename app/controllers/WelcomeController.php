<?php
namespace Controllers;
use Models\Question;
use Models\Leaderboard;
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
        if(isset($_SESSION[id]) && !empty($_SESSION[id])) {
            $leaderboard=Leaderboard::leaderboard();
            $questionlistuser=Question::QuestionListUser($_SESSION["id"]);
            echo $this->twig->render("welcome.html", array('user_name' => $_SESSION["name"],'questionlistuser'=>$questionlistuser,"leaderboard"=>$leaderboard,"admin_portal"=>$_SESSION["admin"]));
       }
    else {
        header("Location: /");
    }
    }
}
