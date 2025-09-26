<?php include("../config/db.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
// Only admin allowed
if ($_SESSION['user_role'] != 'admin') {
    header("Location: ../public/index.php");
    exit();
}
?>

<h2>All Orders</h2>
<table class="table table-bordered">
  <tr>
    <th>Order ID</th>
    <th>User</th>
    <th>Total</th>
    <th>Date</th>
    <th>Items</th>
  </tr>
<?php
$query = "SELECT o.id, o.total, o.created_at, u.name, u.email 
          FROM orders o 
          JOIN users u ON o.user_id = u.id 
          ORDER BY o.id DESC";
$result = mysqli_query($conn, $query);

while($order = mysqli_fetch_assoc($result)){
    echo "<tr>
            <td>{$order['id']}</td>
            <td>{$order['name']} <br><small>{$order['email']}</small></td>
            <td>₹{$order['total']}</td>
            <td>{$order['created_at']}</td>
            <td>";

    // Fetch items for this order
    $items_res = mysqli_query($conn, "SELECT oi.quantity, oi.price, p.name 
                                      FROM order_items oi 
                                      JOIN products p ON oi.product_id = p.id 
                                      WHERE oi.order_id = {$order['id']}");
    while($item = mysqli_fetch_assoc($items_res)){
        echo "{$item['name']} ({$item['quantity']} x ₹{$item['price']})<br>";
    }

    echo "</td></tr>";
}
?>
</table>

<?php include("../includes/footer.php"); ?>
