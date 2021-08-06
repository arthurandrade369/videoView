<?php

require_once("../../config/connection-db.php");
require_once("../Model/signup.php");
require_once("../Model/login.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = new Login;
    $login->setEmail($_POST['email']);
    $login->setPassword($_POST['password']);
    $login->setDate(date("Y-m-d"));
    
    $signup = Signup::signup($login, $_POST['confirmPassword']);
}
