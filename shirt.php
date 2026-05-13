<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shirts Collection - WearVibe</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Shirt Page Specific Styles */
        .shirt-header {
            text-align: center;
            padding: 60px 5%;
            background-color: #fafafa;
        }
        .shirt-header h1 {
            font-size: 32px;
            text-transform: uppercase;
            letter-spacing: 5px;
        }
        .shirt-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            padding: 50px 5%;
        }
        .shirt-card {
            background: #fff;
            text-align: center;
            border-bottom: 2px solid transparent;
            transition: 0.3s;
        }
        .shirt-card:hover {
            border-bottom: 2px solid #000;
        }
        .shirt-card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .shirt-info h3 {
            font-size: 15px;
            text-transform: uppercase;
            color: #333;
            margin-bottom: 10px;
        }
        .shirt-info .price {
            font-weight: bold;
            font-size: 16px;
            color: #000;
        }
        .add-to-cart {
            display: block;
            margin: 15px auto;
            padding: 10px 20px;
            border: 1px solid #000;
            background: none;
            text-transform: uppercase;
            font-size: 12px;
            cursor: pointer;
            transition: 0.3s;
        }
        .add-to-cart:hover {
            background: #000;
            color: #fff;
        }
    </style>
</head>
<body>

    <header>
        <a href="index.php" class="logo">WearVibe</a>
        <nav>
            <ul>
                <li><a href="new.php">NEW IN</a></li>
                <li><a href="summer.php">SUMMER '26</a></li>
                <li><a href="men.php">MEN</a></li>
                <li><a href="women.php">WOMEN</a></li>
                <li><a href="kids.php">KIDS</a></li>
            </ul>
        </nav>
        <div class="nav-icons">
            <a href="#">🔍</a>
            <a href="cart.php">🛒</a>
        </div>
    </header>

    <div class="shirt-header">
        <h1>Essential Shirts</h1>
        <p>From office wear to weekend vibes</p>
    </div>

    <section class="shirt-grid">
        <div class="shirt-card">
            <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?q=80&w=1000&auto=format&fit=crop" alt="Shirt 1">
            <div class="shirt-info">
                <h3>White Formal Oxford Shirt</h3>
                <p class="price">৳ 1,650</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
        <div class="shirt-card">
            <img src="https://images.unsplash.com/photo-1598033129183-c4f50c7176c8?q=80&w=1000&auto=format&fit=crop" alt="Shirt 2">
            <div class="shirt-info">
                <h3>Striped Casual Linen Shirt</h3>
                <p class="price">৳ 2,100</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
        <div class="shirt-card">
            <img src="https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?q=80&w=1000&auto=format&fit=crop" alt="Shirt 3">
            <div class="shirt-info">
                <h3>Navy Blue Denim Shirt</h3>
                <p class="price">৳ 1,950</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
        <div class="shirt-card">
            <img src="https://images.unsplash.com/photo-1589310243389-96a5483213a8?q=80&w=1000&auto=format&fit=crop" alt="Shirt 4">
            <div class="shirt-info">
                <h3>Floral Print Summer Shirt</h3>
                <p class="price">৳ 1,750</p>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        </div>
    </section>

    <footer style="padding: 40px; text-align: center; border-top: 1px solid #eee;">
        <p>&copy; 2026 WearVibe. All Rights Reserved.</p>
    </footer>

</body>
</html>