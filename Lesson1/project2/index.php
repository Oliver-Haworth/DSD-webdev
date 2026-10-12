<?php

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

$isChromium = (
    stripos($userAgent, 'Chrome') !== false ||
    stripos($userAgent, 'Chromium') !== false ||
    stripos($userAgent, 'Edg') !== false ||
    stripos($userAgent, 'OPR') !== false
);

if ($isChromium) {
    echo "<h1>USE FIREFOX</h1>";
}


include "./db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

$sql = "SELECT name FROM logintable";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($username === $row['name']) {
        echo "Correct username";
    } else {
        echo "Incorrect username.";
    }

    echo "<br>";

$sql = "SELECT hashedPassword FROM logintable";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($password === $row['hashedPassword']) {
        echo "Correct password";
    } else {
        echo "Incorrect password.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>

<body>
    <form method="POST" action="./login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>
