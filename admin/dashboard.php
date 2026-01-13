<?php include 'admin_guard.php'; ?>
<h2>Admin Dashboard</h2>
<a href="products.php">Manage Products</a>
<?php
include 'admin_guard.php';
include '../config/db.php';

$users = $conn->query("SELECT COUNT(*) c FROM users")->fetch_assoc()['c'];
$orders = $conn->query("SELECT COUNT(*) c FROM orders")->fetch_assoc()['c'];
$sales = $conn->query("SELECT SUM(total) s FROM orders")->fetch_assoc()['s'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="../assets/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<section class="section">
<h2>Admin Dashboard</h2>

<div class="grid">
  <div class="game-card">
    <div class="info">👤 Users<br><b><?= $users ?></b></div>
  </div>
  <div class="game-card">
    <div class="info">📦 Orders<br><b><?= $orders ?></b></div>
  </div>
  <div class="game-card">
    <div class="info">💰 Revenue<br><b><?= number_format($sales,2) ?> ฿</b></div>
  </div>
</div>

<br><br>

<canvas id="salesChart"></canvas>
</section>

<script>
fetch('chart_data.php')
.then(res=>res.json())
.then(d=>{
 new Chart(document.getElementById('salesChart'),{
  type:'line',
  data:{
   labels:d.labels,
   datasets:[{
    label:'Sales',
    data:d.values,
    borderColor:'#7aa2ff'
   }]
  }
 })
})
</script>

</body>
</html>
