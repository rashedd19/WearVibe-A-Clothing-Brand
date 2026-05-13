<?php
session_start();
include('db_connect.php');

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle Add to Cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    
    // Add product to session array
    if (!in_array($product_id, $_SESSION['cart'])) {
        array_push($_SESSION['cart'], $product_id);
    }
    header("Location: cart.php");
    exit();
}

// Handle Remove from Cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    if (($key = array_search($id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Shopping Cart | WearVibe</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .cart-container { padding: 50px 5%; font-family: 'Segoe UI', sans-serif; }
        .cart-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .cart-table th, .cart-table td { border-bottom: 1px solid #ddd; padding: 15px; text-align: left; }
        .cart-table img { width: 80px; height: 100px; object-fit: cover; }
        .remove-btn { color: red; text-decoration: none; font-size: 12px; font-weight: bold; }
        .total-section { margin-top: 30px; text-align: right; }
        .checkout-btn { background: #000; color: #fff; padding: 12px 30px; text-decoration: none; font-weight: bold; display: inline-block; }
        .empty-cart { text-align: center; padding: 100px; }
    </style>
</head>
<body>

<?php include('header.php'); // Assuming your header is in header.php ?>

<div class="cart-container">
    <h2>Your Shopping Cart</h2>

    <?php if (empty($_SESSION['cart'])): ?>
        <div class="empty-cart">
            <p>Your cart is empty!</p>
            <a href="index.php" style="color: #000; font-weight: bold;">Continue Shopping</a>
        </div>
    <?php else: ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_price = 0;
                foreach ($_SESSION['cart'] as $id) {
                    $sql = "SELECT * FROM products WHERE id = $id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $total_price += $row['price'];
                        ?>
                        <tr>
                            <td><img src="images/<?php echo $row['image']; ?>" alt=""></td>
                            <td><?php echo $row['name']; ?></td>
                            <td>৳ <?php echo number_format($row['price']); ?></td>
                            <td><a href="cart.php?remove=<?php echo $row['id']; ?>" class="remove-btn">REMOVE</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <div class="total-section">
            <h3>Total: ৳ <?php echo number_format($total_price); ?></h3><br>
            <a href="checkout.php" class="checkout-btn">PROCEED TO CHECKOUT</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>