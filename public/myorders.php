<?php
include("../config/db.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

include("../includes/header.php");
?>

<h2>My Orders</h2>

<?php
// Fetch orders for the logged-in user
$orders_result = mysqli_query($conn, "SELECT * FROM orders WHERE user_id = $user_id ORDER BY created_at DESC");

if (mysqli_num_rows($orders_result) == 0) {
    echo "<div class='alert alert-info'>You have not placed any orders yet.</div>";
} else {
    while ($order = mysqli_fetch_assoc($orders_result)) {
        echo "<div class='card mb-3'>
                <div class='card-header'>
                    Order #{$order['id']} - Placed on {$order['created_at']}
                </div>
                <div class='card-body'>
                    <table class='table table-bordered'>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>";

        // Fetch order items
        $items_result = mysqli_query($conn, "
            SELECT oi.*, p.name 
            FROM order_items oi 
            JOIN products p ON oi.product_id = p.id 
            WHERE oi.order_id = {$order['id']}
        ");

        $order_total = 0;

        while ($item = mysqli_fetch_assoc($items_result)) {
            $subtotal = $item['price'] * $item['quantity'];
            $order_total += $subtotal;
            echo "<tr>
                    <td>{$item['name']}</td>
                    <td>{$item['quantity']}</td>
                    <td>₹{$item['price']}</td>
                    <td>₹$subtotal</td>
                  </tr>";
        }

        echo "</table>
              <h5 class='text-end'>Order Total: ₹$order_total</h5>
              </div>
              </div>";
    }
}
?>

<?php include("../includes/footer.php"); ?>
