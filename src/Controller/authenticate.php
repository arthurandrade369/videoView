<?php

require_once("../../config/connection-db.php");
require_once "./src/Model/loginDAO.php";

session_start();

if (!isset($_POST['email'], $_POST['password'])) {
    exit("Preencha todos os campos");
}
$auth = new LoginDAO;
$ret = $auth->authenticate($_POST['email'], $_POST[]);
if ($ret) {
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $_POST['email'];
}else if(is_null($ret)){
    echo "Could not connect to database";
}else{
    echo "Email or password are incorrect!";
}
