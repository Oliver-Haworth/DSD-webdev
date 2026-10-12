<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>café </title>
    <meta name="description" content="An independent neighbourhood cafe serving freshly roasted coffee and daily bakes.">

    <link rel="stylesheet" href="about.css">
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
        <div class=about>
            <h1>contact us</h1>
            <a href="https://gofuckyourself@gmail.com">gofuckyourself@gmail.com</a>
        </div>
    </main>

    <footer id="contact">
        <p>© Kettle Row Coffee — Made for the neighbourhood.</p>
    </footer>

</body>
</html>