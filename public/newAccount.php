<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <div class="register">
        <h1>Register</h1>
        <form action="../src/Controller/signupController.php" method="post">
            <label for="email">
                <i class="fas fa-at"></i>
            </label>
            <input type="text" name="email" placeholder="E-mail" id="email" required>

            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>

            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="confirmPassword" placeholder="Confirm password" id="confirmPassword" required>
            <input type="submit" value="Register">
        </form>
        <form action="./index.php">
            <input type="submit" value="Voltar">
        </form>
    </div>

</body>

</html>