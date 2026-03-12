<body>


    <?php
    include("../elements/nav.php");
    ?>


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
    </head>


    <div>
        <h3>Registration</h1>
            <form action="../php/Registration_submit.php" method="post">


                <label for="name">Username</label><br>
                <input type="text" name="name" id="name" required placeholder="John Doe">


                <br><br>
                <label for="email">Email</label> <br>
                <input type="email" name="email" id="email" placeholder="Johndoe@gmail.com" required>
                <br><br>


                <label for="passw">Password</label><br>
                <input type="password" name="passw" id="passw" required placeholder="12345">
                <br>
                <br>


                <label for="passw1">Confirm password</label>
                <br>
                <input type="password" name="passw1" id="passw1" required placeholder="*****">
                <br>
                <br>

                <button type="submit" id="btn"> Submit</button>
                <br>

            </form>

            <p>Do you have an account? Login <a href="Login.php">here</a></p>
    </div>
    <?php

    include("../elements/footer.php");
    ?>
</body>