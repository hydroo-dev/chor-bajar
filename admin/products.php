<?php include("../config/db.php"); ?>
<?php include("../includes/header.php"); ?>

<h2>Manage Products</h2>
<a href="add_product.php" class="btn btn-success mb-3">Add Product</a>

<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Action</th>
  </tr>
<?php
$result = mysqli_query($conn, "SELECT * FROM products");
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>₹{$row['price']}</td>
        <td>
            <a href='edit_product.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
            <a href='delete_product.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
        </td>
    </tr>";
}
?>
</table>

<?php include("../includes/footer.php"); ?>
