<?php

namespace Controllers;

session_start();
class LogoutController
{
    
    public function post()
    {
        if (isset($_SESSION[id]) || isset($_SESSION[name]) || isset($_SESSION[email]) || isset($_SESSION[username]) || isset($_SESSION[admin])) {
            session_destroy();
            echo "true";
        } else {
            echo "false";
        }

    }
}
