<?php
require_once '../db_connect.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM producten WHERE id = ?");
$stmt->execute([$id]);

$product = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($product);
