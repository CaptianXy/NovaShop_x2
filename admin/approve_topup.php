<?php
include 'admin_guard.php';
include '../config/db.php';

$res = $conn->query("SELECT * FROM wallet_topup WHERE status='pending'");

while($t = $res->fetch_assoc()){
  echo "{$t['user_id']} | {$t['amount']} ฿ 
  <a href='?ok={$t['id']}'>Approve</a><br>";
}

if(isset($_GET['ok'])){
  $id = $_GET['ok'];
  $t = $conn->query("SELECT * FROM wallet_topup WHERE id=$id")->fetch_assoc();

  $conn->query("
    UPDATE wallet 
    SET balance = balance + {$t['amount']}
    WHERE user_id = {$t['user_id']}
  ");

  $conn->query("UPDATE wallet_topup SET status='approved' WHERE id=$id");
  header("refresh:0");
}
?>
