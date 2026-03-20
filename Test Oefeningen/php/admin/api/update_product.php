<?php
require_once '../db_connect.php';

$data = json_decode(file_get_contents("php://input"), true);

$stmt = $pdo->prepare("
    UPDATE producten 
    SET naam = ?, omschrijving = ?, prijs = ?, categorie = ?
    WHERE id = ?
");

$stmt->execute([
    $data['naam'],
    $data['omschrijving'],
    $data['prijs'],
    $data['categorie'],
    $data['id']
]);

echo json_encode(["message" => "Product succesvol bijgewerkt!"]);
