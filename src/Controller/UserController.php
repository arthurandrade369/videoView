<?php
require_once(__DIR__ . "/../Entity/User.php");
require_once(__DIR__ . "/../../config/connection-db.php");
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

    public function authenticate(string $email, string $password): bool
    {
        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue(":email", $email);
        $p_sql->bindValue(":password", md5($password));
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            $aws = $p_sql->fetch();
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $aws;

            return true;
        } else {
            return false;
        }
    }

    public function getAge($birthday): int
    {
        $birthday = explode('-', $birthday);
        $age = date("Y") - $birthday[0];
        if (date('m') < $birthday[1]) {
            $age -= 1;
        } elseif ((date('m') == $birthday[1]) && (date('d') <= $birthday[2])) {
            $age -= 1;
        }

        return $age;
    }
}
