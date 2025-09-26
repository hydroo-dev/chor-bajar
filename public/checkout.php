<?php include("../config/db.php"); ?>
<?php include("../includes/header.php"); ?>

<h2>Checkout</h2>
<?php
if(!isset($_SESSION['user_id'])){
    echo "<div class='alert alert-warning'>Please <a href='login.php'>login</a> to continue checkout.</div>";
    include("../includes/footer.php"); exit;
}

if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
    echo "<div class='alert alert-info'>Your cart is empty.</div>";
    include("../includes/footer.php"); exit;
}

$total = 0;
foreach($_SESSION['cart'] as $id => $qty){
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
    $p = mysqli_fetch_assoc($result);
    $total += $p['price'] * $qty;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id = $_SESSION['user_id'];
    $order_query = "INSERT INTO orders (user_id, total, created_at) VALUES ('$user_id', '$total', NOW())";
    mysqli_query($conn, $order_query);
    $order_id = mysqli_insert_id($conn);

    foreach($_SESSION['cart'] as $id => $qty){
        $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
        $p = mysqli_fetch_assoc($result);
        $price = $p['price'];
        $oi_query = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                     VALUES ('$order_id', '$id', '$qty', '$price')";
        mysqli_query($conn, $oi_query);
    }

    unset($_SESSION['cart']); // Empty cart
    header("Location: order_success.php?id=$order_id");
    exit;
}
?>

<h4>Total Payable: ₹<?php echo $total; ?></h4>
<form method="POST">
  <button type="submit" class="btn btn-success">Place Order</button>
</form>

<?php include("../includes/footer.php"); ?>
