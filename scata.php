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
    Suzuki YOHANNIS SPARE PART STORE
  </title>

  <link href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="fonts/fontawesome-webfont.ttf">
  <style>
    /* Style for the detailed paragraph */
    .details {
      display: none;
      position: absolute;
      top: 100%; /* Position it below the link */
      left: 0;
      width: 200px; /* Set your desired width */
      background-color: #f0f0f0;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      z-index: 1; /* Set a higher z-index to make it appear on top */
    }

    /* Show the detailed paragraph when the link is hovered */
    h6:hover + .details {
      display: block;
    }
  </style>
  
</head>

<body>
  <div class="hero_area">
    
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
       

        <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <h6 style="padding-right: 45px; font-size: 22px; font-family:Arial, Helvetica, sans-serif;" >YOHANNIS SPARES</h6>

            <li class="nav-item ">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="shop.html">
                STORE
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.html">
                cart
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="help.html">
                HELP
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
          </ul>
          <div class="user_option">
            <a href="login.html">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="cart.html">
              <i class="fa fa-cart-plus" aria-hidden="true"></i>
            </a>
            
          </div>
        </div>
      </nav>
    </header>
   
  </div>


  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Suzuki spares
        </h2>
      </div>
      <div class="row">
      <?php
   



   include("dbbcon.php");

   $basePath = "images/";
   // Fetch all products from the database
   $result = mysqli_query($dbcon, "SELECT * FROM product");

   if ($result) {
    // Display each product
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                  <div class="img-box">
                    <img src="'. $basePath . $row['pro_img'] . '" alt="Product Image">
                  </div>
                  <div class="detail-box">
                    <h6>
                      <a href="#">Add to cart <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
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
    echo "Error fetching product details: " . mysqli_error($dbcon);
}

?>

        
          </div>
        </div>
       
        </div>
       
        </div>
        
      
      </div>
      
    </div>
  </section>

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
if (mysqli_select_db($dbcon, "yospare")) {
  echo "Database selected successfully";
} else {
  echo "Unable to select database";
}
?>