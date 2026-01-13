<?php
if(!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])){
  $t = $_COOKIE['remember_token'];
  $q = $conn->query("SELECT id FROM users WHERE remember_token='$t'");
  if($q && $q->num_rows){
    $_SESSION['user_id'] = $q->fetch_assoc()['id'];
  }
}

?>
<?php if(isset($_SESSION['user_id'])): ?>
  <a href="/NovaShop/auth/logout.php">Logout</a>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>NovaShop</title>

<!-- ✅ CSS กลาง (ใช้ทุกหน้า) -->
<link rel="stylesheet" href="/NovaShop/assets/css/style.css">

</head>
<body>

<!-- TRUST BAR -->
<div class="trust-bar">
  🔒 SAFE & SECURE | ⭐ 4.8 / 5 Reviews | ⚡ Instant Digital Download
</div>

<!-- NAVBAR -->
<nav class="nav-main">
  <div class="nav-container">

    <div class="logo">NovaShop</div>

    <ul class="nav-menu">
      <li class="nav-item mega-parent">
        <span>PC</span>
        <div class="mega-menu">
          <div class="mega-col">
            <h6>PC Games</h6><br>
            <a href="https://store.steampowered.com/">Steam</a>
            <a href="https://store.epicgames.com/th/">Epic</a>
          </div>
          <div class="mega-col">
            <h6>Popular</h6><br>
            <a href="#">GTA V</a>
            <a href="#">Minecraft</a>
            <a href="#">Valorant</a>
          </div>
          <div class="mega-col">
            <h6>More</h6><br>
            <a href="allgamepage.html">All Games</a>
            <a href="#">New Releases</a>
          </div>
        </div>
      </li>

    <ul class="nav-menu">
      <li class="nav-item mega-parent">
        <span>Deal</span>
        <div class="mega-menu">
          <div class="mega-col">
            <h6>โค้ดส่วนลด !! </h6><br>
            <a href="Promotion.html">Go To Promotion </a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <span>Gift Cards</span></li>
    </ul>

    <div class="nav-right">
      <?php if(isset($_SESSION['user_id'])): ?>
        <a href="/NovaShop/user/profile.php">Profile</a>
      <?php else: ?>
        <a href="/NovaShop/auth/login.php">Login</a>
      <?php endif; ?>
      <a href="/NovaShop/cart.php">🛒 Cart</a>
    </div>

  </div>
</nav>
