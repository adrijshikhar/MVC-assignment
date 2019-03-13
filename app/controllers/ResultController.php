<?php
namespace Controllers;

use Models\AttemptQuestion;

session_start();
class ResultController
{

    public function get()
    {
        header("Location: /");
    }
    public function post()
    {
        $a = array($_POST["a1"], $_POST["a2"], $_POST["a3"], $_POST["a4"]);
        $uid = $_SESSION["id"];
        $qid = $_POST["qid"];
        if (!empty($_POST["qid"]) &&  !empty($a) && !empty($_SESSION["id"])) {
            $answer_submit_check = AttemptQuestion::resultcheck($uid, $qid, $a);
            echo json_encode($answer_submit_check);
            
        }
        else{
            echo "error";
        }
    }
}
