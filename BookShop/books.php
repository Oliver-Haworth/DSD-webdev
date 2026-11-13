<?php
$host = '127.0.0.1';
$dbname = 'bookshop';
$user = 'root';
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->query("SELECT * FROM books");
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>BookBok BookShop</title>
    <link rel="stylesheet" href="global.css">
    <link data-n-head="ssr" rel="icon" type="image/png" href="/assets/Logo.png">
  </head>
  <body>

    <?php include 'header.php'; ?>
    
    <main>
<!-- =================== Hero ==========================-->
        <section class="hero">
          <img class="heroImage" src="assets/indexHero.png" alt="Painted landscape background">
          <div class="heroContent">
            <h1 class="heroTitle">
              <span class="titleBlack">BOOK BOK</span>
              <br>
              <span class="titlePink">BOOKS</span>
            </h1>
          </div>
        </section>

        <h2 class="showcaseTitle">TOP SELLERS OF THE MONTH</h2>
        
        <!-- =================== Dynamic Book Grid ==========================-->
        <div class="showcaseGrid">
          
          <?php if (count($books) > 0): ?>
              <?php foreach ($books as $book): ?>
                  <div class="item">
                    <img class="navBarLogo" src="<?= htmlspecialchars($book['imgAdress']) ?>.png" alt="<?= htmlspecialchars($book['title']) ?>">  
                    
                    <h4><?= htmlspecialchars($book['title']) ?></h4>
                    <p><?= htmlspecialchars($book['athour']) ?></p>
                    <p>£<?= htmlspecialchars($book['price']) ?></p>
                    
                    <a href="basket.php?id=<?= urlencode($book['id']) ?>">Add to Basket</a>
                  </div>
              <?php endforeach; ?>
          <?php else: ?>
              <p>No books currently available.</p>
          <?php endif; ?>

        </div>
  </main>
  </body>
</html>