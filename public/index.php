<?php
require_once __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
    "/" => "Controllers\\HomeController",
    "/welcome" => "Controllers\\WelcomeController",
    "/login" => "Controllers\\LoginController",
    "/signup"=> "Controllers\\SignupController",
    "/signup_email_check"=> "Controllers\\SignupEmailCheckController",
    "/username_check"=>"Controllers\\UsernameCheckController",
    "/attempt_question"=>"Controllers\\AttemptQuestionController",
    "/result"=>"Controllers\\ResultController",
    "/attempt_check"=>"Controllers\\AttemptCheckController",
    "/logout"=>"Controllers\\LogoutController",
    "/admin_portal"=>"Controllers\\AdminPortalController",
    "/question_add"=>"Controllers\\AdminPortalController",
));
?>