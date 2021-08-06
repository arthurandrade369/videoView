<?php

require_once("../../config/connection-db.php");
require_once("../Model/authenticate.php");

session_start();

if (!isset($_POST['email'], $_POST['password'])) {
    exit("Preencha todos os campos");
}

$auth = Authenticate::auth($_POST['email'], $_POST['password']);
if ($auth) {
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $_POST['email'];
    header("Location: ../View/home.php");
}else{
    echo "Email or password are incorrect!";
}
