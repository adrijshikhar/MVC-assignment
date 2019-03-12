<?php

namespace Models;

use Models\DatabaseConnect;

class Question
{
    public static function QuestionListUser($uid)
    {
        $db = DatabaseConnect::getDB();
        $sql = $db->prepare("select * from questions");
        $check = $sql->execute();
        $i = 0;
        if ($check) {
            while ($question = $sql->fetch(\PDO::FETCH_ASSOC)) {

                $questionlistuser[$i] = array("sno" => ($i + 1), "qid" => $question["id"], "question" => $question["question"], "attempted" => '', "points" => $question["points"]);
                $sql2 = $db->prepare("select * from answered_questions where uid=:uid and qid=:qid");
                $sql2->execute(array("uid" => $uid, "qid" => $question["id"]));
                $q = $sql2->fetch(\PDO::FETCH_ASSOC);

                if ($q) {
                    $questionlistuser[$i]["attempted"] = "true";
                } else {
                    $questionlistuser[$i]["attempted"] = "false";
                }
                $i++;
            }
        }
        return $questionlistuser;
    }
    public static function QuestionListAdmin()
    {
        $db = DatabaseConnect::getDB();
        $sql = $db->prepare("select * from questions");
        $check = $sql->execute();
        $i = 0;
        if ($check) {
            while ($question = $sql->fetch(\PDO::FETCH_ASSOC)) {
                $correct_answer=[];
                $multiple_answer=[];
                $sql2=$db->prepare("select * from multiple_answer where question_no=:qid");
                $check2=$sql2->execute(array("qid"=>$question["id"]));
       
                if ($check2) {
                    
                    $sql3=$db->prepare("select * from correct_answer where question_no=:qid");
                    $check3=$sql3->execute(array("qid"=>$question["id"]));
                    if ($check3) {
                        $j=0;$k=0;
                        while ($ma=$sql2->fetch(\PDO::FETCH_ASSOC)) {
                            $multiple_answer[$j]=$ma["multiple_answers"];
                            
                            while ($ca=$sql3->fetch(\PDO::FETCH_ASSOC)) {
                                if ($ca["correct_ans"]==$ma["id"]) {
                                    $correct_answer[$k]=$ma["multiple_answers"];
                                    $k++;
                                }
                           
                            }
                            $j++;
                        }
                    }else {
                        echo "error3";
                    }
                    
                    
                    $questionlistadmin[$i] = array("sno" => ($i + 1), "qid" => $question["id"], "question" => $question["question"],"correct_answer"=>$correct_answer,"multiple_answer"=>$multiple_answer, "points" => $question["points"]);
                }
                else {
                    return "error2";
                }
                $i++;
            }
        
        return $questionlistadmin;
        }
        else {
            return "error";
        }

    }
}
