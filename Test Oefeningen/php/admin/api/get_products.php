<?php
require_once '../db_connect.php';
// include '../db_connect.php';

$stmt = $pdo->query("SELECT id, naam, omschrijving, prijs, categorie FROM producten");
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($producten);
