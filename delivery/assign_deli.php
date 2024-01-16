<?php
include("../dbcon.php");

if (isset($_GET['c_id']) && isset($_GET['deli_person'])) {
    $c_id = $_GET['c_id'];
    $deli_person = $_GET['deli_person'];

    // Validate customer_id and delivery_person
    if (!is_numeric($c_id) || !is_numeric($deli_person)) {
        die("Invalid parameters. Please provide numeric values for c_id and deli_person.");
    }

    // Check if a record already exists for the customer in the delivery table
    $checkQuery = "SELECT * FROM delivery WHERE c_id = $c_id";

    $checkResult = mysqli_query($dbcon, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // If a record exists, update the delivery_person value
        $updateQuery = "UPDATE delivery SET deli_person = $deli_person WHERE c_id = $c_id";

        if (mysqli_query($dbcon, $updateQuery)) {
            echo "Delivery assigned successfully!";
        } else {
            echo "Error updating delivery information: " . mysqli_error($dbcon);
        }
    } else {
        // If no record exists, insert a new record
        $insertQuery = "INSERT INTO delivery (c_id, deli_person) VALUES ($c_id, $deli_person)";

        if (mysqli_query($dbcon, $insertQuery)) {
            echo "Delivery assigned successfully!";
        } else {
            echo "Error inserting delivery information: " . mysqli_error($dbcon);
        }
    }
} else {
    echo "Missing parameters. Please provide both customer_id and delivery_person.";
}

mysqli_close($dbcon);
?>
