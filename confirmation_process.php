<?php
include("dbbcon.php");
session_start();

if (isset($_SESSION['user_id']) && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $deliveryType = $_POST['deliveryType'];

    // Insert data into the customer table without cart_id
    $query = "INSERT INTO customer (name, address, phone_no, deli_type) VALUES ('$name', '$location', '$phone', '$deliveryType' )";

    if (mysqli_query($dbcon, $query)) {
        echo "Confirmation form data successfully stored in the customer table.";
    } else {
        echo "Error storing data: " . mysqli_error($dbcon);
    }
} else {
    echo "Invalid request.";
}
?>
