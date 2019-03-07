<?php
require_once __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
    "/" => "Controllers\\HomeController",
    "/welcome" => "Controllers\\WelcomeController",
    "/login" => "Controllers\\LoginController",
    "/signup"=> "Controllers\\SignupController",
    "/question_list_user"=> "Controllers\\QuestionListUser"
));
?>