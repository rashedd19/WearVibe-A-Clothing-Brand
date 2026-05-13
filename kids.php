<?php 
// সেশন শুরু এবং ডাটাবেজ কানেকশন
include 'header.php'; 
include 'db_connect.php'; 

// ডাটাবেজ থেকে বাচ্চাদের ক্যাটাগরির প্রোডাক্ট নিয়ে আসা
$sql = "SELECT * FROM products WHERE category='kids'";
$result = $conn->query($sql);
?>

<style>
    /* Kids Page Specific Styles */
    .kids-banner {
        height: 50vh;
        background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('https://images.unsplash.com/photo-1519751138087-5bf79df62d5b?q=80&w=2070&auto=format&fit=crop') center/cover;
        display: flex; align-items: center; justify-content: center; color: white; text-align: center;
    }
    .kids-banner h1 { font-size: 42px; text-transform: uppercase; letter-spacing: 5px; }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        padding: 60px 5%;
    }

    .product-card {
        text-align: center;
        border: 1px solid #f0f0f0;
        padding-bottom: 20px;
        transition: 0.3s;
        background: #fff;
    }
    .product-card img { width: 100%; height: 350px; object-fit: cover; margin-bottom: 15px; }
    .product-card h3 { font-size: 16px; color: #444; margin-bottom: 8px; text-transform: uppercase; }
    .product-card .price { font-weight: bold; color: #ff4757; font-size: 18px; margin-bottom: 15px; }
    
    .product-card:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.05); }

    /* বাটন স্টাইল */
    .product-actions {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 0 15px;
    }

    .btn-cart, .btn-buy {
        width: 100%;
        padding: 10px;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        border: 1px solid #000;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-cart { background: #fff; color: #000; }
    .btn-cart:hover { background: #f0f0f0; }

    .btn-buy { background: #000; color: #fff; }
    .btn-buy:hover { background: #333; }
</style>

<section class="kids-banner">
    <h1>Kids' Playful World</h1>
</section>

<section class="product-grid">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <div class="product-card">
                <!-- ইমেজ পাথ চেক করবেন আপনার ফোল্ডার অনুযায়ী -->
                <img src="images/<?php echo $row['image']; ?>" alt="Product">
                
                <h3><?php echo $row['name']; ?></h3>
                <p class="price">৳ <?php echo number_format($row['price']); ?></p>

                <div class="product-actions">
                    <!-- কার্টে যোগ করার ফর্ম -->
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="add_to_cart" class="btn-cart">Add to Cart</button>
                    </form>

                    <!-- সরাসরি কেনার লিঙ্ক -->
                    <a href="checkout.php?id=<?php echo $row['id']; ?>" class="btn-buy">Buy Now</a>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p style='text-align: center; width: 100%; grid-column: 1/-1;'>No products found for Kids.</p>";
    }
    ?>
</section>

<?php include 'footer.php'; ?>