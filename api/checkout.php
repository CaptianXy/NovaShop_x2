<?php
session_start();
require_once "config/db.php";

if (!isset($_SESSION['user_id'])) {
  header("Location: auth/login.php");
  exit;
}

$user_id = $_SESSION['user_id'];
$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
  header("Location: cart.php");
  exit;
}

/* ดึง wallet */
$q = $db->prepare("SELECT balance FROM wallet WHERE user_id=?");
$q->execute([$user_id]);
$wallet = $q->fetch(PDO::FETCH_ASSOC);

$total = array_sum(array_column($cart,'price'));

if ($wallet['balance'] < $total) {
  die("ยอดเงินไม่พอ");
}

/* หักเงิน */
$db->prepare("UPDATE wallet SET balance = balance - ? WHERE user_id=?")
   ->execute([$total,$user_id]);

/* เพิ่มเข้า library */
foreach ($cart as $item) {
  $db->prepare("
    INSERT INTO library (user_id, product_id)
    VALUES (?,?)
  ")->execute([$user_id,$item['id']]);
}

/* เคลียร์ cart */
$_SESSION['cart'] = [];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Checkout Success</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="checkout-success">
  <h1>🎉 Purchase Successful</h1>
  <p>Your games have been added to your library.</p>

  <a href="users/library.php" class="btn-primary">Go to Library</a>
  <a href="index.php" class="btn-secondary">Back to Home</a>
</div>

</body>
</html>
