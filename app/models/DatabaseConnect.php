<?php

namespace Models;

class DatabaseConnect
{
    public static function getDB()
    {
        include __DIR__ . "/../../configs/credentials.php";
        return new \PDO("mysql:dbname=" . $db_connect['db_name'] . ";host=" . $db_connect['server'], $db_connect['username'], $db_connect['password']);
    }
}
