<?php
include("dbbcon.php");

if (isset($_GET['carBrand'])) {
    $carBrand = mysqli_real_escape_string($dbcon, $_GET['carBrand']);

    $result = mysqli_query($dbcon, "SELECT * FROM product WHERE pro_brand = '$carBrand'");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/' . $row['pro_img'] . '" alt="Product Image">
                        </div>
                        <div class="detail-box">
                            <h6>
                                <form method="post" action="add_to_cart.php">
                                    <input type="hidden" name="productId" value="' . $row['pro_id'] . '">
                                    <button type="submit" name="addToCart">Add to cart <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                </form>
                            </h6>
                            <div class="details">' . $row['pro_desc'] . '</div>
                        </div>
                        <div class="new">
                            <span>$' . $row['pro_price'] . '</span>
                        </div>
                        <div class="proname">
                            <span>' . $row['pro_name'] . '</span>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "Error fetching spare parts: " . mysqli_error($dbcon);
    }
} else {
    echo "Invalid request";
}
?>
