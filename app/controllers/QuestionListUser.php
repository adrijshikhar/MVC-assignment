<?php
namespace Controllers;
session_start();
 class QuestionListUser{
        protected $twig;
        public function __construct(){
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
            $this->twig = new \Twig_Environment($loader);
        }
 }