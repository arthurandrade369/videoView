<?php
require_once("../../config/connection-db.php");
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: ../../public/index.php");
    exit;
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">
    <nav class="navtop">
        <div>
            <h1>Website Title</h1>
            <a href="home.php"><i class="fas fa-brain"></i>Home</a>
            <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
            <a href="../Controller/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="content">
        <h2>Profile Page</h2>
        <div>
            <p>Detalhes da sua conta abaixo:</p>
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><?= $_SESSION['fname'] . " " . $_SESSION['lname'] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $_SESSION['email'] ?></td>
                </tr>
                <tr>
                    <td>Idade:</td>
                    <td><?= $_SESSION['age'] . " anos" ?></td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>