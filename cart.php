<!DOCTYPE html>
<html>

<head>
  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
 

  <title>
    CART | YOHANIS SPAREPART STORE
  </title>

  <link href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="fonts/fontawesome-webfont.ttf">

  <style>
    
</style>
  
</head>

<body><br>
  <div class="hero_area">
   
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
       

        <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <h6 style="padding-right: 45px; font-size: 22px; font-family:Arial, Helvetica, sans-serif;" >YOHANNIS SPARES</h6>

            <li class="nav-item ">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.php">
                STORE
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="cartphp">
                cart
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="help.html">
                HELP
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">
            <a href="login.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="cart.php ">
              <i class="fa fa-cart-plus" aria-hidden="true"></i>
            </a>
            
          </div>
        </div>
      </nav>
    </header>

  </div><br><br><br><br><br>

  <?php
session_start();
include("dbbcon.php");

// Ensure 'added_products' session variable is initialized
if (!isset($_SESSION['added_products'])) {
    $_SESSION['added_products'] = array();
}

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Retrieve username from the users table
    $userQuery = mysqli_query($dbcon, "SELECT username FROM users WHERE user_id = $userId");
    $username = mysqli_fetch_assoc($userQuery)['username'];

    if ($username) {
        echo '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Cart Page</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 0;
                            background-color: #f5f5f5;
                        }

                        .container0 {
                            max-width: 800px;
                            margin: 20px auto;
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                           
                        }
                        .user-info {
                          max-width: 800px;
                          margin: 20px auto;
                          background-color: #202020;
                          padding: 20px;
                          border-radius: 8px;
                          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                          text-align: center;
                          color:white;
                      }

                        .cart-item {
                            border: 1px solid #ddd;
                            margin-bottom: 10px;
                            padding: 10px;
                            border-radius: 4px;
                            background-color: #fff;
                        }

                        .product-details {
                            margin: 0;
                            
                        }

                        .delete-form {
                            display: inline;
                        }

                        .delete-button {
                            background-color: #d9534f;
                            color: #fff;
                            border: none;
                            padding: 5px 10px;
                            border-radius: 4px;
                            cursor: pointer;
                        }

                        .delete-button:hover {
                            background-color: #c9302c;
                        }

                        .total-price {
                            margin-top: 20px;
                            font-weight: bold;
                            font-size: 18px;
                        }

                        .approve-button {
                            display: block;
                            margin-top: 20px;
                            padding: 10px;
                            background-color: green;
                            color: #fff;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            text-align: center;
                            text-decoration: none;
                            font-size: 16px;
                        }

                        
                    </style>
                </head>
                <body>

                
               
                
                <div class="container0">';


               
echo '<div class="user-info">'; // Add a new div with a class for styling if needed
echo '<h2>User Information</h2>';
echo '<p>Username: ' . $username . '</p>';
echo '</div>';

        
        
        
        

        // Retrieve added products from the cart table
        $cartQuery = mysqli_query($dbcon, "SELECT * FROM cart WHERE user_id = $userId");

        if ($cartQuery) {
            echo '<h2>Added Products</h2>';

            $totalPrice = 0;

            while ($cartItem = mysqli_fetch_assoc($cartQuery)) {
                // Fetch product details based on pro_id from the cart
                $productId = $cartItem['pro_id'];
                $productQuery = mysqli_query($dbcon, "SELECT * FROM product WHERE pro_id = $productId");
                $product = mysqli_fetch_assoc($productQuery);

                echo '<div class="cart-item">';
                echo '<p class="product-details">Product Brand: ' . $product['pro_brand'] . '</p>';
                echo '<p class="product-details">Product Name: ' . $product['pro_name'] . '</p>';
                echo '<p class="product-details">Product Description: ' . $product['pro_desc'] . '</p>';
                echo '<p class="product-details">Product Price: $' . $product['pro_price'] . '</p>';

                // Add delete button with a form for each product
                echo '<form class="delete-form" method="post" action="deletefromcart.php">';
                echo '<input type="hidden" name="productId" value="' . $productId . '">';
                echo '<button class="delete-button" type="submit" name="deleteFromCart">Delete</button>';
                echo '</form>';

                echo '</div>';

                // Update total price
                $totalPrice += $product['pro_price'];
            }

            // Display total price
            echo '<p class="total-price">Total Price: $' . $totalPrice . '</p>';

            // Approve button to redirect to another form page
            echo '<a class="approve-button" href="confirmationform.php">Approve</a>';
        } else {
            echo "Error fetching cart details: " . mysqli_error($dbcon);
        }

        echo '</div>
                </body>
                </html>';
    } else {
        echo "Username not found.";
    }
} else {
    echo "User not logged in.";
}
?>



   <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
              In our store, you can get four categories of spare parts: engine, accessories, auto body, and decoration. In each category, there are many products.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                PAGES
              </h5>
              <li>
                <a href="index.html">
                  Home 
                </a>
              </li>
              <li>
                <a href="contact.html">
                  Contact
                </a>
              </li>
              <li>
                <a href="shop.html">
                  Store
                </a>
              </li>
              <li>
                <a href="help.html">
                  Help 
                </a>
              </li>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>Mojo Oromia ETHIOPIA </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+251 902862169</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> yohannisspares@gmail.com</span>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Terms of Condition
            </h6>
            <div class="info_link-box">
                
              <a href="">*  By completing a purchase on our website, you agree to pay the total amount specified in your order.</a> 
                
                 <a href="">*  Our return policy allows for returns within 3days of receiving your order. </a>
                
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span > 2023 </span> All Rights Reserved | By
          N6/14
        </p>
      </div>
    </footer>
  

  </section>


</body>

</html>

<?php
include("dbcon.php");
?>