<body>
    <?php
    include("../elements/nav.php");
    ?>

    <head>
        <title>Login</title>
    </head>


    <div>
        <h3>Login</h1>
            <form action="../php/Login_submit.php" method="post">
                <label for="name">Username</label><br>
                <input type="text" name="username" id="username" required placeholder="John Doe">
                <br><br>
                <label for="passw">Password</label><br>
                <input type="password" name="passw" id="passw" required placeholder="12345">
                <br><br>
                <button type="submit" id="btn"> Submit</button>
                <br>


            </form>

            <p>Don't have an account? Register <a href="Registration.php">here</a></p>
    </div>

    <?php

    include("../elements/footer.php");
    ?>
</body>