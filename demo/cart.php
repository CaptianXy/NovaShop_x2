<?php
session_start();

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

if (isset($_GET['remove'])) {
  unset($_SESSION['cart'][$_GET['remove']]);
  header("Location: cart.php");
  exit;
}

$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cart | NovaShop</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="nav-main">
  <div class="nav-container">
    <div class="logo">NovaShop</div>
    <div class="nav-right">
      <a href="index.php">Home</a>
      <a href="shop.php">Shop</a>
    </div>
  </div>
</div>

<div class="cart-wrapper">

  <!-- LEFT : CART ITEMS -->
  <div class="cart-left">
    <h2>Your Cart</h2>

    <?php if (empty($_SESSION['cart'])): ?>
      <p class="empty-text">Your cart is empty.</p>
    <?php else: ?>

      <?php foreach ($_SESSION['cart'] as $id => $item):
        $total += $item['price'];
      ?>
      <div class="cart-item">
        <img src="assets/images/<?= $item['image'] ?>" alt="">
        <div class="cart-info">
          <strong><?= $item['name'] ?></strong>
          <span>฿<?= number_format($item['price'],2) ?></span>
        </div>
        <a href="?remove=<?= $id ?>" class="remove-btn">✕</a>
      </div>
      <?php endforeach; ?>

    <?php endif; ?>
  </div>

  <!-- RIGHT : SUMMARY -->
  <div class="cart-right">
    <h3>Summary</h3>

    <div class="summary-row">
      <span>Total</span>
      <strong>฿<?= number_format($total,2) ?></strong>
    </div>

    <a href="checkout.php">
      <button class="checkout-btn">Proceed to Checkout</button>
    </a>
  </div>
<button onclick="addToCart(this)">Add to Cart</button>

</div>

</body>
</html>
