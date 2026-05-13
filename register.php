<?php
include 'header.php'; 
include 'db_connect.php'; 

$message = "";

if (isset($_POST['signup'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // পাসওয়ার্ড হ্যাশ করা (সিকিউরিটির জন্য)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // চেক করা ইমেইলটি আগে থেকেই ডাটাবেজে আছে কি না
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
        $message = "<p style='color: red;'>এই ইমেইল দিয়ে আগে থেকেই একটি অ্যাকাউন্ট খোলা আছে!</p>";
    } else {
        // নতুন ইউজার ডাটাবেজে সেভ করা
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
        
        if ($conn->query($sql) === TRUE) {
            $message = "<p style='color: green;'>রেজিস্ট্রেশন সফল হয়েছে! এখন লগইন করুন।</p>";
        } else {
            $message = "<p style='color: red;'>এরর: " . $conn->error . "</p>";
        }
    }
}
?>

<style>
    .auth-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-align: center;
        font-family: 'Segoe UI', sans-serif;
    }
    .auth-container h2 { margin-bottom: 20px; text-transform: uppercase; letter-spacing: 2px; }
    .auth-container input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    .auth-container button {
        width: 100%;
        padding: 12px;
        background-color: #000;
        color: white;
        border: none;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        margin-top: 10px;
    }
    .auth-container button:hover { background-color: #333; }
    .login-link { margin-top: 15px; font-size: 14px; }
    .login-link a { color: #ff4757; text-decoration: none; font-weight: bold; }
</style>

<div class="auth-container">
    <h2>Create Account</h2>
    
    <!-- মেসেজ দেখানোর জায়গা -->
    <?php echo $message; ?>

    <form method="POST" action="">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" minlength="6" required>
        <button type="submit" name="signup">Sign Up</button>
    </form>
    
    <div class="login-link">
        Already have an account? <a href="login.php">Login Here</a>
    </div>
</div>

<?php include 'footer.php'; ?>