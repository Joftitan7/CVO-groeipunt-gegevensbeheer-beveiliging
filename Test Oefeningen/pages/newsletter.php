<body>

    <?php
    include("../elements/nav.php");
    ?>


    <main>
        <section>
            <h3>Subscribe to our Newsletter</h3>
            <p>Stay updated with the latest innovations and services from Cybernetics Innovations.</p>

            <form action="../php/newsletter_submit.php" method="POST">
                <input type="email" name="email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </section>
    </main>


    <?php
    include "../elements/footer.php";
    ?>
</body>