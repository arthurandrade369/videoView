<?php

require_once("../../config/connection-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "SELECT email FROM login WHERE email = :email";
    $p_sql = Connection::getInstance()->prepare($sql);
    $p_sql->bindValue('email', $_POST['email']);
    $p_sql->execute();
    if ($p_sql->rowCount() > 0) {
        echo "Email already exist!";
        exit;
    }

    if ($_POST['password'] === $_POST['confirmPassword']) {
        $login = new Login;
        $login->setEmail($_POST['email']);
        $login->setPassword($_POST['password']);
        $login->setDate(date('Y-m-d'));
        unset($login);
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
