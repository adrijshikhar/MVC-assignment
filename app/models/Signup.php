<?php

namespace Models;

use Models\DatabaseConnect;

class Signup
{
    public static function signupEmailCheck($email) {
        $db=DatabaseConnect::getDB();
   
        $sql=$db->prepare("select id from users where email=:email");
        $sql->execute(array("email"=>$email));
        $uid=$sql->rowCount();
       
        if ($uid>0) {
            return "false";
        }    
        else {
            return "true";
        }
    }
    public static function signupUsernameCheck($username){
        $db=DatabaseConnect::getDB();
        $sql=$db->prepare("select id from users where username=:username");
        $sql->execute(array('username' => $username));
        $uid=$sql->rowCount();
        if ($uid>0) {
            return "false";        
        }    
        else {
            return "true";
        }
    }
    public static function enterUserDetails($user)
    {
        $db = DatabaseConnect::getDB();
        // $sql = $db->prepare("insert into users(name,email,username,password,gender,mobile_num,enroll,branch,year) values(:name,:email,:username,:password,:gender,:mobile,:enroll,:branch,:year");
        // $check=$sql->execute($user);
        // var_dump($user);
        // die();
        $sql = $db->prepare("insert into users(name) values(:name)");
        $check = $sql->execute(array('name' => $user[name]));
        var_dump($check);
        if ($check) {
            $sql2 = $db->prepare("select LAST_INSERT_ID()");
            if ($sql2 = $db->execute()) {
                $u = $sql2->fetch(\PDO::FETCH_ASSOC);
            }
            else {
                die();
            }

        }
        else {
            die();
        }
        $sql3 = $db->prepare("insert into points(uid,points) values(:uid,0)");
        $check2=$sql3->execute(array("uid" => $u["id"]));

        if ($check && $check2) {
            return true;
        } else {
            return false;
        }

    }
}
