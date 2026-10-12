<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// If already logged in, skip the login page and go straight to about.php
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    header("Location: ./index.php");
    exit();
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $user = 'root';
    $pass = ''; 
    $dbname = 'cafewebsite';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die('Connect failed: ' . mysqli_connect_error());
    }

    $input_user = trim($_POST['username']);
    $input_pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM login WHERE username = ?");
    $stmt->bind_param("s", $input_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Recommended: Use password_verify() if passwords are hashed. 
        // Using plain text comparison ($input_pass === $row['password']) only if stored as plain text:
        if ($input_pass === $row['password']) {
            session_regenerate_id(true);

            $_SESSION["logged_in"] = true;
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["username"] = $row['username'];

            header("Location: ./index.php");
            exit();
        } else {
            $error_message = "Invalid username or password. Please try again.";
        }
    } else {
        $error_message = "Invalid username or password. Please try again.";
    }

    $stmt->close();
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café - Login</title>
    <link rel="stylesheet" href="login.css">
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
        <div class="about">
            <h1>Login</h1>

            <?php if (!empty($error_message)): ?>
                <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>

            <div class="formWrapper">
                <form method="post" action="login.php">
                    <div>
                        <label for="name1">Username:</label>
                        <input type="text" id="name1" name="username" required>
                    </div>

                    <div>
                        <label for="name2">Password:</label>
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