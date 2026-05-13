<?php
session_start();

// Admin credentials
$admin_user = "admin"; 
$admin_pass = "vibe2026"; 

// If already logged in, redirect to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin.php");
    exit;
}

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === $admin_user && $pass === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php"); 
        exit;
    } else {
        $error = "Incorrect credentials. Access Denied!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Admin Login | WearVibe</title>
    <style>
        body { 
            font-family: -apple-system, sans-serif; 
            display: flex; justify-content: center; align-items: center; 
            height: 100vh; background: #f6f6f7; margin: 0;
        }
        .login-card { 
            background: white; padding: 40px; border-radius: 12px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.08); width: 100%; max-width: 380px; text-align: center;
        }
        h1 { font-size: 20px; margin-bottom: 20px; color: #1a1a1a; letter-spacing: 1px; }
        .error-msg { color: #d72c0d; background: #fff0f0; padding: 10px; border-radius: 6px; margin-bottom: 20px; font-size: 13px; border: 1px solid #ffdada; }
        input { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #c9cccf; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 13px; background: #202223; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.2s; }
        button:hover { background: #454f5b; }
        .back-home { display: block; margin-top: 20px; font-size: 12px; color: #6d7175; text-decoration: none; }
    </style>
</head>
<body>

    <div class="login-card">
        <h1>ADMIN ACCESS</h1>
        
        <?php if(isset($error)): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Enter Dashboard</button>
        </form>

        <a href="index.php" class="back-home">Return to Storefront</a>
    </div>

</body>
</html>