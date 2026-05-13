<?php
// 1. Security Check - Only logged in admin can access this
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_vibe_login.php"); // Redirect to login if not authenticated
    exit;
}

include 'db_connect.php'; 
include 'header.php'; 

$status_msg = "";

// 2. Product Upload Logic
if (isset($_POST['upload'])) {
    $name = $conn->real_escape_string($_POST['pname']);
    $price = $conn->real_escape_string($_POST['pprice']);
    $category = $conn->real_escape_string($_POST['pcategory']);
    
    $image_name = $_FILES['pimage']['name'];
    $temp_name = $_FILES['pimage']['tmp_name'];
    $target_folder = "images/" . basename($image_name);

    $sql = "INSERT INTO products (name, price, image, category) VALUES ('$name', '$price', '$image_name', '$category')";

    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($temp_name, $target_folder)) {
            $status_msg = "<div class='alert success'>Product Published Successfully!</div>";
        }
    } else {
        $status_msg = "<div class='alert error'>Error: " . $conn->error . "</div>";
    }
}
?>

<style>
    .admin-container {
        max-width: 800px;
        margin: 50px auto;
        font-family: 'Segoe UI', sans-serif;
    }

    /* Admin Navigation Menu */
    .admin-menu {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 40px;
    }

    .menu-btn {
        padding: 15px 30px;
        background: #f4f4f4;
        color: #000;
        text-decoration: none;
        border-radius: 8px;
        font-weight: bold;
        border: 1px solid #ddd;
        transition: 0.3s;
    }

    .menu-btn:hover, .menu-btn.active {
        background: #000;
        color: #fff;
    }

    .form-card {
        background: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    h2 { text-align: center; margin-bottom: 25px; text-transform: uppercase; }
    
    input, select, button { width: 100%; padding: 12px; margin-bottom: 20px; border-radius: 8px; border: 1px solid #ddd; }
    .publish-btn { background: #000; color: #fff; font-weight: bold; cursor: pointer; border: none; }
    
    .alert { padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center; }
    .success { background: #e7f9ed; color: #198754; }
</style>

<div class="admin-container">
    
    <!-- Step 1: Accessing the orders through this menu -->
    <div class="admin-menu">
        <a href="admin.php" class="menu-btn active">Add Product</a>
        <a href="view_orders.php" class="menu-btn">View All Orders</a>
        <a href="logout.php" class="menu-btn" style="color: red;">Logout</a>
    </div>

    <div class="form-card">
        <h2>Add New Product</h2>
        <?php echo $status_msg; ?>
        
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="pname" placeholder="Product Name" required>
            <input type="number" name="pprice" placeholder="Price (৳)" required>
            <select name="pcategory">
                <option value="men">Men</option>
                <option value="women">Women</option>
                <option value="kids">Kids</option>
            </select>
            <input type="file" name="pimage" required>
            <button type="submit" name="upload" class="publish-btn">Publish Product</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>