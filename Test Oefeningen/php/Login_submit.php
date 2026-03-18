<?php

include("../elements/nav.php");
include("../php/beveiliging.php");




if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // CSRF check
    if (!ValidateCSRF($_POST['csrf_token'])) {
        die("Ongeldig verzoek (CSRF).");
    }

    if (isset($_POST["username"])) {

        echo Inputbeveiliging($_POST["username"]) . ", you have been logged in";
    }

    // echo $_POST["username"] . ", you have been logged in";
    else {
        die("there was an error logging in");
    }



    //delete csrf token after use
    unset($_SESSION['csrf_token']);
}


include "../elements/footer.php";
