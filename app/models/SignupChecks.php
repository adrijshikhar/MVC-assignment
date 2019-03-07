<?php
namespace Models;
use Models\DatabaseConnect;
class SignupChecks{
    public static function signupEmailCheck($email) {
        $db=DatabaseConnect::getDB();
        $sql=$db->prepare("select id from users where email=:email");
        $sql->execute(array("email"=>$email));
        $uid=$sql->fetchAll(\PDO::FETCH_ASSOC);
        if ($uid>0) {
            return false;        
        }    
        else {
            return true;
        }
    }
    public static function signupUsernameCheck($username){
        $db=DatabaseConnect::getDB();
        $sql=$db->prepare("select id from users where username=:username");
        $sql->execute(array('username' => $username));
        $uid=$sql->fetchAll(\PDO::FETCH_ASSOC);
        if ($uid>0) {
            return false;        
        }    
        else {
            return true;
        }
    }
}