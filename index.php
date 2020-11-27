
<?php
session_start();
if(isset($_SESSION["clientName"]))
{
    header("location:home.php");
}
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");
$s="select * from product";
$r=mysqli_query($conn,$s);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Goldman&family=Press+Start+2P&family=Roboto&display=swap" rel="stylesheet">
    <title>Home</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            padding: 0;
            margin: 0;
            background-color:rgb(255, 247, 247);
        }
        .Nav{
            position :fixed;
            top:0;
            z-index:1;
            width:100%;
            color:#fff;
        }
        .nav-icon{
            /* background-color:#fff; */
        }
        .space{
            height:100px;
            width:100%;
        }
        a,b{
            color:#fff;
            margin:0px 10px;
            font-family: 'Roboto', sans-serif;
        }
        a:hover{
            color:rgb(219, 219, 219);
        }
        .Brand{
            font-family: 'Press Start 2P', cursive;
            font-size:30px;
        }
        .Brand:hover{
            color:rgb(219, 219, 219);
        }
        li{
            margin:0px 35px;
        }
.section{
    font-family: 'Goldman', cursive;
}
    .Container{
        display:flex;
        flex-wrap:wrap;
        width:1200px; 
         margin:0px auto;
        
    }
    .Card{
        width:340px;
        /* height:600px; */
        margin:15px 30px;
        padding:5px;
        border-radius:5px;
        background-color:#fff;
        
    }
    .Card:hover{
        box-shadow:0px 0px 20px rgb(218, 218, 218);
    }
    .Card img{
        width:200px;
        display:block;
        margin:5px auto;
        cursor:pointer;
    }
    .Card .brand{
        opacity:0.5;
    }
    .Card .title{
        color:brown;
        font-size:25px;
    }
    .Card select{
        margin:0px 0px 10px 0px;
        width:80px;
        height:30px;
    }
    .Card .price{
        font-size:20px;
    }

    .myButton1 {
        box-shadow:inset 0px 1px 0px 0px #bee2f9;
        background:linear-gradient(to bottom, #63b8ee 5%, #468ccf 100%);
        background-color:#63b8ee;
        border-radius:6px;
        border:1px solid #477dc4;
        display:inline-block;
        cursor:pointer;
        color:#14396a;
        font-family:Arial;
        font-size:15px;
        font-weight:bold;
        padding:9px 12px;
        text-decoration:none;
        text-shadow:0px 1px 0px #7cacde;
    }
    .myButton1:hover {
        background:linear-gradient(to bottom, #468ccf 5%, #63b8ee 100%);
        background-color:#468ccf;
        color:black;
        text-decoration:none;
    }
    .myButton1:active {
        position:relative;
        top:1px;
    }

    .myButton {
	box-shadow: 0px 1px 0px 0px #fff6af;
	background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
	background-color:#ffec64;
	border-radius:6px;
	border:1px solid #ffaa22;
	display:inline-block;
	cursor:pointer;
	color:#333333;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:8px 27px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffee66;
    }
    .myButton:hover {
        background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
        background-color:#ffab23;
        color:black;
        text-decoration:none;
    }
    .myButton:active {
        position:relative;
        top:1px;
   }
   .button{
       margin:10px 0;
       
   }
   a
   {
       margin:0;
   }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary  Nav" >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon nav-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand Brand" href="index.php">GARB</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li>
                <a class="nav-link" href="clientPage/signIn.php">Login</a>
            </li>
            <li>
                <a class="nav-link" href="clientPage/signUp.php">Register</a>
            </li>
            <li>
                <a class="nav-link" href="admin/AdminLogin.php">Admin Login</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="space"></div>
<div class="section">
<div class="Container">
<?php while($row=mysqli_fetch_assoc($r)) { ?>
    <div class="Card">
        <a href="clientPage/signIn.php"><img src="admin/addProducts/imgData/<?php echo $row["Pic"]; ?>" alt="Product image"></a>
        <p class="brand"><?php  echo $row["Brand"]; ?></p>
        <h5 class="title"><?php  echo $row["ProductName"]; ?></h5>
        <p class="price"><span>&#8377</span><?php  echo $row["ProductPrice"]; ?></p>
        <select name="size" id="">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
        </select>
        <div class="button">
            <a class="myButton1" href="clientPage/buy.php">Buy</a>
        </div>
    </div>

<?php  } ?>
</div>

</div>

<?php include "clientTemplate/footer.php"; ?>