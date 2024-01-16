<?php
session_start();

// Include the database connection file
include('../dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute a SQL query to check credentials
    $stmt = $dbcon->prepare("SELECT sales_id FROM sales WHERE susername = ? AND spassword = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($dbUsername);
    $stmt->fetch();
    $stmt->close();

    if ($dbUsername) {
        // Valid credentials
        $_SESSION['loggedin'] = true;
        $_SESSION['expire_time'] = time() + (1 * 60);
        header("Location: sales.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}

// Close the database connection
$dbcon->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sales-Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .login-container h2 {
            text-align: center;
            color: #333;
        }

        .login-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>



<div class="login-container">
    <h2>Sales Person-Login</h2>
    <form class="login-form" action="saleslogin.php" method="post">
        <div class="form-group">
            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" >Login</button>
        </div>
    </form>
</div>

</body>
</html>