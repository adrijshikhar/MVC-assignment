<?php
namespace Models;

use Models\DatabaseConnect;

class Users
{

    public static function ValidateUser($email, $password)
    {

        $db = DatabaseConnect::getDB();
        $password_hash = hash('sha256', $password);
        $user = $db->prepare("select * from users where email=:email and password=:password");
        $user->execute(array("email" => $email, "password" => $password_hash));

        $u = $user->fetch(\PDO::FETCH_ASSOC);

        if ($u) {
            $validate = array("validate" => "true", "userDetails" => $u);
        } else {
            $validate = array("validate" => "false");
        }
        return $validate;
    }

    public static function signupEmailCheck($email)
    {
        $db = DatabaseConnect::getDB();

        $sql = $db->prepare("select id from users where email=:email");
        $sql->execute(array("email" => $email));
        $uid = $sql->rowCount();

        if ($uid > 0) {
            return "false";
        } else {
            return "true";
        }
    }
    public static function signupUsernameCheck($username)
    {
        $db = DatabaseConnect::getDB();
        $sql = $db->prepare("select id from users where username=:username");
        $sql->execute(array('username' => $username));
        $uid = $sql->rowCount();
        if ($uid > 0) {
            return "false";
        } else {
            return "true";
        }
    }
    public static function enterUserDetails($user)
    {
        $db = DatabaseConnect::getDB();

        $sql = $db->prepare("insert into users(name,email,username,password,gender,mobile_num,enroll,branch,year) values(:name,:email,:username,:password,:gender,:mobile,:enroll,:branch,:year)");
        $check = $sql->execute($user);

        if ($check) {
            $sql2 = $db->prepare("select LAST_INSERT_ID() 'id'");
            $check2 = $sql2->execute();
            if ($check2) {
                $u = $sql2->fetch(\PDO::FETCH_ASSOC);
            } else {
                echo "error2";

            }

        } else {
            echo "error1";
        }
        $sql3 = $db->prepare("insert into points(uid,points) values(:uid,0)");
        $check3 = $sql3->execute(array("uid" => $u["id"]));

        if ($check && $check3) {
            return true;
        } else {
            return false;
        }

    }
}
