<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>BookBok BookShop - Basket</title>
    <link rel="stylesheet" href="global.css">
    <link data-n-head="ssr" rel="icon" type="image/png" href="/assets/Logo.png">
  </head>
  <body>

    <?php include 'header.php'; ?>
    
    <main>
        <div class="user-greeting" style="text-align: right; margin-bottom: 20px;">
            Logged in as: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
        </div>

        <h2 class="showcaseTitle">BASKET</h2>

        <div class="showcaseList">
          <div class="item">
            <img class="navBarLogo" src="assets/Logo.png" alt="BookBok logo">  
            <a href="blogs/book-collecting.php">Book</a>
          </div>

          <div class="item">
            <img class="navBarLogo" src="assets/Logo.png" alt="BookBok logo">  
            <a href="blogs/best-books.php">Book</a>
          </div>

          <div class="item">
            <img class="navBarLogo" src="assets/Logo.png" alt="BookBok logo">  
            <a href="blogs/pretending-to-read.php">Book</a>
          </div>
        </div>

  </main>
  </body>
</html>