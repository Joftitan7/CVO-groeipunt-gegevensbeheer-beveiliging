<?php

include("../elements/nav.php");


if (isset($_POST["username"])) {



    echo $_POST["username"] . ", you have been logged in";
} else {
    echo $_POST["username"] . "was not logged in";
    exit;
}
