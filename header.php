<?php 
// 1. Start session to manage user login status and shopping cart count across the site
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WearVibe | Lifestyle and Top Clothing Brand</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* --- Global Header & Navigation Styles --- */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            background-color: #fff;
            border-bottom: 1px solid #f0f0f0;
            position: sticky;
            top: 0;
            z-index: 1000;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .logo {
            font-size: 26px;
            font-weight: 800;
            text-decoration: none;
            color: #000;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            text-decoration: none;
            color: #444;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s ease;
        }

        nav ul li a:hover {
            color: #ff4757;
        }

        /* --- Modern Nav Icons & Search Styles --- */
        .nav-icons {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-icons a {
            text-decoration: none;
            color: #000;
            display: flex;
            align-items: center;
            transition: 0.3s;
        }

        /* Rounded Search Bar Styling */
        .search-form-modern {
            background: #f4f4f4;
            padding: 6px 15px;
            border-radius: 30px;
            display: flex;
            align-items: center;
        }

        .search-form-modern input {
            border: none;
            background: none;
            outline: none;
            font-size: 13px;
            width: 140px;
            color: #333;
        }

        /* Dynamic Cart Badge Styling */
        .cart-count-badge {
            position: absolute;
            top: -8px;
            right: -10px;
            background: #000;
            color: #fff;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 50%;
            font-weight: bold;
        }
    </style>
</head>
<body>

<header>
    <!-- Brand Identity Logo -->
    <a href="index.php" class="logo">WearVibe</a>
    
    <!-- Navigation Links -->
    <nav>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="new.php">NEW IN</a></li>
            <li><a href="summer.php">SUMMER '26</a></li>
            <li><a href="men.php">MEN</a></li>
            <li><a href="women.php">WOMEN</a></li>
            <li><a href="kids.php">KIDS</a></li>
            <li><a href="warehouse.php">WAREHOUSE</a></li>
        </ul>
    </nav>

    <!-- Header Tools: Search, Account, and Cart -->
    <div class="nav-icons">
        
        <!-- Search Form Component -->
        <form action="search.php" method="GET" class="search-form-modern">
            <input type="text" name="query" placeholder="Search products..." required>
        </form>

        <!-- Customer Account / Login Display -->
        <?php if(isset($_SESSION['user_name'])): ?>
            <!-- If customer is logged in, show their name -->
            <a href="logout.php" title="Logout" style="font-size: 12px; font-weight: bold; color: #ff4757;">
                HI, <?php echo strtoupper($_SESSION['user_name']); ?>
            </a>
        <?php else: ?>
            <!-- Points to login.php for new customers to Sign In or Sign Up -->
            <a href="login.php" title="Account / Sign In">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </a>
        <?php endif; ?>

        <!-- Shopping Bag Icon with Dynamic Counter -->
        <a href="cart.php" title="View Cart" style="position: relative;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                <path d="M3 6h18"></path>
                <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            
            <!-- Only show badge if cart has items -->
            <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <span class="cart-count-badge"><?php echo count($_SESSION['cart']); ?></span>
            <?php endif; ?>
        </a>
    </div>
</header>