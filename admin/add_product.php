<?php
include("../config/db.php");
include("../includes/header.php");

// Only admin
if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../public/index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Escape user input to prevent SQL syntax errors
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Image upload
    $image = '';
    if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
        $image = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/$image");
    }

    // Safe SQL query
    $query = "INSERT INTO products (name, description, price, image) 
              VALUES ('$name', '$description', '$price', '$image')";

    if(mysqli_query($conn, $query)){
        echo "<div class='alert alert-success'>Product added successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: ".mysqli_error($conn)."</div>";
    }
}
?>

<h2>Add New Product</h2>
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" required></textarea>
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Add Product</button>
</form>

<?php include("../includes/footer.php"); ?>
