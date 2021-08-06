<?php
require_once (__DIR__ . "/login.php");
require_once ("../../config/connection-db.php");

class Authenticate
{
    static function auth($email, $password)
    {
        $sql = "SELECT id, password FROM login WHERE email = :email";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue(":email", $email);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            $aws = $p_sql->fetch();
            if (md5($password) === $aws['password']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
