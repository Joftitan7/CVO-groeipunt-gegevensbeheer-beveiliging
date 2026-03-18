<?php

include("../elements/nav.php");
include("../php/beveiliging.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // CSRF check
    if (!ValidateCSRF($_POST['csrf_token'])) {
        die("Ongeldig verzoek (CSRF).");
    }




    if (
        !empty($_POST["name"]) && $_POST["email"] && $_POST["passw"] && $_POST["passw1"]
    ) {

        // $_POST["name"]) && isset($_POST["email"]) && isset($_POST["passw"]) && isset($_POST["passw1"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)

        $email = Emailbeveiliging($_POST["email"]);
        $name = Inputbeveiliging($_POST["name"]);

        echo "{ <br>
        name: {$name} <br>
        email: {$email} <br>
        password: {$_POST['passw']} <br>
        confirmed password: {$_POST['passw1']} <br>
    }";
    } else {
        die("there was an error");
    }

    // delete csrf token after use
    unset($_SESSION['csrf_token']);
}


include "../elements/footer.php";
