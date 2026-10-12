<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>café </title>
    <meta name="description" content="An independent neighbourhood cafe serving freshly roasted coffee and daily bakes.">

    <link rel="stylesheet" href="index.css">
</head>
<body>

    <nav class="navBar">
        <a href="./index.php" class="logo">
            Kettle Row <span class="coffee">Coffee</span>
        </a>

        <div class="right">
            <a href="./menu.php">Menu</a>
            <a href="./about.php">About</a>
            <a href="./contact.php">Contact</a>
            
            <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true): ?>
                <span style="color: #666; font-size: 0.9rem; margin-right: 5px;">Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                <a href="./logout.php" style="color: #d9534f;">Logout</a>
            <?php else: ?>
                <a href="./login.php">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <main>
        <section class="hero" id="about">

            <div class="hero-content">
                <p class="eyebrow">BUY NOW OR ILL CHOP YOUR LIMBS OFF</p>
                <h1>
                    Good coffee,<br>
                    made by <span class="highlight">people</span><br>
                    you know.
                </h1>
                <p class="description">
                    An independent cafe on the corner of the row.
                    We roast small batches every week, bake each
                    morning and pour a flat white you can finish
                    before it cools.
                </p>
                </div>
            </div>

            <div class="coffee-stamp">
                <img src="./assets/independent.png" alt="independantly owned" height="200">
            </div>

        </section>

    </main>

    <footer id="contact">
        <p>© Kettle Row Coffee — Made for the neighbourhood.</p>
    </footer>

</body>
</html>