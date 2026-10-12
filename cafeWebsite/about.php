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
        </div>
    </nav>

    <main>
        <div class=about>
            <h1>About us</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software like Aldus PageMaker and Microsoft Word including versions of Lorem Ipsum.</p>
        </div>
    </main>

    <footer id="contact">
        <p>© Kettle Row Coffee — Made for the neighbourhood.</p>
    </footer>

</body>
</html>