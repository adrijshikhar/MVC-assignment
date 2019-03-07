<?php

namespace Models;

use Models\DatabaseConnect;

class Signup
{
    public static function enterUserDetails($user)
    {
        $db = DatabaseConnect::getDB();
        $sql = $db->prepare("insert into users(name,email,username,password,gender,mobile_num,enroll,branch,year) values(:name,:email,:username,:password,:gender,:mobile,:enroll,:branch,:year");
        $check=$sql->execute($user);
        if($check)
            return true;
        else {
            return false;
        }

    }
}
