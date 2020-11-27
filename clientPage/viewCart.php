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
$cartProduct=array();
if(isset($_SESSION["cartProduct"]))
{
    $cartProduct=$_SESSION["cartProduct"];
}


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
.section{
    font-family: 'Goldman', cursive;
}
    .myButton {
	box-shadow: 0px 1px 0px 0px #fff6af;
	background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
	background-color:red;
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
   .button{
       margin:10px 0;
       
   }
   a
   {
       margin:0;
   }
   table{
       margin:20px auto;
   }
   table tr th{
       font-size:20px;
       color:blue;
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
                <a class="nav-link" href="viewCart.php" style="color:#fff;background-color:brown; border-radius:10px; padding:5px; text-align:center;">&#x1F6D2<b style="color:#fff;"><?php if(isset($_SESSION["cartProduct"])) echo count($_SESSION["cartProduct"]) ;?></b></a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="space"></div>

<div class="section">
<?php
$totalPrice=0;
?>
<?php  if(count($cartProduct)>0) { ?>
<h4 align=center style="color:brown;"><?php  if(isset($_GET["conf"])) {if($_GET["conf"]="1") echo "Your Order Successfully Done!" ; else echo "Your Order Failed Please try again!" ;} ?></h4>

   <table align=center border=2 cellpadding=5 class="table table-hover table-dark">
    <tr>
        <th>Name Of Product</th>
        <th>Enter Size</th>
        <th>Enter Quantity</th>
        <th>Price Of Product</th>
        <th>Product Image</th>
        <th>Remove From Cart</th>
    </tr>
    <?php foreach($_SESSION["cartProduct"] as $product) {  ?>
    <?php
        $totalPrice+=$product["ProductPrice"];
    ?>
        <tr>
            <td><?php echo  $product["ProductName"]; ?></td>
            <td>
              <select name="size" id="">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
              </select>
            </td>
            <td><input type="number" name="unit" id="" value="1"></td>
            <td><span>&#8377</span><?php echo  $product["ProductPrice"]; ?></td>
            <td><img src="../admin/addProducts/imgData/<?php echo  $product["Pic"]; ?>" alt="" width=90px height=100px></td>
            <td><a href="reProductCart.php?p_id=<?php echo  $product["ProductID"]; ?>" class="myButton">Remove</a></td>
        </tr>
    <?php  } ?>
    <tr>
        <th colspan=3>Total Price:</th>
        <th colspan=3><span>&#8377</span><?php echo $totalPrice; ?></th>
    </tr>
   </table>
        <?php
            $p_id=array();
            $i=1;
                foreach($_SESSION["cartProduct"] as $product)
                {
                    $p_id[$i++]=$product["ProductID"];
                }
            $p_ids=implode(",",$p_id);
            
        ?>
   <div align=center><a class="myButton1 " href="orderCartItems.php?p_ids=<?php echo $p_ids; ?>">Order Now</a></div>

    <?php  } else { ?>
     <h1 align=center>Sorry! There is no Item in Cart plaese add items.</h1>
    <?php  }?>

</div>

      <?php include "../clientTemplate/footer.php"; ?>