<?php
session_start();
if(isset($_SESSION["clientName"]))
{
    header("location:home.php");
}
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");
if(isset($_POST["login"]))
{
    $un=$_POST["userId"];
    $pwd=$_POST["password"];
    $s="select * from clients where email='".$un."' or mobile='".$un."'";
    $r=mysqli_query($conn,$s);
    $row=mysqli_fetch_assoc($r);
    if($row["password"]==$pwd)
    {
        $_SESSION["clientName"]=$row["name"];
        $_SESSION["clientMobile"]=$row["mobile"];
        $_SESSION["clientEmail"]=$row["email"];
        $_SESSION["clientAddress"]=$row["address"];
        header("location:home.php");
    }
    else
    {
        echo "<script>alert('Please put correct infomation or SignUp/Register First!')</script>";
    }
}

?>
<?php include "../clientTemplate/header.php"; ?>
<div>
    <style>
            *{
                box-sizing: border-box;
            }
            body{
                padding: 0;
                margin: 0;
                background-color: rgb(247, 247, 247);
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
    
        </style>

<div class="fluid-container">
                <div class="row main">
                    <h2>Client LogIn Here</h2><hr>
                    <div class="col-md-12 right-section">
                        <form action="signIn.php" method="post">
                            <p>Enter Email/Mobile Number</p>
                            <input type="text" name="userId" autocomplete="off" autofocus>
                            <p>Enter Password</p>
                            <input type="password" name="password" autocomplete="off">
                            <input type="submit" value="LogIn" name="login" class="myButton">
                        </form>
                    </div>
                </div>
        </div>
</div>
 
<?php
include "../clientTemplate/footer.php";
?>