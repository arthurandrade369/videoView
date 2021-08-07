<?php

require_once("C:/Users/Dinopc/Desktop/OqueVoceProcura/DEV/PHP/youtube/src/Entity/User.php");
require_once("C:/Users/Dinopc/Desktop/OqueVoceProcura/DEV/PHP/youtube/config/connection-db.php");

class UserController
{
    public function signUp($fname, $lname, $email, $password, $confirmPassword, $birthday)
    {
        $user = new User;
        $user->setFName($fname);
        $user->setLName($lname);
        $user->SetEmail($email);
        $user->setPassword($password);
        $user->setCreated(date("Y-m-d"));
        $user->setBirthday($birthday);
        $user->setEnabled(1);

        $sql = "SELECT email FROM user WHERE email = :email";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('email', $user->getEmail());
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            exit("Email ja existe!");
        }

        if ($user->getPassword() === $confirmPassword) {
            $password = md5($user->getPassword());
            $sql = "INSERT INTO user(id,fname,lname,email,password,created,birthday,enabled) VALUES(DEFAULT,:fname, :lname, :email,:password,:created, :birthday, :enabled)";
            $p_sql = Connection::getInstance()->prepare($sql);
            $p_sql->bindValue('fname', $user->getFName());
            $p_sql->bindValue('lname', $user->getLName());
            $p_sql->bindValue('email', $user->getEmail());
            $p_sql->bindValue('password', $password);
            $p_sql->bindValue('created', $user->getCreated());
            $p_sql->bindValue('birthday', $user->getBirthday());
            $p_sql->bindValue('enabled', $user->getEnabled());
            $p_sql->execute();
            header("Location: ../../public/index");
        } else {
            exit("Senhas não são iguais!");
        }
    }
}
