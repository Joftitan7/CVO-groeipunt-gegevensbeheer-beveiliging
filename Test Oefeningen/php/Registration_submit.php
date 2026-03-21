<?php
session_start();
require_once("../php/admin/db_connect.php");
include("../php/beveiliging.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!ValidateCSRF($_POST['csrf_token'] ?? '')) {
        die("Ongeldig verzoek (CSRF).");
    }

    $username = Inputbeveiliging($_POST["name"]);
    $email    = Emailbeveiliging($_POST["email"]);
    $passw    = $_POST["passw"];
    $passw1   = $_POST["passw1"];

    $errors = [];

    if (!preg_match('/^[A-Za-z0-9_]+$/', $username)) {
        $errors[] = "Username may only contain letters, numbers and underscore.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (strlen($passw) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($passw !== $passw1) {
        $errors[] = "Passwords do not match.";
    }

    // Username check
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->rowCount() > 0) {
        $errors[] = "Username is already taken.";
    }

    // Email check
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        $errors[] = "There is already an account with this email.";
    }

    if (!empty($errors)) {
        $_SESSION['reg_message'] = implode("<br>", $errors);
        header("Location: ../pages/Registration.php");
        exit;
    }

    // Insert
    $password_hash = password_hash($passw, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(16));
    $role = 0;
    $active = 1;

    $stmt = $pdo->prepare("
        INSERT INTO users (username, email, password, token, role, active)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    if ($stmt->execute([$username, $email, $password_hash, $token, $role, $active])) {
        $_SESSION['reg_message'] = "Registration successful. You can now log in.";
        unset($_SESSION['csrf_token']);
        header("Location: ../pages/Login.php");
        exit;
    } else {
        $_SESSION['reg_message'] = "Something went wrong while saving your account.";
        header("Location: ../pages/Registration.php");
        exit;
    }
}
