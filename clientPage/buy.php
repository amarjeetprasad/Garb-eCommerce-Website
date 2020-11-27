
<?php
    $conn=mysqli_connect("localhost","root","","admindb");
    if(!$conn)
    die("opps-- failed to connect with database");
    session_start();
    $conf=false;
    if(isset($_SESSION["clientName"]))
    {
        $clientName=$_SESSION["clientName"];
    }
    else
    {
        header("location:signIn.php");
    }
    if(isset($_GET["p_id"]))
    {
        $p_id=$_GET["p_id"];
        $s="select * from product where ProductID='".$p_id."'";
        $r=mysqli_query($conn,$s);
        $row=mysqli_fetch_assoc($r);
    }
    if(isset($_POST["buy"]))
    {
        $p_id=$_GET["p_id"];
        $size=$_POST["size"];
        $unit=$_POST["unit"];
        $clientName=$_SESSION["clientName"];
        $clientMobile=$_SESSION["clientMobile"];
        $clientEmail=$_SESSION["clientEmail"];
        $clientAddresss=$_SESSION["clientAddress"];
        $s="insert into custorders  values (null,'".$p_id."','".$size."','".$unit."','".$clientName."','".$clientMobile."','".$clientEmail."','".$clientAddresss."')";
        $r=mysqli_query($conn,$s);
        if($r)
        {
            $conf=true;
        }
        else
        {
            $conf=false;
            echo "<script>alert('failed to buy please try again');</script>";
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



    .section{
    font-family: 'Goldman', cursive;
}
.section h1{
    margin:0px 0 40px 0px;
}
.section table th,td{
    font-size:20px;
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
            <li>
                <a class="nav-link" href="signOut.php">LogOut</a>
            </li>
            <li>
                <a class="nav-link" href="cClientPwd.php">change password</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li>
            <a class="nav-link" href="viewCart.php" style="color:#fff;background-color:brown; border-radius:10px; padding:5px; text-align:center;">&#x1F6D2<b style="color:black;"><?php if(isset($_SESSION["cartProduct"])) echo count($_SESSION["cartProduct"]) ;?></b></a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="space"></div>

<div class="section">
<h1 align=center>Buy The Product</h1>
<form action="<?php $_PHP_SELF; ?>" method="post">
<table align=center border=1 cellpadding=15 class="table table-hover table-dark">
    <tr>
        <th>Brnad</th>
        <th>Title</th>
        <th>Price</th>
        <th>Select Size</th>
        <th>Enter Units</th>
        <th>Image</th>
    </tr>
    <tr align=center>
        <td><?php echo $row["Brand"]; ?></td>
        <td><?php echo $row["ProductName"]; ?></td>
        <td><?php echo $row["ProductPrice"]; ?></td>
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
        <td><img src="../admin/addProducts/imgData/<?php echo $row["Pic"]; ?>" alt="<?php echo $row["ProductName"]; ?> Image" width=150px height=170px></td>
    </tr>
    <tr align=center>
    <td colspan=6><input class="myButton1 " type="submit" name="buy" id="" value="Order"></td>
    </tr>
</table>
<p align=center style="color:brown; font-size:18px;"><?php if($conf) echo "Your Order Successfully Done, Now you will get details of order on your Email/Mobile shortly ,Thanks for shopping with Us😊!" ; ?></p>
<div align=center>
    <a href="home.php" class="myButton" >Shop More</a>
</div>
</form>
</div>

<?php include "../clientTemplate/footer.php"; ?>