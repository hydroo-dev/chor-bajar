<?php include("../config/db.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
if(!isset($_GET['id'])){
    echo "<div class='alert alert-danger'>Product not found.</div>";
    include("../includes/footer.php"); exit;
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
if(mysqli_num_rows($result) == 0){
    echo "<div class='alert alert-danger'>Product does not exist.</div>";
    include("../includes/footer.php"); exit;
}
$p = mysqli_fetch_assoc($result);
?>

<div class="row">
  <div class="col-md-6">
    <?php if(!empty($p['image'])): ?>
      <img src="../assets/images/<?php echo $p['image']; ?>" class="img-fluid">
    <?php else: ?>
      <img src="https://via.placeholder.com/400" class="img-fluid">
    <?php endif; ?>
  </div>
  <div class="col-md-6">
    <h2><?php echo $p['name']; ?></h2>
    <p><?php echo $p['description']; ?></p>
    <h4>Price: ₹<?php echo $p['price']; ?></h4>
    <a href="cart.php?add=<?php echo $p['id']; ?>" class="btn btn-success">Add to Cart</a>
  </div>
</div>
<?php include("../includes/footer.php"); ?>
