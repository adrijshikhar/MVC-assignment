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
       
          echo $this->twig->render("admin_portal.html", array("questionlistadmin" => $questionlistadmin));
        } else {
            echo "error admin";
        }
    }
    public function post()
    {
        $q = $_POST["question"];
        $a = array($_POST['a1'], $_POST['a2'], $_POST["a3"], $_POST["a4"]);
        $c = array($_POST["c1"], $_POST["c2"], $_POST["c3"], $_POST["c4"]);
        $p = $_POST["p"];
        $questionaddadmin=Question::QuestionAdd($q,$a,$c,$p);
        var_dump($questionaddadmin);
    }
}
