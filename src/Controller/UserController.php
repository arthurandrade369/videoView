<?php

require_once("../src/Entity/User.php");
require_once("../config/connection-db.php");
session_start();

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

    public function authenticate(string $email, string $password)
    {
        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue(":email", $email);
        $p_sql->bindValue(":password", md5($password));
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            $aws = $p_sql->fetch();
            $_SESSION['loggedin'] = true;
            $_SESSION['fname'] = $aws['fname'];
            $_SESSION['lname'] = $aws['lname'];
            $_SESSION['email'] = $email;

            //Calcula idade
            $dataNasc = $aws['birthday'];
            $dataNasc = explode('-', $dataNasc);
            $_SESSION['age'] = date("Y") - $dataNasc[0];
            if (date('m') < $dataNasc[1]) {
                $_SESSION['age'] -= 1;
            } elseif ((date('m') == $dataNasc[1]) && (date('d') <= $dataNasc[2])) {
                $_SESSION['age'] -= 1;
            }
        }
    }
}
