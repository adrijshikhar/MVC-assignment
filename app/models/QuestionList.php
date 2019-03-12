<?php

namespace Models;

use Models\DatabaseConnect;

class QuestionList{
    public static function QuestionListUser($uid)
    {
        $db=DatabaseConnect::getDB();
        $sql=$db->prepare("select * from questions");
        $check=$sql->execute();
        $i=0;
        if($check){
            while ($question=$sql->fetch(\PDO::FETCH_ASSOC)) {
               
                $questionlistuser[$i]=array("sno"=>($i+1),"qid"=>$question[id],"question"=>$question[question],"attempted"=>'',"points"=>$question[points]);
                $sql2=$db->prepare("select * from answered_questions where uid=:uid and qid=:qid");
                $sql2->execute(array("uid"=>$uid,"qid"=>$question[id]));
                $q=$sql2->fetch(\PDO::FETCH_ASSOC);
                    
                if ($q) {
                    $questionlistuser[$i]["attempted"]="true";
                }
                else {
                    $questionlistuser[$i]["attempted"]="false";                    
                }
                $i++;
            }
        }
        return $questionlistuser;
    }
}