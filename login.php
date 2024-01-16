<?php
session_start();
include("dbbcon.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
   
    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($dbcon, "SELECT user_id, password FROM users WHERE username=?");

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $userId, $hashedPassword);
    mysqli_stmt_fetch($stmt);

    mysqli_stmt_close($stmt);

    if ($hashedPassword && password_verify($password, $hashedPassword)) {
        // Clear the 'added_products' session variable when a new user logs in
        $_SESSION['added_products'] = array();

        $_SESSION['user_id'] = $userId;

        // Redirect to the Shop page
        header("Location: shop.php");
        exit(); // Ensure script execution stops after the redirect
    } else {
        echo "Incorrect username or password!";
    }
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #fff; /* Set background color to white */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .login-container h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

   

    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label >username:</label>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
            <input type="submit" name="login" value="Login">
            </div>
        </form>

        <form method="post" action="login.php">
   
    
    
</form>
        <p >Don't have an account? <a href="signup.php" >create account</a></p>
        <?php
include("dbcon.php");
?>
    </div>
 
</body>
</html>
