<?php

namespace Controllers;

session_start();
use Models\Question;

class AdminPortalController
{
    protected $twig;
    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . "/../views");
        $this->twig = new \Twig_Environment($loader);
    }
    public function get()
    {
        if ($_SESSION["admin"] == 0) {
            header("Location: /");
        } else if ($_SESSION["admin"] == 1) {
            $questionlistadmin = Question::QuestionListAdmin();
            echo $this->twig->render("admin_portal.html", array("question_list_admin" => $questionlistadmin));
        } else {
            echo "error admin";
        }
    }
}
