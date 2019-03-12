<?php

namespace Controllers;
session_start();
use Models\AttemptQuestion;

class AttemptQuestionController
{
    protected $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . "/../views");
        $this->twig = new \Twig_Environment($loader);
    }
    public function get()
    {
        if (!isset($_SESSION["id"]) && !empty($_GET["id"])) {
            header("Location: /");
        }
        $questionAndAnswer = AttemptQuestion::questionAndAnswer($_GET["id"]);
        echo $this->twig->render("qa.html", array("qid" => $questionAndAnswer[qid], "question" => $questionAndAnswer['question'], "multipleAnswer" => $questionAndAnswer[answer]));
    }
}
