<?php

namespace Models;

use Models\DatabaseConnect;

class QuestionListUser{
    public static function QuestionListUser($uid)
    {
        $db=DatabaseConnect::getDB();
        $sql=$db->prepare("select * from questions");
        $check=$sql->execute();
        if($check){
            while ($question=$sql->fetch(\PDO::FETCH_ASSOC)) {
                
            }
        }
    }
}