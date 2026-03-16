<?php

include("../elements/nav.php");


if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["passw"]) && isset($_POST["passw1"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

    echo "{ <br>
        name: {$_POST['name']} <br>
        email: {$_POST['email']} <br>
        password: {$_POST['passw']} <br>
        confirmed password: {$_POST['passw1']} <br>
    }";
} else {
    echo "there was an error " . isset($_POST["name"]) . isset($_POST["email"]) . isset($_POST["passw"]) . isset($_POST["passw1"]) . isset($_POST["gender"]);
    exit;
}
