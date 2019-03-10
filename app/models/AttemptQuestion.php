<?php

namespace Models;

use Models\DatabaseConnect;

class AttemptQuestion
{
    public static function questionAndAnswer($qid)
    {
        $db = DatabaseConnect::getDB();
        $sql = $db->prepare("select question from questions where id=:qid");
        $check = $sql->execute(array("qid" => $qid));
        if ($check) {
            $q = $sql->fetch(\PDO::FETCH_ASSOC);
            $question = array('question' => $q[question], 'answers' => '');
            $sql2 = $db->prepare("select * from multiple_answer where question_no=:qid");
            $check2 = $sql2->execute(array("qid" => $qid));
            if ($check2) {
                $i = 0;
                while ($ma = $sql2->fetch(\PDO::FETCH_ASSOC)) {
                    $multiple_answer[$i] = $ma['multiple_answers'];
                    $i++;

                }
            } else {
                die();
            }

        } else {
            die();
        }
        $question['answer'] = $multiple_answer;
        return $question;
    }
}
