<body>



    <?php
    include("../elements/nav.php");
    ?>

    <link rel="stylesheet" href="../css/contact_form.css">
    <form action="../php/contact_form_submit.php" method="post">

        <h2>
            <p>Contact & Service form</p>
        </h2>

        <label for="product_id">Please enter the product number here</label> <br>
        <input type="number" name="product_id" id="product_id" placeholder="1234567890">

        <br>
        <br>

        <label for="msg">Please write your complaint or feedback</label><br>
        <textarea name="message" id="msg" placeholder="Please remember to be respectful and considerate."></textarea>

        <br>
        <br>

        <label for="file">
            <p>Select a file or image (optional) </p>
        </label>

        <input type="file" name="file" id="file">

        <br>
        <br>

        <label for="email">
            <p>What Email can we contact you on?</p>
        </label>
        <input type="email" name="email" id="email" placeholder="Johndoe@gmail.com">

        <br>
        <br>

        <label for="phone">What Number can we contact you on?</label> <br>
        <input type="tel" name="phone" id="phone" placeholder="+32 xxxxxxxx">

        <br>
        <br>

        <button type="submit" id="btn"> Submit</button>

        <br>
    </form>

    <?php

    include("../elements/footer.php");
    ?>

</body>