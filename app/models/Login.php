<?php
namespace Models;
use Models\DatabaseConnect;
class Login
{
 
    public static function ValidateUser($email, $password)
    {
       
        $db = DatabaseConnect::getDB();
        $password_hash = hash('sha256', $password);
        $user = $db->prepare("select * from users where email=:email and password=:password");
        $user->execute(array("email" => $email, "password" => $password_hash));
        
        $u = $user->fetch(\PDO::FETCH_ASSOC);
      
        if ($u) {
            $validate=array("validate"=>"true","userDetails"=>$u);
        } else {
            $validate=array("validate"=>"false");
        }
        return $validate;
    }
}
