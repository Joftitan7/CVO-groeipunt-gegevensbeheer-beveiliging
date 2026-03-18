<?php
include("../elements/nav.php");
include("../php/beveiliging.php");



// if ( isset( $_POST["product"] ) ) {

// } else {

//product_number
// }

// echo $new;


//
// echo session_status() === PHP_SESSION_NONE;


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // CSRF check
    if (!ValidateCSRF($_POST['csrf_token'])) {
        die("Ongeldig verzoek (CSRF).");
    }




    // sanitize input
    $email = Emailbeveiliging($_POST["email"]);
    $message = Inputbeveiliging($_POST["message"]);


    echo "{ <br>
        product ID: {$_POST['product_id']} <br>
        email: {$email} <br>
        message: {$message} <br>
        number: {$_POST['phone']} <br>
    }";


    //delete csrf token after use
    unset($_SESSION['csrf_token']);
}

//delete later


include "../elements/footer.php";
