<?php
include "./db.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT name, hashedPassword FROM logintable WHERE name=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0) {
        $stmt->bind_result($dbUser, $dbPassword);
        $stmt->fetch();

        if (password_verify($password, $dbPassword)) {
            echo "Login Successful";
            // TODO : START SESSION AND REDIRECT
        } else {
            echo "Incorrect password";
        }
    } else { // 205
        echo "Username is not in database. May be a spelling mistake.";
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Not requested. dead.";
}
?>