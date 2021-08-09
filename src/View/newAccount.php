<?php

require_once("./Entity/user.php");
require_once("../src/Controller/UserController.php");

session_start();
if (isset($_SESSION['loggedin'])) {
    header("Location: ../src/View/home.php");
    exit;
}

if (isset($_REQUEST['send'])) {
    if ($_POST['password'] === $_POST['confirmPassword']) {
        $user = new User();
        $user->setObject($_POST);
        $signup = new UserController();
        $signup->signUp($user);
    }
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div class="register">
        <h1>Register</h1>
        <form method="post">
            <label for="fname">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="fname" placeholder="Primeiro nome" id="fname" required>

            <label for="lname">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="lname" placeholder="Ultimo nome" id="lname" required>

            <label for="email">
                <i class="fas fa-at"></i>
            </label>
            <input type="email" name="email" placeholder="E-mail" id="email" required>

            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>

            <label for="confirmPassword">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="confirmPassword" placeholder="Confirm password" id="confirmPassword" required>

            <label for="birthday">
                <i class="fas fa-calendar-alt"></i>
            </label>
            <input type="date" name="birthday" placeholder="Primeiro nome" id="birthday" required>

            <input type="submit" name="send" value="Register">
        </form>

        <a href="./index.php"><button type="button">Voltar</button></a> 
    </div>

</body>

</html>