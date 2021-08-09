<?php
require_once("../../config/connection-db.php");
require_once("../Controller/UserController.php");

if (!isset($_SESSION['loggedin'])) {
    header("Location: ../../public/index.php");
    exit;
}
$age = new UserController;
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
                    <td><?= $_SESSION['user']['fname'] . " " . $_SESSION['user']['lname'] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $_SESSION['user']['email'] ?></td>
                </tr>
                <tr>
                    <td>Idade:</td>
                    <td><?= $age->getAge($_SESSION['user']['birthday']) . " anos" ?></td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>