<?php

namespace Models;

use Models\DatabaseConnect;

class AttemptQuestion
{
    public function insertUserPoints($uid, $points_gained)
    {
        $db = DatabaseConnect::getDB();
        $sql4 = $db->prepare("select * from points where uid=:uid");
        $check4 = $sql4->execute(array("uid" => $uid));
        if ($check4) {
            if ($sql4->rowCount() > 0) {
                $upoint = $sql4->fetch(\PDO::FETCH_ASSOC);
                $sum_points = $upoint[points] + $points_gained;
                $sql5 = $db->prepare("update points set points=:sum_points where uid=:uid");
                $check5 = $sql5->execute(array("uid" => $uid, "sum_points" => $sum_points));
                if ($check5) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return "error4";
        }
    }
    public static function resultcheck($uid, $qid, $a)
    {
        $db = DatabaseConnect::getDB();
        $sql1 = $db->prepare("select * from correct_answer where question_no=:qid");
        $check1 = $sql1->execute(array("qid" => $qid));
        $sql2 = $db->prepare("select points from questions where id=:qid");
        $check2 = $sql2->execute(array("qid" => $qid));

        if ($check1 && $check2) {
            $p = $sql2->fetch(\PDO::FETCH_ASSOC);
            $number_correct_ans = $sql1->rowCount();
            $flag = 0;
            for ($i = 0; $i < 4; $i++) {
                if ($a[$i] != 0) {
                    $sql3 = $db->prepare("insert into answered_questions(uid,qid,aid) values(:uid,:qid,:aid)");
                    $check3 = $sql3->execute(array('uid' => $uid, 'qid' => $qid, 'aid' => $a[$i]));
                    if ($check3) {
                        while ($c = $sql1->fetch(\PDO::FETCH_ASSOC)) {
                            if ($c[correct_ans] == $a[$i]);
                            $flag++;
                        }
                    } else {
                        return "error3";
                    }
                }
            }
            if ($flag == $number_correct_ans) {
                $points_gained = $p[points];

            } else {
                $points_gained = 0;

            }
            if (insertUserPoints($uid, $points_gained)) {
                return true;

            } else {
                return false;
            }
        } else {
            return "error12";
        }

    }
    public static function questionAndAnswer($qid)
    {
        $db = DatabaseConnect::getDB();
        $sql = $db->prepare("select question from questions where id=:qid");
        $check = $sql->execute(array("qid" => $qid));
        if ($check) {
            $q = $sql->fetch(\PDO::FETCH_ASSOC);
            $question = array('qid' => $qid, 'question' => $q[question], 'answers' => '');
            $sql2 = $db->prepare("select * from multiple_answer where question_no=:qid");
            $check2 = $sql2->execute(array("qid" => $qid));
            if ($check2) {
                $i = 0;
                while ($ma = $sql2->fetch(\PDO::FETCH_ASSOC)) {
                    $multiple_answer[$i] = array('aid' => $ma[id], 'mans' => $ma['multiple_answers']);
                    $i++;

                }
            } else {
                return "error3";
            }

        } else {
            return "error4";
        }
        $question['answer'] = $multiple_answer;
        return $question;
    }
}
