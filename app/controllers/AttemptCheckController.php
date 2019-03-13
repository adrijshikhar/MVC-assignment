<?php

namespace Controllers;
use Models\AttemptQuestion;
session_start();
class AttemptCheckController{
    public function get()
    {
        header("Location: /");
    }
    public function post()
    {
        $qid=$_POST["qid"];
        $uid=$_SESSION["id"];
        $attemptcheck=AttemptQuestion::attemptCheck($uid,$qid);
        echo $attemptcheck;
    }
}