
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: deliverylogin.php");
    exit;
}
?>
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
    DELIVERY | YOHANIS SPAREPART STORE
  </title>

  <link href="../css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="fonts/fontawesome-webfont.ttf">

  <style>
   

    .cart-container {
        max-width: 800px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product {
        display: flex;
        border-bottom: 1px solid #ccc;
        margin-bottom: 10px;
        padding-bottom: 10px;
    }

    .product img {
        max-width: 100px;
        max-height: 100px;
        margin-right: 10px;
    }

    .product-details {
        flex-grow: 1;
    }

    .product-details h3 {
        margin: 0;
        color: #333;
    }

    .product-details p {
        margin: 0;
        color: #777;
    }

    .delete-button {
        background-color: #e74c3c;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
  
</head>

<body><br>
  <div class="hero_area">
   
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
       

        <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <h6 style="padding-right: 45px; font-size: 22px; font-family:Arial, Helvetica, sans-serif;" >YOHANNIS SPARES</h6>

            
            <li class="nav-item active">
              <a class="nav-link" href="delivery.html">
                DELIVERY
              </a>
            </li>
          
            
          <div class="user_option">
            <a href="deliverylogin.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
           
            
          </div>
        </div>
      </nav>
    </header>

  </div><br><br><br>
  <div class="heading_container heading_center">
    <h2>
      
    </h2>
  </div><br><br>

  <div class="cart-container">
    <div class="product">
        <img src="product1.jpg" alt="Product 1">
        <div class="product-details">
            <h3>Product 1</h3>
            <p>Description: Lorem ipsum dolor sit amet.</p>
            <p>Price: $19.99</p>
        </div>
       
    </div>

    <div class="product">
        <img src="product2.jpg" alt="Product 2">
        <div class="product-details">
            <h3>Product 2</h3>
            <p>Description: Consectetur adipiscing elit.</p>
            <p>Price: $29.99</p>
        </div>
        
    </div>

    <!-- Add more product entries as needed -->
    <button class="delete-button">Deliverd</button>
</div>

<br><br><br><br><br>
  
  

</body>

</html>