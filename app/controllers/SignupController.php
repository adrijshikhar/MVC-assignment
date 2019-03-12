<?php
namespace Controllers;

use Models\Signup;


class SignupController
{
    public function get()
    {
        header("Location: /");
    }

    public function post()
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $p = $_POST["p"];
        $p2 = $_POST["p2"];
        $gender = $_POST["gender"];
        $mobile = $_POST["mobile"];
        $enroll = $_POST["enroll"];
        $branch = $_POST["branch"];
        $year = $_POST["year"];

        $response = array('validate' => '', 'password_length_check_result' => '', 'password_match_check_result' => '', 'signup_email_check_result' => '', 'username_check_result' => '');
     
        
        if (strlen($p) >= 8) {
            $password_length_check_result = "Password length good";
        } else {
            $password_length_check_result = "Password length too small";
        }

        if ($p === $p2) {
            $password_match_check_result = "Passwords Match";
        } else {
            $password_match_check_result = "Passwords Do Not Match";
        
        }
        if (Signup::signupEmailCheck($email)) {
            $signup_email_check_result = "Email Can Be Used";
        } else {
            $signup_email_check_result = "Email already exists";
        }

        if (Signup::signupUsernameCheck($username)) {
            $username_check_result = "Username Can Be Used";
        } else {
            $username_check_result = "Username Already Exists";
        }
        if ($p === $p2 && Signup::signupEmailCheck($email) && Signup::signupUsernameCheck($username) && strlen($p) >= 8) {
            $user = array('name' => $name, 'email' => $email, 'username' => $username, 'password' => $p, 'gender' => $gender, 'mobile' => $mobile, 'enroll' => $enroll, 'branch' => $branch, 'year' => $year);
            if (Signup::enterUserDetails($user)) {
                $response['validate'] = "true";
            } else {
                $response['validate'] = "false";
            }
        }
        $response['password_length_check_result'] = $password_length_check_result;
        $response['password_match_check_result'] = $password_match_check_result;
        $response['signup_email_check_result'] = $signup_email_check_result;
        $response['username_check_result'] = $username_check_result;
       echo json_encode($response) ;
      
    }
}
