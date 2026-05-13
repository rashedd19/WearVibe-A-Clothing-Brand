<?php 
// Include header and database connection
include 'header.php'; 
include 'db_connect.php'; 

// Fetch products from database where category is 'men'
$sql = "SELECT * FROM products WHERE category='men'";
$result = $conn->query($sql);
?>

<style>
    /* Men's Page Specific Styles - Original Design */
    .page-banner {
        height: 60vh;
        background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('https://images.unsplash.com/photo-1490367532201-b9bc1dc483f6?q=80&w=2070&auto=format&fit=crop') center/cover;
        display: flex; align-items: center; justify-content: center; color: white; text-align: center;
    }
    .page-banner h1 { font-size: 48px; text-transform: uppercase; letter-spacing: 8px; font-weight: 300; }
    
    .filter-bar { padding: 20px 5%; display: flex; justify-content: space-between; border-bottom: 1px solid #eee; font-size: 13px; text-transform: uppercase; color: #888; }
    
    .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px; padding: 60px 5%; }
    
    .product-card { text-align: left; position: relative; }
    .product-card img { width: 100%; height: 420px; object-fit: cover; transition: 0.4s; }
    .product-card:hover img { filter: brightness(0.9); }
    
    .product-info { margin-top: 15px; }
    .product-info h3 { font-size: 14px; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 5px; }
    .product-info p { font-weight: bold; font-size: 16px; margin-bottom: 15px; }
    
    .tag { position: absolute; top: 15px; left: 15px; background: white; padding: 5px 12px; font-size: 10px; font-weight: bold; text-transform: uppercase; }

    /* --- নতুন বাটন স্টাইল --- */
    .product-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 15px;
    }

    .btn-cart, .btn-buy {
        width: 100%;
        padding: 12px;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: 0.3s;
        border: 1px solid #000;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    /* Add to Cart: সাদা ব্যাকগ্রাউন্ড */
    .btn-cart {
        background-color: #fff;
        color: #000;
    }
    .btn-cart:hover {
        background-color: #f8f8f8;
    }

    /* Buy Now: কালো ব্যাকগ্রাউন্ড */
    .btn-buy {
        background-color: #000;
        color: #fff;
    }
    .btn-buy:hover {
        background-color: #333;
    }
</style>

    <section class="page-banner">
        <h1>MEN'S WEAR</h1>
    </section>

    <div class="filter-bar">
        <span>Showing <?php echo $result->num_rows; ?> products</span>
        <span>Filter By: Default Sorting ▾</span>
    </div>

    <section class="product-grid">
        <?php
        // Loop through each product found in the database
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="product-card">
                    <span class="tag">Arrival</span>
                    
                    <img src="images/<?php echo $row['image']; ?>" alt="Product">
                    
                    <div class="product-info">
                        <h3><?php echo $row['name']; ?></h3>
                        <p>৳ <?php echo number_format($row['price']); ?></p>

                        <!-- বাটনগুলো এখানে যোগ করা হয়েছে -->
                        <div class="product-actions">
                            <!-- Add to Cart Form -->
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="add_to_cart" class="btn-cart">Add to Cart</button>
                            </form>

                            <!-- Buy Now Link -->
                            <a href="checkout.php?id=<?php echo $row['id']; ?>" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p style='text-align: center; width: 100%; grid-column: 1/-1;'>No products found in this category.</p>";
        }
        ?>
    </section>

<?php 
// Include the footer
include 'footer.php'; 
?>