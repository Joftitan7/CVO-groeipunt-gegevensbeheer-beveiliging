<?php
session_start();

// if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 1) {
//     header("Location:../../../pages/Login.php");
//     exit;
// }
// hier admin‑content



?>


<!DOCTYPE html>
<html lang="nl">

<link rel="stylesheet" href="admin.css">

<head>
    <meta charset="UTF-8">
    <title>Admin – Producten</title>
</head>

<body>

    <h3>Filteren</h3>

    <label for="filterNaam">Zoek op naam:</label>
    <input type="text" id="filterNaam" placeholder="Naam...">

    <label for="filterCategorie">Filter op categorie:</label>
    <select id="filterCategorie">
        <option value="">-- Alle categorieën --</option>
    </select>

    <button id="filterButton">Filter</button>
    <br><br>



    <h2>Nieuw product toevoegen</h2>

    <form id="addProductForm">
        <input type="text" name="naam" placeholder="Naam" required>
        <input type="text" name="omschrijving" placeholder="Omschrijving" required>
        <input type="number" step="0.01" name="prijs" placeholder="Prijs" required>
        <input type="text" name="categorie" placeholder="Categorie" required>
        <button type="submit">Toevoegen</button>
    </form>

    <div id="updateModal" style="display:none;">
        <form id="updateForm">
            <h3>Product wijzigen</h3>

            <input type="hidden" id="updateId" name="id">

            <label>Naam:</label>
            <input type="text" id="updateNaam" name="naam" required>

            <label>Omschrijving:</label>
            <textarea id="updateOmschrijving" name="omschrijving" required></textarea>

            <label>Prijs:</label>
            <input type="number" step="0.01" id="updatePrijs" name="prijs" required>

            <label>Categorie:</label>
            <input type="text" id="updateCategorie" name="categorie" required>

            <button type="button" id="cancelUpdate">Annuleer</button>
            <button type="submit">Update</button>
        </form>
    </div>
    <hr>

    <h3>Producten</h1>

        <table id="productenTable">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Omschrijving</th>
                    <th>Prijs</th>
                    <th>Categorie</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <br><br>
        <button id="deleteSelectedButton" class="btn-annuleer">Verwijder geselecteerde producten</button>


        <script src="admin.js"></script>
</body>

</html>