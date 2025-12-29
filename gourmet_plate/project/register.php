<?php
session_start();
include "config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $message = "Passwords do not match";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $message = "Email already exists";
        } else {
            $sql = "INSERT INTO users (name, email, password)
                    VALUES ('$name', '$email', '$hashed')";
            if (mysqli_query($conn, $sql)) {
                // REDIRECT TO LOGIN PAGE WITH SUCCESS MESSAGE
                header("Location: login.php?registered=1");
                exit;
            } else {
                $message = "Something went wrong: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Explora&display=swap" rel="stylesheet">
</head>

<body class="auth-page">
<div class="container">
    <h2>Create Account</h2>
    <p class="subtitle">Join our elegant experiences</p>

    <?php if ($message): ?>
        <p style="color:#d2ba6d; text-align:center; margin-bottom:10px;">
            <?= $message ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>
        <label>Password</label>
        <input type="password" name="password" placeholder="Create password" required>
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>
        <button type="submit">REGISTER</button>
    </form>

    <p class="register-link">
        Already have an account? <br>
        <a href="login.php">Login</a>
    </p>
</div>
</body>
</html>