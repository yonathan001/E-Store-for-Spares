<?php
session_start();
include("dbbcon.php");

if (isset($_POST['addToCart'])) {
    $productId = $_POST['productId'];

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        // Check if the product is already in the cart
        $checkQuery = mysqli_query($dbcon, "SELECT * FROM cart WHERE user_id = $userId AND pro_id = $productId");

        if (mysqli_num_rows($checkQuery) == 0) {
            // Product is not in the cart, add it
            $stmt = mysqli_prepare($dbcon, "INSERT INTO cart (user_id, pro_id) VALUES (?, ?)");

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);

                if (mysqli_stmt_execute($stmt)) {
                    // Update the session variable to mark the product as added
                    $_SESSION['added_products'][] = $productId;
                    header("Location: shop.php"); // Redirect back to the product page
                    exit(); // Ensure script execution stops after redirect
                } else {
                    echo "Error adding product to cart: " . mysqli_error($dbcon);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Error preparing statement: " . mysqli_error($dbcon);
            }
        } else {
            echo "Product is already in the cart.";
        }
    } else {
        echo "User not logged in. Please log in to add products to the cart.";
    }
} else {
    echo "Invalid request.";
}
?>
