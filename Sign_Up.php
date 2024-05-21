<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SignUp - Atema</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link rel="stylesheet" href="css/Sign_Up.css">
</head>
<body>
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <form class="login" method="POST" action="">
                <h1 style="color: #7875B5;">Sign Up</h1>
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="text" class="login__input" placeholder="User name / Email" name="username">
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="password" class="login__input" placeholder="Password" name="password">
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="password" class="login__input" placeholder="Confirm Password" name="confirm_password">
                </div>
                <button class="button login__submit" type="submit" name="submit">
                    <span class="button__text">Sign Up Now</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
            <div class="social-login">
                <h3>Already have an account :</h3>
                <div class="social-icons">
                    <a href="Login.php" class=	"loginnow">Log In Now</a>
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
<!-- partial -->

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Database connection
    $servername = "localhost";
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $database = "law"; // Your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get input values
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        echo "<script>alert('Password and confirm password do not match.');</script>";
    } else {
        // Check if username already exists
        $sql_check_user = "SELECT * FROM users WHERE username='$username'";
        $result_check_user = $conn->query($sql_check_user);

        if ($result_check_user->num_rows > 0) {
            echo "<script>alert('Username already exists. Please choose a different username.');</script>";
        } else {
            // Insert new user into the database
            $sql_insert_user = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if ($conn->query($sql_insert_user) === TRUE) {
                echo "<script>alert('Account created successfully. You can now log in.');</script>";
				header("Location: index.php");
            } else {
                echo "Error: " . $sql_insert_user . "<br>" . $conn->error;
            }
        }
    }

    // Close connection
    $conn->close();
}
?>
</body>
</html>
