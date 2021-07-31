<?php
require_once("../../config/connection-db.php");
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: ../../public/index.html");
    exit;
}

$sql = "SELECT password, email FROM login WHERE id = :id";
$p_sql = Connection::getInstance()->prepare($sql);
$p_sql->bindValue("id", $_SESSION['id']);
$p_sql->execute();
$aws = $p_sql->fetch();
$p_sql = null;
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
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
            <p>Your account details are below:</p>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><?= $_SESSION['name'] ?></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><?= $aws['password'] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $aws['email'] ?></td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>