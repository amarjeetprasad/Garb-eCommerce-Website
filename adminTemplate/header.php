<?php 
session_start(); 
if(!isset( $_SESSION["adminName"]))
{
    header("location:../AdminLogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap.min.css">
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            margin: 0;
            padding: 0;
            background-color: rgb(235, 214, 255);
        }
        .left .profilePic{
            width: 60px;
            height: 60px;
            background-color: slategray;
            border-radius: 50%;
            display: inline-block;
        }
        .left p{
            display: inline;
            position: absolute;
            top: 15px;
            margin: 0px 10px;
        }
        .user{
            background-color:#ea2c62;
            padding:5px;
            border-radius:10px;
            box-shadow:0px 0px 10px #fff;
            color:yellow;
            font-size:20px;
        }
        .right{
            text-align: right;
            padding: 10px 5px;
        }
        .right a{
            margin: 0px 15px;
        }

        .myButton {
            box-shadow: 0px 10px 7px -7px #276873;
            background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
            background-color:#6259b3;
            border-radius:7px;
            display:inline-block;
            color:#ffffff;
            font-family:Arial;
            font-size:15px;
            font-weight:bold;
            padding:5px 20px;
            text-decoration:none;
            text-shadow:0px 1px 0px #3d768a;

}
        .myButton:hover {
            background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
            background-color:#408c99;
            text-decoration: none;
            color: black;
        }
        .myButton:active {
            position:relative;
            top:1px;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row bg-info p-3">
            <div class="col-md-2 left">
                <a href="../home/home.php"><p class="user">Hello! <span style="color:#fff;"><?php echo $_SESSION["adminName"]; ?></span></p></a>
            </div>
            <div class="col-md-10 right">
                <a href="../addProducts/product.php" class="myButton">Add Products</a>
                <a href="../removeProduct/remove.php" class="myButton">Remove Products</a>
                <a href="../update/update.php" class="myButton">Update Products</a>
                <a href="../viewProducts/view.php" class="myButton">View Products</a>
                <a href="../customer/customer.php" class="myButton">Customer</a>
                <a href="../slock and delivery/delivery.php" class="myButton">Stock and Delivery</a>
                <a href="../AdminLogout.php" class="myButton">LogOut</a>
            </div>
        </div>