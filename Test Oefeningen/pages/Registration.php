<?php
include("../elements/nav.php");
include("../php/beveiliging.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <div>
        <h3>Registration</h3>

        <?php
        // Eventuele boodschap uit registration_submit
        if (isset($_SESSION['reg_message'])) {
            echo "<p>" . htmlspecialchars($_SESSION['reg_message']) . "</p>";
            unset($_SESSION['reg_message']);
        }

        $csrf = GenerateCSRF();
        ?>

        <form action="../php/Registration_submit.php" method="post">
            <fieldset>
                <legend>Personalia</legend>

                <label for="name">Username</label><br>
                <input type="text" name="name" id="name" required placeholder="JohnDoe"
                    pattern="[A-Za-z0-9_]+" maxlength="50">
                <br><br>

                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required
                    placeholder="johndoe@gmail.com"
                    pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" maxlength="255">
                <br><br>

                <label for="passw">Password</label><br>
                <input type="password" name="passw" id="passw" required placeholder="*****">
                <br><br>

                <label for="passw1">Confirm password</label><br>
                <input type="password" name="passw1" id="passw1" required placeholder="*****">
                <br><br>

                <input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>">
                <button type="submit" id="btn">Submit</button>
            </fieldset>
        </form>

        <p>Do you have an account? Login <a href="Login.php">here</a></p>
    </div>

    <?php include("../elements/footer.php"); ?>
</body>

</html>