<?php

include("../php/beveiliging.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!ValidateCSRF($_POST['csrf_token'])) {
        die("Ongeldig verzoek (CSRF).");
    }
    $email = Emailbeveiliging($_POST["email"]);

    echo "Thank you for subscribing!<br>";
    echo "Email: " . $email;
}


include "../elements/footer.php";
