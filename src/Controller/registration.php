<?php

require_once("../../config/connection-db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $sql = "INSERT INTO login VALUES(DEFAULT,:username,:email,:password)";
    $p_sql = Connection::getInstance()->prepare($sql);
    $p_sql->bindValue('username', $_POST['username']);
    $p_sql->bindValue('email', $_POST['email']);
    $p_sql->bindValue('password', $password);
    $p_sql->execute();
    header("Location: ../../public/index");
}
