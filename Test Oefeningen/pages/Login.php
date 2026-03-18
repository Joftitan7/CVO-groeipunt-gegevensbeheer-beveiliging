<body>
    <?php
    include("../elements/nav.php");
    include("../php/beveiliging.php");
    ?>

    <head>
        <title>Login</title>
    </head>


    <div>
        <fieldset class="field">
            <legend>
                <h3>login</h3>
            </legend>
            <form action="../php/Login_submit.php" method="post">


                <?php
                $csrf = GenerateCSRF();


                ?>


                <label for="name">Username</label><br>
                <input type="text" name="username" id="username" required placeholder="John Doe">
                <br><br>
                <label for="passw">Password</label><br>
                <input type="password" name="passw" id="passw" required placeholder="12345">
                <br><br>
                <input type="hidden" hidden name="csrf_token" value="<?php echo $csrf; ?>">
                <button type="submit" id="btn"> Submit</button>
                <br>


            </form>
        </fieldset>

        <p>Don't have an account? Register <a href="Registration.php">here</a></p>
    </div>

    <?php

    include("../elements/footer.php");
    ?>
</body>