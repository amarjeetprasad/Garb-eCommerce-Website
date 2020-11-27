<?php
 session_start();
 if(isset($_SESSION["clientName"]))
 {
     $clientName=$_SESSION["clientName"];
 }
 else
 {
     header("location:signIn.php");
 }
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");

if(isset($_GET["p_id"]))
{
    $p_id=$_GET["p_id"];
    $s="select * from product where ProductID='".$p_id."'";
    $r=mysqli_query($conn,$s);
    $row=mysqli_fetch_assoc($r);
    $review=$row["Review"];
    $reviews=explode(",",$review);
}
if(isset($_POST["put"]))
{
    $review=$row["Review"];
    $review=$review.",".$_POST["comment"];
    $s="update product set Review='".$review."' where ProductID='".$p_id."'";
    $r=mysqli_query($conn,$s);
    if($r)
    {
        header("location:productDetails.php?p_id=$p_id");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Goldman&family=Press+Start+2P&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap.min.css">
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
        width:650px;
        margin:15px 30px;
        padding:5px;
        border-radius:5px;
        background-color:#fff;
        
    }
    .Card img{
        width:300px;
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
   form{
       margin:0px 25px;
   }
   form p{
       font-size:30px;
   }
   form input{
       background-color:Green;
       width:80px;
       height:40px;
       border-radius:10px;
       box-shadow:0px 0px 10px #dcdc;
       padding:5px;
       color:#fff;
   }
   .comment{
       margin:0px 25px;
   }
   .comment p{
       font-size:21px;
       color:gray;
   }
   li{
       margin:0px 35px;
   }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary  Nav" >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon nav-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand Brand" href="home.php">GARB</a>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li>
                <b style="padding:15px; color:#fff; ">Hello! <?php echo $clientName; ?></b>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li>
                <a class="nav-link" href="signOut.php">LogOut</a>
            </li>
            <li>
                <a class="nav-link" href="cClientPwd.php">change password</a>
            </li>
            <li>
            <a class="nav-link" href="viewCart.php" style="color:#fff;background-color:brown; border-radius:10px; padding:5px; text-align:center;" >&#x1F6D2<b style="color:#fff;"><?php if(isset($_SESSION["cartProduct"])) echo count($_SESSION["cartProduct"]) ;?></b></a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="space"></div>

<div class="section">
   <div class="Card">
        <img src="../admin/addProducts/imgData/<?php echo $row["Pic"]; ?>" alt="Product image">
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
            <a class="myButton1 " href="buy.php?p_id=<?php echo $row["ProductID"]; ?>">Buy</a>
            <a class="myButton " href="addCart.php?p_id=<?php echo $row["ProductID"]; ?>" style="background-color:yellow;">Add Cart</a>
        </div>
    </div>
    <div>
        <form action="<?php  $_PHP_SELF; ?>" method="post">
            <p>Please Put Your Comment/Review Here...</p>
            <textarea name="comment" id="" cols="65" rows="5"></textarea><br>
            <input type="submit" value="Put" name="put">
        </form>
    </div>
    <div class="comment">
        <h1>Comments/Reviews....................</h1>
        <?php foreach($reviews as $rev) { ?>
               <p>* <?php echo $rev; ?></p>
        <?php } ?>
    </div>
</div>

<?php include "../clientTemplate/footer.php"; ?>
