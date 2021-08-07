<?php

require_once("../src/Entity/User.php");
require_once("../config/connection-db.php");

class UserController
{
    public function signUp(User $user): void
    {
        $sql = "INSERT INTO user(fname,lname,email,password,created,birthday,enabled) VALUES(:fname, :lname, :email,:password,:created, :birthday, :enabled)";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('fname', $user->getFName());
        $p_sql->bindValue('lname', $user->getLName());
        $p_sql->bindValue('email', $user->getEmail());
        $p_sql->bindValue('password', md5($user->getPassword()));
        $p_sql->bindValue('created', $user->getCreated());
        $p_sql->bindValue('birthday', $user->getBirthday());
        $p_sql->bindValue('enabled', $user->getEnabled());
        $p_sql->execute();
        header("Location: ../../public/index");
       
    }

    public function checkIsEmail(string $emal): bool
    {
        $sql = "SELECT email FROM user WHERE email = :email";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('email', $emal);
        $p_sql->execute();
        
        if ($p_sql->rowCount() > 0) return false;
        
        return true;
    }
}
