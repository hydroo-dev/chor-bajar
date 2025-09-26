<?php 
include("../config/db.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$order_done = false;

// ===== Add to Cart =====
if (isset($_GET['add'])) {
    $id = (int) $_GET['add'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] += 1;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
    header("Location: cart.php");
    exit();
}

// ===== Remove from Cart =====
if (isset($_GET['remove'])) {
    $id = (int) $_GET['remove'];
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
    header("Location: cart.php");
    exit();
}

// ===== Empty Cart =====
if (isset($_GET['empty'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}

// ===== Place Order =====
if (isset($_GET['order'])) {
    unset($_SESSION['cart']);   // clear cart
    $order_done = true;         // show success message
}

include("../includes/header.php"); 
?>

<h2>Your Cart</h2>

<?php if ($order_done): ?>
    <div class="text-center">
        <h2>🎉 Order Successful!</h2>
        <p>Thanks for shopping with <b>Chor Bajar</b>. Your order has been placed successfully.</p>
        <a href="index.php" class="btn btn-primary">Continue Shopping</a>
    </div>
<?php elseif (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0): ?>
    <div class="alert alert-info">Cart is empty.</div>
<?php else: ?>
    <a href="cart.php?empty=1" class="btn btn-danger mb-3">Empty Cart</a>
    <table class="table">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $qty) {
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
            if ($p = mysqli_fetch_assoc($result)) {
                $subtotal = $p['price'] * $qty;
                $total += $subtotal;
                echo "<tr>
                        <td>{$p['name']}</td>
                        <td>$qty</td>
                        <td>₹{$p['price']}</td>
                        <td>₹$subtotal</td>
                        <td><a href='cart.php?remove=$id' class='btn btn-sm btn-warning'>Remove</a></td>
                      </tr>";
            }
        }
        ?>
    </table>
    <h4>Total: ₹<?php echo $total; ?></h4>
    <a href="cart.php?order=1" class="btn btn-success">Place Order</a>
<?php endif; ?>

<?php include("../includes/footer.php"); ?>
