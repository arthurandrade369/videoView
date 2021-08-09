<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    header("Location: ../src/View/home.php");
    exit;
}
if (isset($_REQUEST['send'])) {
    
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div class="login">
        <h1>Login</h1>
        <form action="../src/Controller/authenticateController.php" method="post">
            <label for="email">
                <i class="fas fa-user"></i>
            </label>
            <input type="email" name="email" placeholder="Email" id="email" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" name="send" value="Login">
        </form>
        <a href="../src/View/newAccount.php"><button type="button">Registrar-se</button></a>
    </div>

</body>

</html>