<?php
session_start();
include("dbbcon.php");

if (isset($_POST['deleteFromCart'])) {
    $userId = $_SESSION['user_id'];
    $productId = $_POST['productId'];

    // Delete the product from the cart table
    $deleteQuery = mysqli_query($dbcon, "DELETE FROM cart WHERE user_id = $userId AND pro_id = $productId");

    if ($deleteQuery) {
        // Remove the product ID from the 'added_products' session variable
        $_SESSION['added_products'] = array_diff($_SESSION['added_products'], array($productId));
        
        header("Location: cart.php"); // Redirect back to the cart page
        exit();
    } else {
        echo "Error deleting product from cart: " . mysqli_error($dbcon);
    }
} else {
    echo "Invalid request.";
}
?>
