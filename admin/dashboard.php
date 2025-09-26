<?php
include("../config/db.php");
include("../includes/header.php");

// Only admin
if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../public/index.php");
    exit();
}
?>

<h2>Welcome to Admin Dashboard</h2>
<p>Hello <b><?php echo $_SESSION['user_name']; ?></b>, manage your store from here.</p>

<div class="row mt-4">
  <div class="col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Products</h5>
        <p class="card-text">Add, edit, or delete products.</p>
        <a href="products.php" class="btn btn-primary">Manage Products</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Orders</h5>
        <p class="card-text">View all customer orders.</p>
        <a href="orders.php" class="btn btn-success">View Orders</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title">Users</h5>
        <p class="card-text">View all registered users.</p>
        <a href="users.php" class="btn btn-warning">View Users</a>
      </div>
    </div>
  </div>
</div>

<?php include("../includes/footer.php"); ?>
