<?php

namespace Models;

use Models\DatabaseConnect;

class Leaderboard
{
    public static function leaderboard()
    {
        $db = DatabaseConnect::getDB();
        $sql = $db->prepare("select name,points from users,points where users.id=points.uid order by points desc");
        $check = $sql->execute();
        $i = 0;
        if ($check) {
            while ($u = $sql->fetch(\PDO::FETCH_ASSOC)) {
                $response[$i] = array("sno"=>($i+1),"name" => $u[name], "points" => "$u[points]");
                $i++;
            }
        }
        else {
            die();
        }
        return $response;
    }
}
