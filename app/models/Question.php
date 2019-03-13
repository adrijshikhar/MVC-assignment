<?php

namespace Models;

use Models\DatabaseConnect;

class Question
{
    public static function QuestionAdd($q, $a, $c, $p)
    {
        $db = DatabaseConnect::getDB();
        $add=[];
        $sql1 = $db->prepare("insert into questions(question,points) values(:question,:points)");
        $check1 = $sql1->execute(array("question" => $q, "points" => $p));
        if ($check1) {
            $sql2 = $db->prepare("select last_insert_id() 'id'");
            $check2 = $sql2->execute();
            if ($check2) {
                $qid = $sql2->fetch(\PDO::FETCH_ASSOC);
                for ($i = 0; $i < 4; $i++) {
                    $sql3 = $db->prepare("insert into multiple_answer(question_no,multiple_answers) values(:qid,:ma)");
                    $check3 = $sql3->execute(array("qid" => $qid["id"], "ma" => $a[$i]));
                    if ($check3) {
                        $sql4 = $db->prepare("select last_insert_id() 'id'");
                        $check4 = $sql4->execute();
                        if ($check4) {
                            $maid = $sql4->fetch(\PDO::FETCH_ASSOC);
                            if ($c[$i]!=0) {
                                $sql5=$db->prepare("insert into correct_answer(question_no,correct_ans) values(:qid,:aid)");
                                $check5=$sql5->execute(array("qid"=>$qid["id"],"aid"=>$maid['id']));
                                
                                if ($check5) {
                                     $add[$i]="added";
                                }
                                else {
                                    $add[$i]="error5";
                                }
                            }
                        } else {
                            echo "error4";
                        }
                    } else {
                        echo "error3";
                    }
                }
            } else {
                echo "error2";

            }
        } else {
            echo "error1";
        }
        if ($add[0]=="added" && $add[1]=="added" && $add[2]=="added" && $add[3]=="added") {
            return "added";
        }
        else {
            return "error";
        }
    }
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
        $j = 0;
        $k = 0;
        if ($check) {
            while ($question = $sql->fetch(\PDO::FETCH_ASSOC)) {
                $correct_answer = [];
                $multiple_answer = [];
                $sql2 = $db->prepare("select * from multiple_answer where question_no=:qid");
                $check2 = $sql2->execute(array("qid" => $question["id"]));

                if ($check2) {

                    $j = 0;
                    $k = 0;
                    while ($ma = $sql2->fetch(\PDO::FETCH_ASSOC)) {
                        $multiple_answer[$j] = $ma["multiple_answers"];
                        $sql3 = $db->prepare("select * from correct_answer where question_no=:qid");
                        $sql3->execute(array("qid" => $question["id"]));
                        while ($ca = $sql3->fetch(\PDO::FETCH_ASSOC)) {
                            if (strcmp($ca["correct_ans"], $ma["id"]) == 0) {
                                $correct_answer[$k] = $ma["multiple_answers"];
                                $k++;
                            }
                        }
                        $j++;
                    }
                    $questionlistadmin[$i] = array("sno" => ($i + 1), "qid" => $question["id"], "question" => $question["question"], "correct_answer" => $correct_answer, "multiple_answer" => $multiple_answer, "points" => $question["points"]);
                } else {
                    return "error2";
                }
                $i++;
            }

            return $questionlistadmin;
        } else {
            return "error";
        }

    }
}
