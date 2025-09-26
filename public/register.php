<?php include("../config/db.php"); ?>
<?php include("../includes/header.php"); ?>

<h2>Register</h2>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'user')";
    if(mysqli_query($conn, $query)){
        echo "<div class='alert alert-success'>Registration successful. <a href='login.php'>Login here</a></div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<form method="POST">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>

<?php include("../includes/footer.php"); ?>
