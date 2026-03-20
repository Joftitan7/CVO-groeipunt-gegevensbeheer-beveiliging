<?php
require_once '../db_connect.php';

$input = file_get_contents("php://input");



$data = json_decode($input, true);



if (!isset($data['ids']) || !is_array($data['ids'])) {
    http_response_code(400);

    echo json_encode(['message' => 'Ongeldige input.']);
    exit;
}

$ids = $data['ids'];

// echo " 
// ";

// var_dump ($ids);

if (empty($ids)) {
    http_response_code(400);
    echo json_encode(['message' => 'Geen producten geselecteerd.']);
    exit;
}

$placeholders = implode(',', array_fill(0, count($ids), '?'));

$stmt = $pdo->prepare("DELETE FROM producten WHERE id IN ($placeholders)");

if ($stmt->execute($ids)) {
    echo json_encode(['message' => 'Producten succesvol verwijderd.']);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'Fout bij verwijderen.']);
}
