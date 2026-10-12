<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect('localhost', 'root', '', 'cafewebsite');
    
    if (!$conn) {
        die('Connect failed: ' . mysqli_connect_error());
    }

    $user = trim($_POST['username']);
    // Storing plaintext password directly (without hashing)
    $pass = $_POST['password'];

    // Check if username already exists
    $check_stmt = $conn->prepare("SELECT id FROM login WHERE username = ?");
    $check_stmt->bind_param("s", $user);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        $error_message = "Username is already taken. Please choose another.";
    } else {
        $stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $user, $pass);
        
        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            $error_message = "Error signing up. Please try again.";
        }
        $stmt->close();
    }
    $check_stmt->close();
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café - Sign Up</title>
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
            <a href="./login.php">Login</a>
        </div>
    </nav>

    <main>
        <div class="about">
            <h1>Sign Up</h1>

            <?php if (!empty($error_message)): ?>
                <p style="color: red; margin-bottom: 15px;"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>

            <div class="formWrapper">
                <form method="post" action="sighnup.php">
                    <div>
                        <label for="name1">Username:</label>
                        <input type="text" id="name1" name="username" required>
                    </div>

                    <div>
                        <label for="name2">Password:</label>
                        <input type="password" id="name2" name="password" required>
                    </div>

                    <div style="margin-top: 15px;">
                        <input type="submit" value="Sign Up">
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