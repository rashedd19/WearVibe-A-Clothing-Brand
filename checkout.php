<?php 
include 'header.php'; 
include 'db_connect.php'; 

// 1. Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit;
}

// 2. Logic for "Buy Now" - If product ID is sent via URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Fetch product details from database
    $query = "SELECT * FROM products WHERE id = '$product_id'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        
        // Add this specific product to the session cart automatically
        // This ensures the "Buy Now" item is ready for checkout
        $_SESSION['cart'][$product_id] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image']
        ];
    }
}

// 3. Final check: If cart is still empty, show empty message
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<div style='text-align:center; padding:100px;'>
            <h2>Your cart is empty!</h2>
            <p>Please select a product to buy.</p>
            <a href='index.php' style='color:#005bd3; font-weight:bold;'>Go Shopping</a>
          </div>";
    include 'footer.php';
    exit;
}

// 4. Calculate total price
$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'];
}

// 5. Process the final order when button is clicked
if (isset($_POST['place_order'])) {
    $user_id = $_SESSION['user_id'];
    $name = $conn->real_escape_string($_POST['full_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);

    $order_query = "INSERT INTO orders (user_id, customer_name, phone, address, total_amount) 
                    VALUES ('$user_id', '$name', '$phone', '$address', '$total_price')";

    if ($conn->query($order_query) === TRUE) {
        // Clear the cart after successful order
        unset($_SESSION['cart']);
        echo "<script>alert('Order Placed Successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<style>
    /* Same styles as before for consistency */
    .checkout-container {
        max-width: 900px;
        margin: 50px auto;
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
        padding: 20px;
        font-family: 'Segoe UI', sans-serif;
    }
    .checkout-form { background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
    .order-summary { background: #f9f9f9; padding: 25px; border-radius: 12px; height: fit-content; }
    
    h2 { font-size: 20px; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px; }
    label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 5px; color: #444; }
    input, textarea { width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
    
    .place-order-btn {
        width: 100%; padding: 15px; background: #000; color: #fff;
        border: none; border-radius: 8px; font-weight: bold; cursor: pointer; text-transform: uppercase;
    }
    .summary-item { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 14px; }
    .total-price { border-top: 1px solid #ddd; padding-top: 10px; margin-top: 10px; font-weight: bold; font-size: 18px; }
</style>

<div class="checkout-container">
    <div class="checkout-form">
        <h2>Shipping Information</h2>
        <form method="POST">
            <label>Full Name</label>
            <input type="text" name="full_name" placeholder="Enter your full name" required>

            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="017XXXXXXXX" required>

            <label>Delivery Address</label>
            <textarea name="address" rows="4" placeholder="Detailed Address..." required></textarea>

            <button type="submit" name="place_order" class="place-order-btn">Confirm Order</button>
        </form>
    </div>

    <div class="order-summary">
        <h2>Order Summary</h2>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <div class="summary-item">
                <span><?php echo $item['name']; ?></span>
                <span>৳<?php echo $item['price']; ?></span>
            </div>
        <?php endforeach; ?>
        
        <div class="summary-item total-price">
            <span>Total</span>
            <span>৳<?php echo $total_price; ?></span>
        </div>
        <p style="font-size: 11px; color: #888; margin-top: 15px;">* Standard shipping charges may apply.</p>
    </div>
</div>

<?php include 'footer.php'; ?>