<?php
session_start();
// include 'debug.php'; // debug uitgeschakeld

require_once '../php/beveiliging.php';
require_once '../php/admin/db_connect.php';
// require_once '../php/old_mysqli.php'; // oude versie niet meer nodig

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    // echo "GET request"; // testte GET
    header("Location: ../pages/Login.php");
    exit;
}

if (!ValidateCSRF($_POST['csrf_token'] ?? '')) {
    $_SESSION['login_message'] = "CSRF error";
    // die("CSRF fail"); // testte direct die
    header("Location: ../pages/Login.php");
    exit;
}

$username = Inputbeveiliging($_POST["username"]);
$passw = $_POST["passw"];

// $email = Inputbeveiliging($_POST["email"]); // email login uitgeschakeld

if (empty($username) || empty($passw)) {
    $_SESSION['login_message'] = "Vul alles in";
    // echo "empty fields: $username, $passw"; // debugte lege velden
    header("Location: ../pages/Login.php");
    exit;
}

// $username = strtolower($username); // case insensitive uitgeschakeld

$stmt = $pdo->prepare("SELECT id, username, password, role, active FROM users WHERE username = ? LIMIT 1");
// $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?"); // testte alle kolommen
$stmt->execute([$username]);

if ($stmt->rowCount() != 1) {
    $_SESSION['login_message'] = "Verkeerde login";
    // $stmt->debugDumpParams(); // PDO debug uitgeschakeld
    header("Location: ../pages/Login.php");
    exit;
}

$user = $stmt->fetch(PDO::FETCH_ASSOC);
// print_r($user); // testte user data

if ($user['active'] != 1) {
    $_SESSION['login_message'] = "Account niet actief";
    // echo "active: " . $user['active']; // testte active waarde
    header("Location: ../pages/Login.php");
    exit;
}


if (!password_verify($passw, $user['password'])) {
    $_SESSION['login_message'] = "Verkeerde login";
    // echo "hash: " . $user['password']; // testte password hash
    header("Location: ../pages/Login.php");
    exit;
}







$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['user_role'] = $user['role'];
// $_SESSION['email'] = $user['email']; // email sessie uitgeschakeld




//hier heb ik wel wat AI moeten gebruiken omdat ik een probleem had met zowel xampp en mysql workbench.
//groot deel van de code is nogsteeds door mij gedaan maar moest heel snel bepaalde problemen opgelost hebben












// $pdo->prepare("UPDATE users SET ldate = NOW() WHERE id = ?")->execute([$user['id']]); // verkeerde kolomnaam
$pdo->prepare("UPDATE users SET lldate = NOW() WHERE id = ?")->execute([$user['id']]);

unset($_SESSION['csrf_token']);
// setcookie('remember_me', '', time()-3600); // remember me uitgeschakeld

if ($user['role'] == 1) {
    header("Location: ../pages/admin.php");
    // echo "admin redirect"; // testte admin
} else {
    header("Location: ../pages/user.php");
    // echo "user redirect"; // testte user
}
exit;
