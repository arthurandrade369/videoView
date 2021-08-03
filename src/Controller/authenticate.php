<?php

require_once("../../config/connection-db.php");
session_start();

if (!isset($_POST['username'], $_POST['password'])) {
    exit("Preencha todos os campos");
}

$sql = "SELECT id, password FROM login WHERE username = :user";
if ($p_sql = Connection::getInstance()->prepare($sql)) {
    $p_sql->bindValue(":user", $_POST['username']);
    $p_sql->execute();
    if ($p_sql->rowCount() > 0) {
        $aws = $p_sql->fetch();
        if (md5($_POST['password'] === md5($aws['password']))) {
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $aws['id'];
            header("Location: ../View/home.php");
        } else {
            echo "Login ou senha incorretos!";
        }
    } else {
        echo "Login ou senha incorretos!";
    }
}
