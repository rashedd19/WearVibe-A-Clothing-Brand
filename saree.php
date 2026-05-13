<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saree Collection - WearVibe</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Saree Page Specific Styles */
        .saree-banner {
            height: 55vh;
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://images.unsplash.com/photo-1610030469983-98e550d6193c?q=80&w=2070&auto=format&fit=crop') center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .saree-banner h1 {
            font-size: 45px;
            text-transform: uppercase;
            letter-spacing: 12px;
            font-family: 'Georgia', serif;
        }
        .saree-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            padding: 80px 5%;
        }
        .saree-card {
            text-align: center;
            transition: transform 0.4s ease;
        }
        .saree-card img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            margin-bottom: 20px;
            border: 1px solid #f2f2f2;
        }
        .saree-card h3 {
            font-family: 'Georgia', serif;
            font-size: 18px;
            font-style: italic;
            margin-bottom: 10px;
        }
        .saree-card .price {
            font-weight: bold;
            color: #8b0000; /* শাড়ির জন্য ডার্ক রেড শেড */
            font-size: 18px;
        }
        .saree-card:hover {
            transform: translateY(-5px);
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

    <section class="saree-banner">
        <h1>Timeless Elegance</h1>
    </section>

    <section class="saree-grid">
        <div class="saree-card">
            <img src="https://images.unsplash.com/photo-1617627143750-d86bc21e42bb?q=80&w=1000&auto=format&fit=crop" alt="Saree 1">
            <h3>Pure Silk Katan Saree</h3>
            <p class="price">৳ 8,500</p>
        </div>
        <div class="saree-card">
            <img src="https://images.unsplash.com/photo-1583391733956-6c78276477e2?q=80&w=1000&auto=format&fit=crop" alt="Saree 2">
            <h3>Handwoven Jamdani Saree</h3>
            <p class="price">৳ 12,200</p>
        </div>
        <div class="saree-card">
            <img src="https://images.unsplash.com/photo-1611080626919-7cf5a9caab53?q=80&w=1000&auto=format&fit=crop" alt="Saree 3">
            <h3>Designer Chiffon Saree</h3>
            <p class="price">৳ 5,800</p>
        </div>
        <div class="saree-card">
            <img src="https://images.unsplash.com/photo-1625910513397-2410a6713e28?q=80&w=1000&auto=format&fit=crop" alt="Saree 4">
            <h3>Block Printed Cotton Saree</h3>
            <p class="price">৳ 3,500</p>
        </div>
    </section>

    <footer style="padding: 60px 5%; background: #fcfcfc; text-align: center; border-top: 1px solid #eee;">
        <p>&copy; 2026 WearVibe. All Rights Reserved.</p>
    </footer>

</body>
</html>