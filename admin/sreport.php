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
   Delivery-Report| YOHANIS SPAREPART STORE
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
            <li class="nav-item">
              <a class="nav-link" href="sales.php">
                Sales 
              </a>
            </li>
            <li class="nav-item  active">
              <a class="nav-link" href="sreport.php">
                Delivery Reports
              </a>
            </li>
          
            
          <div class="user_option">
            <a href="saleslogin.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
           
            
          </div>
        </div>
      </nav>
    </header><br><br>

<?php
include("../dbbcon.php");

// Retrieve delivery reports from the database
$reportQuery = "SELECT * FROM delivery_reports";
$result = mysqli_query($dbcon, $reportQuery);

// Display the delivery reports
echo '<h2> Delivery Reports </h2>';
echo '<ul>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<li>' . $row['report_message'] . '</li>';
}
echo '</ul>';

?>

</body>
</html>