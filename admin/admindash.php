<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: adlogin.php");
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
    ADMIN PAGE | YOHANIS SPAREPART STORE
  </title>

  <link href="../css/style.css" rel="stylesheet" />

  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    /* Style for the submit button */
    input[type="submit"] {
        background-color: #4CAF50; /* Set the background color to green */
        color: white; /* Set the text color to white */
        padding: 10px 20px; /* Set padding for better appearance */
        border: none; /* Remove the default border */
        border-radius: 5px; /* Add rounded corners */
        cursor: pointer; /* Change cursor on hover */
    }

    /* Hover effect */
    input[type="submit"]:hover {
        background-color: #45a049; /* Darker green on hover */
    }

    .dashboard-container {
        max-width: 800px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 8px;
    }

    input, #imageInput {
        padding: 10px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        padding: 12px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #45a049;
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
              <a class="nav-link" href="admindash.html">
                Admin dashboard <i class="fa fa-dashboard" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="areport.php">
                Sales Report
              </a>
            </li>
          
            
          <div class="user_option">
            <a href="adlogin.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
           
            
          </div>
        </div>
      </nav>
    </header><br><br>
    <h2 style="text-align: center;">Admin Dashboard</h2><br>
  </div><br>

    <div class="dashboard-container">
        <h3>Add New Product</h3>
        <form id="productForm" action="admindash.php" method="post" enctype="multipart/form-data"> 
          <label>Brand</label>
          <select name="carbrand"  >
            <option value="TOYOTA" >TOYOTA</option>
            <option value="HYUNDAI">HYUNDAI</option>
            <option value="SUZUKI">SUZUKI</option>
            <option value="BAJAJ">BAJAJ</option>
          </select> <br>

            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productname" required>
              <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>
            <label for="productdescription" >product description</label>
            <input type="text" id="productdescription" name="description" required>
    
            <label for="imageInput">Product Image:</label>
            <input type="file" id="imageInput" name="imagein" accept="image/*">
    
            <input type="submit" name="submit" value="submit"  >
        </form>
    </div>
    
    <script>
        function postProduct() {
            
            alert('Product posted!');
        }
    </script>
    
   </body>
    </html>
</body>
</html>

<?php

include("../dbcon.php");

if (mysqli_select_db($dbcon, "yospare")) {
    echo "Database selected successfully";
} else {
    echo "Unable to select database";
}

if (isset($_POST['submit'])) {
    
    $carbrand = $_POST['carbrand'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $description = $_POST['description'];
  

     // Process file upload
     $targetDirectory = "../images/"; // Specify the directory where you want to store the images
     $targetFileName = $targetDirectory . basename($_FILES["imagein"]["name"]);

     if (move_uploaded_file($_FILES["imagein"]["tmp_name"], $targetFileName)) {
         echo "The file " . htmlspecialchars(basename($_FILES["imagein"]["name"])) . " has been uploaded.";
     } else {
         echo "Sorry, there was an error uploading your file.";
     }


    
    $query = "INSERT INTO product (pro_brand, pro_name, pro_price, pro_desc, pro_img )
     VALUES ('$carbrand', '$productname', '$price' ,'$description' , '$targetFileName' )";

     

    if (mysqli_query($dbcon, $query)) {
        echo "</br>Record inserted successfully";
    } else {
        echo "Error inserting record: " . mysqli_error($dbcon);
    }
}

?>