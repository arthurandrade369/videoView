<?php
require_once (__DIR__ . "/login.php");
require_once ("../../config/connection-db.php");

class Authenticate
{
    public function __construct()
    {
        //
    }

    static function auth($email, $password)
    {
        $sql = "SELECT id, password FROM login WHERE email = :email AND password = :password";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue(":email", $email);
        $p_sql->bindValue(":password", $password);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            $aws = $p_sql->fetch();
        } else {
            return false;
        }
    }
}
