<?php 
include("../config/db.php"); 
include("../includes/header.php"); 

// Only admin allowed
if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../public/index.php");
    exit();
}
?>

<h2>Registered Users</h2>
<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
   
  </tr>
<?php
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
while($user = mysqli_fetch_assoc($result)){
    echo "<tr>
            <td>{$user['id']}</td>
            <td>{$user['name']}</td>
            <td>{$user['email']}</td>
            <td>{$user['role']}</td>
       
          </tr>";
}
?>
</table>

<?php include("../includes/footer.php"); ?>
