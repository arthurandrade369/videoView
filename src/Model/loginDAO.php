<?php
require_once './login.php';
require_once '../../config/connection-db.php';

class LoginDAO
{
    public function authenticate($email, $password)
    {
        $sql = "SELECT id, password FROM login WHERE email = :email";
        if ($p_sql = Connection::getInstance()->prepare($sql)) {
            $p_sql->bindValue(":email", $email);
            $p_sql->execute();
            if ($p_sql->rowCount() > 0) {
                $aws = $p_sql->fetch();
                if (md5($password) === md5($aws['password'])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return null;
        }
    }
    public function register(Login $login)
    {
        $sql = "SELECT username FROM login WHERE username = :username";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('username', $_POST['username']);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            echo "Username already exist!";
            exit;
        }
        $sql = "SELECT email FROM login WHERE email = :email";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('email', $_POST['email']);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            echo "Email already exist!";
            exit;
        }


        if ($_POST['password'] === $_POST['confirmPassword']) {
            $password = md5($_POST['password']);
            $sql = "INSERT INTO login VALUES(DEFAULT,:username,:email,:password)";
            $p_sql = Connection::getInstance()->prepare($sql);
            $p_sql->bindValue('username', $_POST['username']);
            $p_sql->bindValue('email', $_POST['email']);
            $p_sql->bindValue('password', $password);
            $p_sql->execute();
            header("Location: ../../public/index");
        } else {
            echo "Passwords arent equal!";
            exit;
        }
    }
    public function showUser(Login $login)
    {
    }
}
