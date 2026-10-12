<?php
// echo 'Hello, World! ';

// $name = 'Alice';
// $age = 25;
// $price = 4.99;
// $isMember = true;

// echo '<br>Name: ' . $name;
// echo '<br>Age ' . $age
?>
<body>
<?php
echo 'Hello World!';
echo '<br>';
print 'Welcome to PHP!';

$course = 'DSD y2';
echo '<p>Course: ' .$course . '</p>';

$age = 18;
\\
if ($age >= 18) {
    echo 'you are an adult.';
} else {
    echo 'you are a minor.';
}

for ($i = 1; $i <= 10; $i++) {
    $names = ['Alice', 'Bob', 'Charlie'];
    foreach ($names as $name) {
        echo '<p>' . $name . '</p>';
    }
}

?>
</body>
<head>
<meta charset="UTF-8">
<title>PAGE</title>
</head>