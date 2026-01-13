<?php
include '../config/db.php';
session_start();

if(!isset($_SESSION['user_id'])){
  header("location:../auth/login.php");
  exit;
}

$uid = $_SESSION['user_id'];

$conn->query("INSERT IGNORE INTO wallet(user_id) VALUES($uid)");
$wallet = $conn->query("SELECT * FROM wallet WHERE user_id=$uid")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Wallet | NovaShop</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<section class="section">
  <h2>My Wallet</h2>

  <div class="game-card" style="max-width:400px;">
    <div class="info">
      <h3>Balance</h3>
      <h1 style="color:#7aa2ff;">
        ฿<?= number_format($wallet['balance'],2) ?>
      </h1>

      <form method="post">
        <input type="number" step="0.01" name="amount" placeholder="Top-up amount">
        <br><br>
        <button name="topup" class="btn-primary">เติมเงิน</button>
      </form>
    </div>
  </div>

  <br>
  <a href="profile.php">⬅ Back to Profile</a>
</section>

<?php
if(isset($_POST['topup'])){
  $amount = $_POST['amount'];
  $conn->query("
    INSERT INTO wallet_topup(user_id,amount)
    VALUES($uid,$amount)
  ");
  echo "<p>⏳ รอแอดมินอนุมัติ</p>";
}
?>

</body>
</html>
