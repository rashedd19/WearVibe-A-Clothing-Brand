<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - WearVibe</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Contact Page Styles */
        .contact-wrapper {
            display: flex;
            padding: 80px 10%;
            gap: 50px;
        }
        .contact-info {
            flex: 1;
        }
        .contact-info h2 {
            font-size: 32px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .contact-info p {
            margin-bottom: 15px;
            color: #555;
            line-height: 1.6;
        }
        .contact-form {
            flex: 1;
            background: #f9f9f9;
            padding: 40px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            outline: none;
        }
        .submit-btn {
            background: #000;
            color: #fff;
            padding: 15px 40px;
            border: none;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        .submit-btn:hover {
            background: #333;
        }
        @media (max-width: 768px) {
            .contact-wrapper {
                flex-direction: column;
            }
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

    <div class="contact-wrapper">
        <div class="contact-info">
            <h2>Get In Touch</h2>
            <p>Have questions about our collections or need help with an order? Our team is here to help you.</p>
            <p><strong>Address:</strong> 123 Fashion Street, Dhaka, Bangladesh</p>
            <p><strong>Email:</strong> support@wearvibe.shop