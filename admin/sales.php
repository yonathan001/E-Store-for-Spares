<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: saleslogin.php");
    exit;
}

include("../dbbcon.php");

$query = "SELECT c.*, d.deli_person
          FROM customer c
          LEFT JOIN delivery d ON c.c_id = d.c_id";

$result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Sales | YOHANIS SPAREPART STORE</title>

    <link href="../css/style.css" rel="stylesheet" />

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        .customer-info {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .assign-button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .assigned-text {
            background-color: red;
            color: white;
            width: 80px;
            padding: 5px;
            border-radius: 4px;
        }
    </style>

</head>

<body>
    <div class="hero_area">
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <h6 style="padding-right: 45px; font-size: 22px; font-family: Arial, Helvetica, sans-serif;">YOHANNIS SPARES</h6>
                        <li class="nav-item active">
                            <a class="nav-link" href="sales.php">
                                Sales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sreport.php">
                                Delivery Report
                            </a>
                        </li>
                        <div class="user_option">
                            <a href="saleslogin.php">
                                <i class="bi bi-person"></i>
                                <span>Login</span>
                            </a>
                        </div>
                    </ul>
                </div>
            </nav>
            <br><br><br>

            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="customer-info">';
                    echo '<h2>Customer Information</h2>';
                    echo '<p>Customer ID: ' . $row['c_id'] . '</p>';
                    echo '<p>Name: ' . $row['name'] . '</p>';
                    echo '<p>Location: ' . $row['address'] . '</p>';
                    echo '<p>Phone: ' . $row['phone_no'] . '</p>';
                    echo '<p>Delivery Type: ' . $row['deli_type'] . '</p>';

                    // Add buttons to assign delivery person
                    echo '<a class="assign-button" href="../delivery/assign_deli.php?c_id=' . $row['c_id'] . '&deli_person=1">Assign Delivery 1</a><br>';
                    echo '<a class="assign-button" href="../delivery/assign_deli.php?c_id=' . $row['c_id'] . '&deli_person=2">Assign Delivery 2</a><br>';

                    // Display "ASSIGNED" text if a delivery person is assigned
                    if (!empty($row['deli_person'])) {
                        echo '<p class="assigned-text">ASSIGNED</p>';
                    }

                    echo '<p>Assigned Delivery Person: ' . $row['deli_person'] . '</p>';

                    echo '</div>';
                }
            } else {
                echo "Error fetching data: " . mysqli_error($dbcon);
            }

            mysqli_close($dbcon);
            ?>
        </header><br><br>
    </div>
</body>

</html>
