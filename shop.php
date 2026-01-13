<?php
include 'config/db.php';
session_start();
$res = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Shop | NovaShop</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="nav-main">
  <div class="nav-container">
    <div class="logo">NovaShop</div>

    <ul class="nav-menu">
      <li class="nav-item mega-parent">
        <span>PC</span>
        <div class="mega-menu">
          <div class="mega-col">
            <h6>PC Games</h6>
            <a href="#">Steam</a>
            <a href="#">Epic</a>
          </div>
        </div>
      </li>
      <li class="nav-item">Deals</li>
    </ul>

    <div class="nav-right">
      <a href="cart.php">🛒 Cart</a>
    </div>
  </div>
</nav>

<!-- SHOP -->
<section class="section">
  <h2>Best Sellers</h2>

  <div class="grid">
    <?php while($p = $res->fetch_assoc()): ?>
    <div class="game-card">

      <img src="assets/images/games/<?= $p['image'] ?? 'default.jpg' ?>">

      <div class="info">
        <b><?= htmlspecialchars($p['name']) ?></b>
        <div class="price">฿<?= number_format($p['price'],2) ?></div>

        <form method="post" action="cart.php">
          <input type="hidden" name="pid" value="<?= $p['id'] ?>">
          <button>Add to Cart</button>
        </form>

        <a href="product.php?id=<?= $p['id'] ?>" class="btn-primary" style="display:block;text-align:center;margin-top:10px;">
          BUY
        </a>
      </div>

    </div>
    <?php endwhile; ?>
  </div>
</section>

</body>
</html>
<?php
include 'config/db.php';

$cat = $_GET['cat'] ?? '';
$sql = "SELECT * FROM products";
if($cat){
  $sql .= " WHERE category_id = $cat";
}

$res = $conn->query($sql);
$cats = $conn->query("SELECT * FROM categories");
?>

<h2>Shop</h2>

<!-- CATEGORY FILTER -->
<form method="get">
  <select name="cat" onchange="this.form.submit()">
    <option value="">All Categories</option>
    <?php while($c = $cats->fetch_assoc()): ?>
      <option value="<?= $c['id'] ?>" <?= $cat==$c['id']?'selected':'' ?>>
        <?= $c['name'] ?>
      </option>
    <?php endwhile; ?>
  </select>
</form>

<hr>

<div class="grid">
<?php while($p = $res->fetch_assoc()): ?>
  <div class="game-card">
    <img src="assets/images/games/<?= $p['image'] ?>">
    <div class="info">
      <b><?= $p['name'] ?></b>
      <div class="price"><?= $p['price'] ?> ฿</div>
    </div>
  </div>
<?php endwhile; ?>
</div>
