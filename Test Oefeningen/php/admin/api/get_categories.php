<?php
require_once '../db_connect.php';

$stmt = $pdo->query("SELECT DISTINCT categorie FROM producten");
$cats = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo $cats

echo json_encode($cats);
