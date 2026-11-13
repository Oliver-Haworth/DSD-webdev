<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="saleBar">
  Free shipping on<br> orders over £25!! 🎁
</div>

<div class="navBar">
  <div class="navBarContent">
    <a href="index.php">
      <img class="navBarLogo" src="assets/Logo.png" alt="BookBok BookShop logo">  
    </a>
    <a class="navBarLink" href="about.php">ABOUT</a>
    <a class="navBarLink" href="books.php">BOOKS</a>
    <a class="navBarLink" href="contact.php">CONTACT</a>
  </div>

  <div class="navBarContent">
    <img class="searchIcon" src="assets/searchIcon.png" alt="magnifying glass icon">
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <span class="navBarLink">Hi, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
        <a class="navBarLink" href="basket.php">BASKET</a>
        <a class="navBarLink" href="logout.php">LOGOUT</a>
    <?php else: ?>
        <a class="navBarLink" href="login.php">LOGIN</a>
        <a class="navBarLink" href="signup.php">SIGN UP</a>
        <a class="navBarLink" href="basket.php">BASKET</a>
    <?php endif; ?>
  </div>
</div>