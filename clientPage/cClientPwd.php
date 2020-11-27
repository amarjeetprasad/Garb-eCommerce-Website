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
if(isset($_POST["login"]))
{
    $un=$_POST["userId"];
    $pwd=$_POST["password"];
    $cpwd=$_POST["cpassword"];
    $s="update clients set password='".$cpwd."' where email='".$un."' and password='".$pwd."'";
    $r=mysqli_query($conn,$s);
    if($r)
    {
        echo "<script>alert('Your password successfully changed!);</script>";
        header("location:signOut.php");
        
    }
    else
    {
        echo "<script>alert('Please put correct data!);</script>";
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
.section{
    font-family: 'Goldman', cursive;
}


.main{
                width: 500px;
                height: 600px;
                margin: 20px auto;
                background-color: rgb(248, 207, 207);
                box-shadow: 0px 10px 7px -7px #276873;
                padding: 20px 0;
                font-family:cursive;
                border-radius: 10px;
                
            }
            h2{
                margin: 0px 0px 0px 50px;
                padding: 0;
                text-align: center;
            }
            .right-section input{
                display: block;
               margin: 0px 0px 20px 40px;
                width: 400px;
                height: 50px;
                outline: none;
            }
            .right-section p{
                margin: 20px 0px 20px 40px;
                font-size: 20px;
            }
            .myButton {
                box-shadow: 0px 10px 7px -7px #276873;
                background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
                background-color:#599bb3;
                border-radius:7px;
                display:inline-block;
                cursor:pointer;
                color:#ffffff;
                font-family:Arial;
                font-size:19px;
                font-weight:bold;
                padding:13px 75px;
                text-decoration:none;
                text-shadow:0px 1px 0px #3d768a;
    }
            .myButton:hover {
                background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
                background-color:#408c99;
            }
            .myButton:active {
                position:relative;
                top:1px;
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
<div class="fluid-container">
                <div class="row main">
                    <h2>Change your password Here</h2><hr>
                    <div class="col-md-12 right-section">
                        <form action="cClientPwd.php" method="post">
                            <p>Enter Email Number</p>
                            <input type="text" name="userId" autocomplete="off" autofocus>
                            <p>Enter Old Password</p>
                            <input type="password" name="password" autocomplete="off">
                            <p>Enter New Password</p>
                            <input type="password" name="cpassword" autocomplete="off">
                            <input type="submit" value="Change" name="login" class="myButton">
                        </form>
                    </div>
                </div>
        </div>
</div>
 
<?php
include "../clientTemplate/footer.php";
?>