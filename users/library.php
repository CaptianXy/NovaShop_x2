<?php
session_start();
require_once "../config/db.php";

if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
  exit;
}

$user_id = $_SESSION['user_id'];

$q = $db->prepare("
  SELECT p.name,p.image
  FROM library l
  JOIN products p ON l.product_id = p.id
  WHERE l.user_id=?
");
$q->execute([$user_id]);
$games = $q->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Library</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="section">
  <h2>🎮 My Library</h2>

  <div class="grid">
    <?php foreach ($games as $g): ?>
      <div class="game-card">
        <img src="../assets/images/<?= $g['image'] ?>">
        <div class="info">
          <strong><?= $g['name'] ?></strong>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <br>
  <a href="../index.php" class="btn-secondary">⬅ Back to Home</a>
</div>

</body>
</html>
