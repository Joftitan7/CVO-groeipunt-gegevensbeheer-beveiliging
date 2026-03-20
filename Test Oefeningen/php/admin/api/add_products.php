<?php
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $naam = $_POST['naam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $categorie = $_POST['categorie'];

    $stmt = $pdo->prepare("INSERT INTO producten (naam, omschrijving, prijs, categorie) 
                        VALUES (:naam, :omschrijving, :prijs, :categorie)");

    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':omschrijving', $omschrijving);
    $stmt->bindParam(':prijs', $prijs);
    $stmt->bindParam(':categorie', $categorie);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Product toegevoegd!"]);
    } else {
        echo json_encode(["message" => "Fout bij toevoegen"]);
    }
}
