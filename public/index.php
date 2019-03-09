<?php
require_once __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
    "/" => "Controllers\\HomeController",
    "/welcome" => "Controllers\\WelcomeController",
    "/login" => "Controllers\\LoginController",
    "/signup"=> "Controllers\\SignupController",
    "/signup_email_check"=> "Controllers\\SignupEmailCheckController",
    "/username_check"=>"Controllers\\UsernameCheckController",
    "/logout"=>"Controller\\LogoutController"
));
?>