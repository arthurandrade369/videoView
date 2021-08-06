<?php
require_once './login.php';
require_once '../../config/connection-db.php';

class Signup
{
    static function signup(Login $login,$confirmPassword)
    {
        $sql = "SELECT email FROM login WHERE email = :email";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('email', $login->getEmail());
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            echo "Email already exist!";
            exit;
        }

        if ($login->getPassword() === $confirmPassword) {
            $password = md5($login->getPassword());
            $sql = "INSERT INTO login VALUES(DEFAULT,:email,:password,:date)";
            $p_sql = Connection::getInstance()->prepare($sql);
            $p_sql->bindValue('email', $login->getEmail());
            $p_sql->bindValue('password', $password);
            $p_sql->bindValue('date',$login->getDate());
            $p_sql->execute();
            header("Location: ../../public/index");
        } else {
            echo "Passwords arent equal!";
            exit;
        }
    }
}
