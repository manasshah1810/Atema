<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Atema</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link rel="stylesheet" href="css/Login.css">
</head>
<body>
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <form class="login" method="POST" action="login.php">
                <h1 style="color: #7875B5;">Login</h1>
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="text" class="login__input" placeholder="User name / Email" name="username">
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="password" class="login__input" placeholder="Password" name="password">
                </div>
                <button class="button login__submit">
                    <span class="button__text">Log In Now</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
            <div class="social-login">
                <h3>New here ?</h3>
                <div class="social-icons">
                    <a href="Sign_Up.php" class="loginnow">Sign Up Now</a>
                </div>
            </div>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "law";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $username = $_POST['username'] ?? ''; // Using null coalescing operator to handle undefined keys
    $password = $_POST['password'] ?? '';

    // SQL query to check if user exists
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, redirect to main page
        header("Location: index.php");
        exit();
    } else {
        // User doesn't exist or credentials are incorrect
        echo "<script>alert('Invalid username or password.');</script>";
    }
}

// Close connection
$conn->close();
?>
</body>
</html>
