<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summer '26 Collection - WearVibe</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Summer Page Specific Styles */
        .summer-hero {
            height: 70vh;
            background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('https://images.unsplash.com/photo-1523381210434-271e8be1f52b?q=80&w=2070&auto=format&fit=crop') center/cover;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 10%;
            color: #fff;
        }
        .summer-hero h1 {
            font-size: 60px;
            letter-spacing: 15px;
            text-transform: uppercase;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.2);
        }
        .summer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 60px 5%;
        }
        .summer-card {
            position: relative;
            height: 500px;
            overflow: hidden;
        }
        .summer-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.6s;
        }
        .summer-card:hover img {
            transform: scale(1.1);
        }
        .summer-info {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 30px;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            color: white;
        }
        .summer-info h3 {
            font-size: 20px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .summer-tag {
            background: #ffcc00;
            color: #000;
            padding: 5px 10px;
            font-size: 10px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <header>
        <a href="index.php" class="logo">WearVibe</a>
        <nav>
            <ul>
                <li><a href="new.php">NEW IN</a></li>
                <li><a href="summer.php" style="color: #ffcc00;">SUMMER '26</a></li>
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

    <section class="summer-hero">
        <div>
            <p style="letter-spacing: 5px; font-weight: bold; color: #ffcc00;">SEASONAL DROP</p>
            <h1>SUMMER<br>'26</h1>
            <p>Embrace the sun with our latest breathable fabrics.</p>
        </div>
    </section>

    <section class="summer-grid">
        <div class="summer-card">
            <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1000&auto=format&fit=crop" alt="Summer 1">
            <div class="summer-info">
                <span class="summer-tag">Bestseller</span>
                <h3>Yellow Sun Dress</h3>
                <p>৳ 2,800</p>
            </div>
        </div>
        <div class="summer-card">
            <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?q=80&w=1000&auto=format&fit=crop" alt="Summer 2">
            <div class="summer-info">
                <span class="summer-tag">Limited</span>
                <h3>Linen Summer Suit</h3>
                <p>৳ 5,500</p>
            </div>
        </div>
        <div class="summer-card">
            <img src="https://images.unsplash.com/photo-1475180098004-ca77a66827be?q=80&w=1000&auto=format&fit=crop" alt="Summer 3">
            <div class="summer-info">
                <span class="summer-tag">Trendy</span>
                <h3>Floral Beach Wear</h3>
                <p>৳ 3,200</p>
            </div>
        </div>
    </section>

    <footer style="padding: 40px; text-align: center; border-top: 1px solid #eee;">
        <p>&copy; 2026 WearVibe. All Rights Reserved.</p>
    </footer>

</body>
</html>