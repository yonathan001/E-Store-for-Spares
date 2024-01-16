<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: deliverylogin.php");
    exit;
}

include("../dbbcon.php");

if (isset($_POST['delivered'])) {
    $c_id = $_POST['c_id'];

    // Use prepared statements to prevent SQL injection
    $deleteQuery = "DELETE FROM delivery WHERE c_id = ?";
    $deleteStatement = mysqli_prepare($dbcon, $deleteQuery);
    mysqli_stmt_bind_param($deleteStatement, 'i', $c_id);
    mysqli_stmt_execute($deleteStatement);
    mysqli_stmt_close($deleteStatement);

    // Assume you have obtained the report message from some process or logic
    $reportMessage = "Products for customer ID $c_id have been sold out and delivered successfully.";

    // Use prepared statements to prevent SQL injection
    $insertQuery = "INSERT INTO delivery_reports (c_id, report_message) VALUES (?, ?)";
    $insertStatement = mysqli_prepare($dbcon, $insertQuery);
    mysqli_stmt_bind_param($insertStatement, 'is', $c_id, $reportMessage);
    mysqli_stmt_execute($insertStatement);
    mysqli_stmt_close($insertStatement);

    // Use JavaScript to display an alert with the report message
    echo '<script>alert("' . $reportMessage . '");</script>';

    exit();
}

$query = "SELECT c.*, d.deli_person
          FROM customer c
          INNER JOIN delivery d ON c.c_id = d.c_id";

$result = mysqli_query($dbcon, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Person Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .customer-info {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .assigned-text {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="customer-info">';
        echo '<h2>Customer Information</h2>';
        echo '<p>Customer ID: ' . $row['c_id'] . '</p>';
        echo '<p>User ID: ' . $row['user_id'] . '</p>';
        echo '<p>Name: ' . $row['name'] . '</p>';
        echo '<p>Location: ' . $row['address'] . '</p>';
        echo '<p>Phone: ' . $row['phone_no'] . '</p>';
        echo '<p>Delivery Type: ' . $row['deli_type'] . '</p>';
        echo '<p>Assigned Delivery Person: ' . $row['deli_person'] . '</p>';

        // Add "I Delivered" button with a form for each customer
        echo '<form method="post" action="delivery.php">';
        echo '<input type="hidden" name="c_id" value="' . $row['c_id'] . '">';
        echo '<input type="submit" name="delivered" value="I Delivered">';
        echo '</form>';

        echo '</div>';
    }
} else {
    echo "Error fetching data: " . mysqli_error($dbcon);
}

mysqli_close($dbcon);
?>

</body>
</html>
