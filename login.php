<?php 
// 1. Include header (which already contains session_start()) and database connection
include 'header.php'; 
include 'db_connect.php'; 

$error_msg = "";

// 2. Process the login or auto-registration form
if (isset($_POST['continue'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Check if this email already exists in the database
    $check_user = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_user);

    if ($result->num_rows > 0) {
        // --- USER EXISTS: LOGIN PROCESS ---
        $row = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            
            // Redirect to home page after successful login
            echo "<script>window.location.href='index.php';</script>";
            exit;
        } else {
            $error_msg = "Incorrect password. Please try again.";
        }
    } else {
        // --- NEW USER: AUTO REGISTRATION PROCESS ---
        // Extract a default name from the email (e.g., "john" from "john@gmail.com")
        $email_parts = explode("@", $email);
        $name = ucfirst($email_parts[0]); 
        
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user into the database
        $insert_sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
        
        if ($conn->query($insert_sql) === TRUE) {
            // Log the new user in immediately
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['user_name'] = $name;
            
            // Redirect to home page
            echo "<script>window.location.href='index.php';</script>";
            exit;
        } else {
            $error_msg = "Error creating account: " . $conn->error;
        }
    }
}
?>

<style>
    /* Shopify Style Login Page Design */
    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 70vh;
        background-color: #f6f6f7;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    .login-box {
        background: #fff;
        width: 100%;
        max-width: 420px;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        text-align: center;
    }

    .login-box h1 { font-size: 24px; font-weight: 600; margin-bottom: 10px; color: #1a1a1a; }
    .login-box p { font-size: 14px; color: #6d7175; margin-bottom: 25px; line-height: 1.5; }

    .error-alert {
        background: #fff0f0; color: #d72c0d; padding: 10px;
        border-radius: 6px; font-size: 13px; margin-bottom: 20px;
        border: 1px solid #ffdada;
    }

    .input-group { text-align: left; margin-bottom: 15px; }
    
    .input-field {
        width: 100%; padding: 14px; border: 1px solid #c9cccf;
        border-radius: 8px; font-size: 15px; box-sizing: border-box; transition: 0.2s;
    }
    .input-field:focus { outline: none; border-color: #000; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1); }

    .btn-continue {
        width: 100%; background-color: #005bd3; color: white;
        padding: 14px; border: none; border-radius: 8px;
        font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 10px; transition: 0.2s;
    }
    .btn-continue:hover { background-color: #004bb1; }

    .footer-note { margin-top: 25px; font-size: 12px; color: #6d7175; }
    .footer-note a { color: #6d7175; text-decoration: underline; }
</style>

<div class="login-wrapper">
    <div class="login-box">
        <h1>WearVibe</h1>
        <p>Sign in or create an account.<br>If you don't have one, it will be created automatically.</p>

        <?php if(!empty($error_msg)): ?>
            <div class="error-alert"><?php echo $error_msg; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="input-group">
                <input type="email" name="email" class="input-field" placeholder="Email address" required>
            </div>
            
            <div class="input-group">
                <input type="password" name="password" class="input-field" placeholder="Password" minlength="6" required>
            </div>

            <button type="submit" name="continue" class="btn-continue">Continue</button>
        </form>

        <div class="footer-note">
            By continuing, you agree to our <a href="privacy.php">Terms of Service</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>