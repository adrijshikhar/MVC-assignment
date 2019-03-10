<?php

namespace Controllers;
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
        $questionAndAnswer=AttemptQuestion::questionAndAnswer($_GET["id"]);
     
        echo $this->twig->render("qa.html",array("question"=>$questionAndAnswer['question'],"multipleAnswer"=>$questionAndAnswer[answer]));
    }
}
