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
                <!-- Combined into a single form -->
                <form method="post" action="login.php">
                    <div>
                        <label for="name1">Username:</label>
                        <input type="text" id="name1" name="username" required>
                    </div>

                    <div>
                        <label for="name2">Password:</label>
                        <!-- Changed type to "password" to hide input characters -->
                        <input type="password" id="name2" name="password" required>
                    </div>

                    <div style="margin-top: 15px;">
                        <input type="submit" value="Log In">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer id="contact">
        <p>© Kettle Row Coffee — Made for the neighbourhood.</p>
    </footer>

</body>
</html>

<?php
// Start a session to track logged-in users
session_start();

// Database credentials
$host = 'localhost';
$user = 'root';
$pass = ''; // Defined the missing password variable
$dbname = 'cafewebsite';

// Connect to the database
$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die('Connect failed: ' . mysqli_connect_error());
}

// Check if the login form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get inputs from the form
    $input_user = $_POST['username'];
    $input_pass = $_POST['password'];

    // Query to find the user in the 'login' table
    $sql = "SELECT * FROM login WHERE username = '$input_user' AND password = '$input_pass'";
    $result = $conn->query($sql);

    // If a matching row is found, log them in
    if ($result->num_rows == 1) {
        $_SESSION['username'] = $input_user;
        echo "Login successful! Welcome back, " . htmlspecialchars($input_user);
        // You can redirect them to another page using: header("Location: dashboard.php");
    } else {
        echo "Invalid username or password. Please try again.";
    }
}

mysqli_close($conn);
?>