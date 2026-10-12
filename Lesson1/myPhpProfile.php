<body>
<?php
$name = 'Oliver';
$age = 17;
$favorateWebsite = 'https://neal.fun';

if ($age >= 18) {
    echo '<h1>You are an adult.</h1>';
} else {
    echo '<h1>You are a minor.</h1>';
}

echo '<p>' . $name . ': ' . $age . ' and ' . $favorateWebsite . '</p>';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? '';

    if ($name == '') {
        echo '<p>Invalid input, try again.</p>';
    } else {
        echo '<h1>Hello, ' . htmlspecialchars($name) . '!</h1>';
    }
}

$conn = mysqli_connect('localhost', 'root', '', 'lesson4');

if(!$conn) {
    die('Connect failed: ' . mysqli_connect_error());
}

echo 'connected sucessfully';

#$sql = "INSERT INTO books (title, author, year)
#VALUES ('AAAAAGH IM DROWNING', 'myself', '1503')";

#if (mysqli_query($conn, $sql)) {
#    echo 'new reccord made';
#} else {
#    echo 'no, fuck off';
#}

$result = $conn->query("SELECT * FROM books");
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>";
    echo "Title:" . $row['title'] . "|" . $row['author'] . "|" . $row['year'];
    echo "</li>";
}
echo "</ul>";

$sql = "UPDATE books
SET title = 'IM DROWNING AND BURNING' 
WHERE title = 'AAAAAGH IM DROWNING'";
mysqli_query($conn, $sql);
?>

<form method="post" action="">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <input type="submit" value="Submit">
</form>
</body>
