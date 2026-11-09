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
        
        <div class="showcaseGrid">
          <div class="item">
            <img class="navBarLogo" src="assets/Logo.png" alt="BookBok logo">  
            <a href="basket.php">Book</a>
          </div>

          <div class="item">
            <img class="navBarLogo" src="assets/Logo.png" alt="BookBok logo">  
            <a href="basket.php">Book</a>
          </div>

          <div class="item">
            <img class="navBarLogo" src="assets/Logo.png" alt="BookBok logo">  
            <a href="basket.php">Book</a>
          </div>
        </div>
  </main>
  </body>
</html>