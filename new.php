<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Arrivals - WearVibe</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* New Arrivals Specific Styles */
        .new-header {
            text-align: center;
            padding: 80px 5%;
            background-color: #fff;
        }
        .new-header h1 {
            font-size: 40px;
            letter-spacing: 10px;
            text-transform: uppercase;
            font-weight: 300;
        }
        .new-header p {
            margin-top: 10px;
            color: #888;
            letter-spacing: 2px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            padding: 20px 5% 80px;
        }
        .new-card {
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .new-card img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            transition: 0.5s;
        }
        .new-card:hover img {
            transform: scale(1.02);
        }
        .badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #000;
            color: #fff;
            padding: 5px 15px;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .item-name {
            margin-top: 15px;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .item-price {
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <header>
        <a href="index.php" class="logo">WearVibe</a>
        <nav>
            <ul>
                <li><a href="new.php" style="color: #ff0000;">NEW IN</a></li>
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

    <div class="new-header">
        <h1>New Arrivals</h1>
        <p>EXPLORE THE LATEST TRENDS OF 2026</p>
    </div>

    <section class="product-grid">
        <div class="new-card">
            <span class="badge">Just In</span>
            <img src="https://unsplash.com/photos/a-man-with-a-beard-LLCTFYTgdIM" alt="New 1">
            <p class="item-name">Luxe Silk Wrap Dress</p>
            <p class="item-price">৳ 4,500</p>
        </div>
        <div class="new-card">
            <span class="badge">Just In</span>
            <img src="https://images.unsplash.com/photo-1467043237213-65f2da53396f?q=80&w=1000&auto=format&fit=crop" alt="New 2">
            <p class="item-name">Oversized Linen Shirt</p>
            <p class="item-price">৳ 2,200</p>
        </div>
        <div class="new-card">
            <span class="badge">Just In</span>
            <img src="https://images.unsplash.com/photo-1521335629791-ce4aec67dd15?q=80&w=1000&auto=format&fit=crop" alt="New 3">
            <p class="item-name">Minimalist Leather Tote</p>
            <p class="item-price">৳ 3,800</p>
        </div>
        <div class="new-card">
            <span class="badge">Just In</span>
            <img src="https://unsplash.com/photos/man-wearing-brown-and-black-leopard-print-button-up-t-shirt-and-black-sunglasses-crossing-hands-down-while-looking-up-vKnRYW-mtek" alt="New 4">
            <p class="item-name">Floral Spring Midi</p>
            <p class="item-price">৳ 3,200</p>
        </div>
    </section>

    <footer style="padding: 40px; text-align: center; background: #fff; border-top: 1px solid #eee;">
        <p>&copy; 2026 WearVibe. All Rights Reserved.</p>
    </footer>

</body>
</html>