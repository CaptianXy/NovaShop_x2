<?php include 'admin_guard.php'; include '../config/db.php'; ?>
<a href="product_form.php">+ Add Product</a>
<?php
$res=$conn->query("SELECT * FROM products");
while($p=$res->fetch_assoc()){
 echo $p['name']." - ".$p['price']."<br>";
}
