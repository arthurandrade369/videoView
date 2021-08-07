<?php
require_once("../../config/connection-db.php");

session_start();

if (!isset($_POST['email'], $_POST['password'])) {
    exit("Preencha todos os campos");
}

$sql = "SELECT * FROM user WHERE email = :email AND password = :password";
$p_sql = Connection::getInstance()->prepare($sql);
$p_sql->bindValue(":email", $_POST['email']);
$p_sql->bindValue(":password", md5($_POST['password']));
$p_sql->execute();
if ($p_sql->rowCount() > 0) {
    $aws = $p_sql->fetch();
    $_SESSION['loggedin'] = true;
    $_SESSION['fname'] = $aws['fname'];
    $_SESSION['lname'] = $aws['lname'];
    $_SESSION['email'] = $_POST['email'];

    //Calcula idade
    $dataNasc = $aws['birthday'];
    $dataNasc = explode('-', $dataNasc);
    $_SESSION['age'] = date("Y") - $dataNasc[0];
    if (date('m') < $dataNasc[1]) {
        $_SESSION['age'] -= 1;
    } elseif ((date('m') == $dataNasc[1]) && (date('d') <= $dataNasc[2])) {
        $_SESSION['age'] -= 1;
    }


    header("Location: ../View/home.php");
} else {
    exit("Email or password are incorrect!");
}
