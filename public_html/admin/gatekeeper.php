<?php

// unset($_SESSION['is_authenticated']);
// $hashedPassword = password_hash('joe1291984Jb!', PASSWORD_DEFAULT);
// echo $hashedPassword;
// die;

// 2. Handle Login Submission
if (isset($_POST['login_submit'])) {
    // require_once __DIR__ . '/db.php'; // Pull in the secure $pdo connection

    $username_input = $_POST['username'] ?? '';
    $password_input = $_POST['password'] ?? '';

    if (!empty($username_input) && !empty($password_input)) {
        $user = $db->where('username', $username_input)->getOne('site_users');

        // If user exists, securely verify the hashed password
        if ($user && password_verify($password_input, $user['password_hash'])) {
            $_SESSION['is_authenticated'] = true;

            // Redirect to clean the POST parameters and reload the protected page
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
    }

    // Generic error message prevents revealing whether the username or password was wrong
    $error_message = "Invalid credentials.";
}

// 3. Block access and show the login form if not authenticated
if (empty($_SESSION['is_authenticated'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Authorized Access Only</title>
        <style>
            body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f4f6f9; margin: 0; }
            .login-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 300px; }
            input { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
            button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; margin-top: 10px;}
            button:hover { background: #218838; }
            .error { color: #dc3545; font-size: 14px; margin-bottom: 10px; text-align: center; }
        </style>
    </head>
    <body>
        <div class="login-box">
            <h3 style="margin-top:0; text-align:center;">Secure Login</h3>
            <?php if (!empty($error_message)): ?>
                <div class="error"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Username" required autocomplete="username">
                <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
                <button type="submit" name="login_submit">Login</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit; // Halt execution so protected content below is never processed
}
?>