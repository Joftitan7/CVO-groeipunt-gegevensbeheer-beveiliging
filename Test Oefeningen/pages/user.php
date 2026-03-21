<?php
include("../elements/nav.php");
include("../php/beveiliging.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/Login.php");
    exit;
}

if ($_SESSION['user_role'] != 0) {
    header("Location: ../pages/admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="user.css">
</head>

<body>

    <div class="dashboard">
        <h1>Welkom <?php echo $_SESSION['username']; ?>!</h1>

        <div class="info-box">
            <h3>Jouw account</h3>
            <p>ID: <?php echo $_SESSION['user_id']; ?></p>
            <p>Gebruikersnaam: <?php echo $_SESSION['username']; ?></p>
            <p>Rol: Gebruiker</p>
        </div>

        <div class="info-box">
            <h3>Wat kun je doen</h3>
            <ul>
                <li>Profiel bekijken</li>
                <li>Uitloggen</li>
            </ul>
        </div>

        <p>
            <a href="../pages/admin.php" class="btn">Admin</a>
            <a href="../php/logout.php" class="btn logout">Logout</a>
        </p>

        <div class="info-box">
            <p>Ingelogd en beveiligd</p>
        </div>
    </div>

    <?php include("../elements/footer.php"); ?>