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
    <title>Login</title>
</head>

<body>
    <div>
        <h3>Login</h3>

        <?php
        if (isset($_SESSION['login_message'])) {
            echo "<p>" . htmlspecialchars($_SESSION['login_message']) . "</p>";
            unset($_SESSION['login_message']);
        }

        $csrf = GenerateCSRF();
        ?>

        <form action="../php/Login_submit.php" method="post">
            <fieldset>
                <legend>Login</legend>

                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" required
                    placeholder="JohnDoe" pattern="[A-Za-z0-9_]+">
                <br><br>

                <label for="passw">Password</label><br>
                <input type="password" name="passw" id="passw" required placeholder="*****">
                <br><br>

                <input type="hidden" name="csrf_token" value="<?php echo $csrf; ?>">
                <button type="submit" id="btn">Login</button>
            </fieldset>
        </form>

        <p>No account yet? Register <a href="Registration.php">here</a></p>
    </div>

    <?php include("../elements/footer.php"); ?>
</body>

</html>