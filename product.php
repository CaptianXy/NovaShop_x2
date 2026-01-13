<?php
include 'config/db.php';
$id = $_GET['id'];
$p = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<title><?= $p['name'] ?> | NovaShop</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<section class="section">
  <div class="grid" style="grid-template-columns:1fr 1fr;">

    <img src="assets/images/games/<?= $p['image'] ?? 'default.jpg' ?>" style="width:100%;border-radius:20px;">

    <div>
      <h1><?= $p['name'] ?></h1>
      <p style="color:#cbd1ff;margin:10px 0;">
        Digital download • Instant delivery
      </p>

      <h2 style="color:#7aa2ff;">฿<?= number_format($p['price'],2) ?></h2>

      <form method="post" action="cart.php">
        <input type="hidden" name="pid" value="<?= $p['id'] ?>">
        <button class="btn-primary">ADD TO CART</button>
      </form>

    </div>

  </div>
</section>

</body>
</html>
