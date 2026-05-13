<?php 
include 'header.php'; 
include 'db_connect.php'; 

// সার্চ বক্সে যা লেখা হবে তা সংগ্রহ করা
$search_query = "";
if (isset($_GET['query'])) {
    $search_query = $conn->real_escape_string($_GET['query']);
}

// ডাটাবেজে ওই নামের প্রোডাক্ট খোঁজা
$sql = "SELECT * FROM products WHERE name LIKE '%$search_query%' OR category LIKE '%$search_query%'";
$result = $conn->query($sql);
?>

<div style="padding: 50px 5%;">
    <h2>Search Results for: "<?php echo htmlspecialchars($search_query); ?>"</h2>
    
    <section class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px; margin-top: 30px;">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="product-card">
                    <img src="images/<?php echo $row['image']; ?>" alt="Product" style="width: 100%; height: 420px; object-fit: cover;">
                    <div class="product-info">
                        <h3><?php echo $row['name']; ?></h3>
                        <p>৳ <?php echo number_format($row['price']); ?></p>
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="add_to_cart" style="width: 100%; padding: 10px; background: #000; color: #fff; border: none; cursor: pointer; margin-top: 10px;">Add to Cart</button>
                        </form>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<h3>No products found matching your search.</h3>";
        }
        ?>
    </section>
</div>

<?php include 'footer.php'; ?>