<?php
include("../config/db.php");
include("../includes/header.php");

// Only admin
if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../public/index.php");
    exit();
}

if(!isset($_GET['id'])){
    echo "Product not found"; include("../includes/footer.php"); exit;
}

$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($res);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Image upload
    if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
        $image = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/$image");
        $query = "UPDATE products SET name='$name', description='$description', price='$price', image='$image' WHERE id=$id";
    } else {
        $query = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id=$id";
    }

    if(mysqli_query($conn, $query)){
        echo "<div class='alert alert-success'>Product updated successfully.</div>";
        $res = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
        $product = mysqli_fetch_assoc($res);
    } else {
        echo "<div class='alert alert-danger'>Error: ".mysqli_error($conn)."</div>";
    }
}
?>

<h2>Edit Product</h2>
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>" required>
  </div>
  <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" required><?php echo $product['description']; ?></textarea>
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" class="form-control" value="<?php echo $product['price']; ?>" required>
  </div>
  <div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    <?php if($product['image'] != ''): ?>
        <img src="../assets/images/<?php echo $product['image']; ?>" height="100">
    <?php endif; ?>
  </div>
  <button type="submit" class="btn btn-primary">Update Product</button>
</form>

<?php include("../includes/footer.php"); ?>
