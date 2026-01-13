<?php
include '../config/db.php';
session_start();

if(!isset($_SESSION['user_id'])){
  header("location:../auth/login.php");
  exit;
}

$uid = $_SESSION['user_id'];
$user = $conn->query("SELECT * FROM users WHERE id=$uid")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>My Profile | NovaShop</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<section class="section">
  <h2>My Profile</h2>

  <div class="game-card" style="max-width:500px;">
    <div class="info">
      <p><b>Email:</b> <?= htmlspecialchars($user['email']) ?></p>
      <p><b>Role:</b> <?= $user['role'] ?></p>
      <p><b>Joined:</b> <?= $user['created_at'] ?></p>

      <hr>

      <a href="profile.php?edit=1" class="btn-primary">⚙ ตั้งค่าโปรไฟล์</a>
      <br><br>
      <a href="wallet.php">💰 Wallet</a> |
      <a href="orders.php">📦 Orders</a> |
      <a href="library.php">🎮 Library</a>
    </div>
  </div>
</section>

<?php if(isset($_GET['edit'])): ?>
<section class="section">
  <h3>แก้ไขโปรไฟล์</h3>

  <form method="post">
    <input name="email" value="<?= $user['email'] ?>">
    <br><br>
    <button name="save" class="btn-primary">Save</button>
  </form>
</section>
<?php endif; ?>

<?php
if(isset($_POST['save'])){
  $email = $_POST['email'];
  $conn->query("UPDATE users SET email='$email' WHERE id=$uid");
  header("location:profile.php");
}
?>

</body>
</html>
