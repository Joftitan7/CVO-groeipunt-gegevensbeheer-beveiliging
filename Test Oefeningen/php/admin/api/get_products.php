<?php
require_once '../db_connect.php';




// require_once '../db_connect.php';
// // include '../db_connect.php';

// $stmt = $pdo->query("SELECT id, naam, omschrijving, prijs, categorie FROM producten");
// $producten = $stmt->fetchAll(PDO::FETCH_ASSOC);

// header('Content-Type: application/json');
// echo json_encode($producten);







// // 






$naam = $_GET['naam'] ?? '';
$categorie = $_GET['categorie'] ?? '';

$sql = "SELECT * FROM producten WHERE 1=1";
$params = [];

if (!empty($naam)) {
    $sql .= " AND naam LIKE ?";
    $params[] = "%$naam%";
}

if (!empty($categorie)) {
    $sql .= " AND categorie = ?";
    $params[] = $categorie;
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($producten);
