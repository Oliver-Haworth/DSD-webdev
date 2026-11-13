<?php
session_start();

$host = '127.0.0.1';
$db   = 'bookshop';
$user = 'root'; 
$pass = '';     
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['Username']);
    $password = trim($_POST['Password']);

    if (!empty($username) && !empty($password)) {
        
        $checkStmt = $pdo->prepare('SELECT ID FROM login WHERE User = :user');
        $checkStmt->execute(['user' => $username]);
        
        if ($checkStmt->rowCount() > 0) {
            $error = "That username is already taken. Please choose another one.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $insertStmt = $pdo->prepare('INSERT INTO login (User, HashedPassword) VALUES (:user, :password)');
            
            if ($insertStmt->execute(['user' => $username, 'password' => $hashedPassword])) {
                $success = "Account created successfully! You can now <a href='login.php'>log in here</a>.";
            } else {
                $error = "Something went wrong. Please try again.";
            }
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>BookBok BookShop - Sign Up</title>
    <link rel="stylesheet" href="global.css">
    <link data-n-head="ssr" rel="icon" type="image/png" href="assets/Logo.png">
  </head>
  <body>
    <?php include 'header.php'; ?>
    <main>

      <?php if ($error): ?>
          <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
      <?php endif; ?>

      <?php if ($success): ?>
          <p style="color: green;"><?php echo $success; ?></p>
      <?php else: ?>
          <form class="contactForm" method="POST" action="signup.php">
            <label for="Username">Choose a Username:</label>
            <input type="text" id="Username" name="Username" required>

            <label for="Password">Choose a Password:</label>
            <input type="password" id="Password" name="Password" required>
            
            <button type="submit">Sign Up</button>
          </form>
      <?php endif; ?>

    </main>
  </body>
</html>