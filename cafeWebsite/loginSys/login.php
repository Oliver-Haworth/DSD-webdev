<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>café </title>
    <meta name="description" content="An independent neighbourhood cafe serving freshly roasted coffee and daily bakes.">

    <link rel="stylesheet" href="login.css">
</head>
<body>
    <nav class="navBar">
        <a href="/index.php" class="logo">
            Kettle Row <span class="coffee">Coffee</span>
        </a>

        <div class="right">
            <a href="./menu.php">Menu</a>
            <a href="./about.php">About</a>
            <a href="./contact.php">Contact</a>
        </div>
    </nav>

    <main>
        <div class="about">
            <h1>Login</h1>

            <div class="formWrapper">
                <!-- First Form -->
                <div>
                    <form method="post" action="">
                        <label for="name1">Name:</label>
                        <input type="text" id="name1" name="name1">
                        <input type="submit" value="Submit">
                    </form>
                </div>

                <!-- Second Form -->
                <div>
                    <form method="post" action="">
                        <label for="name2">Name:</label>
                        <input type="text" id="name2" name="name2">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
            </form>
            <button>Press Me!!!</button>
        </div>
    </main>

    <footer id="contact">
        <p>© Kettle Row Coffee — Made for the neighbourhood.</p>
    </footer>

</body>
</html>