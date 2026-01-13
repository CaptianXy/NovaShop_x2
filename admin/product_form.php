<?php
include 'admin_guard.php';
include '../config/db.php';

$cats = $conn->query("SELECT * FROM categories");
?>

<h2>Add Product</h2>

<form method="post" enctype="multipart/form-data">
  <input name="name" placeholder="Game name" required><br><br>
  <input name="price" type="number" step="0.01" placeholder="Price" required><br><br>

  <select name="category_id">
    <?php while($c = $cats->fetch_assoc()): ?>
      <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
    <?php endwhile; ?>
  </select><br><br>

  <input type="file" name="image" required><br><br>

  <textarea name="description" placeholder="Description"></textarea><br><br>

  <button name="save">Save</button>
</form>

<?php
if(isset($_POST['save'])){
  $name = $_POST['name'];
  $price = $_POST['price'];
  $cat = $_POST['category_id'];
  $desc = $_POST['description'];

  $img = time().'_'.$_FILES['image']['name'];
  move_uploaded_file(
    $_FILES['image']['tmp_name'],
    "../assets/images/games/$img"
  );

  $conn->query("
    INSERT INTO products(name,price,image,description,category_id)
    VALUES('$name','$price','$img','$desc','$cat')
  ");

  echo "✅ Product added";
}
?>
