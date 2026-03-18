<body>

    <?php
    include("../elements/nav.php");
    ?>


    <main>
        <section>
            <fieldset>
                <legend>
                    <h3>Subscribe to our Newsletter</h3>
                </legend>
                <p>Stay updated with the latest innovations and services from Cybernetics Innovations.</p>

                <form action="../php/newsletter_submit.php" method="POST">
                    <?php
                    $crsf = GenerateCSRF();
                    ?>
                    <input type="hidden" hidden name="csrf_token" value="<?php echo $crsf; ?>">

                    <input type="email" name="email" placeholder="Enter your email address" required>
                    <button type="submit">Subscribe</button>
                </form>
            </fieldset>

        </section>
    </main>


    <?php
    include "../elements/footer.php";
    ?>
</body>