<?php
// 1. Security Check - Only admin can see this
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_vibe_login.php");
    exit;
}

include 'db_connect.php';
include 'header.php'; // Optional: Use a simplified header for admin if you want
?>

<style>
    .admin-container {
        max-width: 1100px;
        margin: 50px auto;
        padding: 20px;
        font-family: 'Segoe UI', sans-serif;
    }
    h1 { text-align: center; margin-bottom: 30px; text-transform: uppercase; letter-spacing: 2px; }
    
    .order-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        border-radius: 8px;
        overflow: hidden;
    }
    .order-table th, .order-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }
    .order-table th { background: #000; color: #fff; font-size: 14px; text-transform: uppercase; }
    .order-table tr:hover { background: #f9f9f9; }
    
    .status-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        background: #fff3cd;
        color: #856404;
    }
</style>

<div class="admin-container">
    <h1>Customer Orders</h1>

    <table class="order-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Shipping Address</th>
                <th>Total Amount</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch orders from database (latest first)
            $sql = "SELECT * FROM orders ORDER BY order_date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>#{$row['id']}</td>
                            <td><b>{$row['customer_name']}</b></td>
                            <td>{$row['phone']}</td>
                            <td>{$row['address']}</td>
                            <td>৳{$row['total_amount']}</td>
                            <td>" . date('d M, Y', strtotime($row['order_date'])) . "</td>
                            <td><span class='status-badge'>{$row['payment_status']}</span></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>No orders found yet.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>