<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - WearVibe</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .faq-container {
            padding: 80px 15%;
            max-width: 1000px;
            margin: 0 auto;
        }
        .faq-header {
            text-align: center;
            margin-bottom: 50px;
        }
        .faq-item {
            border-bottom: 1px solid #eee;
            padding: 20px 0;
        }
        .faq-question {
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .faq-answer {
            margin-top: 15px;
            color: #666;
            line-height: 1.6;
            display: none; /* শুরুতে লুকানো থাকবে */
        }
        /* প্রশ্ন ক্লিক করলে উত্তর দেখানোর জন্য একটি সিম্পল ট্রিক */
        .faq-item:hover .faq-answer {
            display: block;
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
                <li><a href="warehouse.php">KIDS</a></li>
            </ul>
        </nav>
        <div class="nav-icons">
            <a href="#">🔍</a>
            <a href="cart.php">🛒</a>
        </div>
    </header>

    <div class="faq-container">
        <div class="faq-header">
            <h2>Frequently Asked Questions</h2>
            <p>Everything you need to know about our service and products.</p>
        </div>

        <div class="faq-item">
            <div class="faq-question">How can I track my order? <span>+</span></div>
            <div class="faq-answer">Once your order is shipped, you will receive an email with a tracking number and a link to track your package.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">What is your return policy? <span>+</span></div>
            <div class="faq-answer">We offer a 7-day return policy for unused and unwashed items with original tags. Please visit our returns page for more info.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Do you ship internationally? <span>+</span></div>
            <div class="faq-answer">Currently, we only ship within Bangladesh. We are working on expanding our delivery services worldwide soon!</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">How do I choose the right size? <span>+</span></div>
            <div class="faq-answer">We have a detailed size guide on each product page. If you are between sizes, we recommend choosing the larger one for a better fit.</div>
        </div>
    </div>

</body>
</html>