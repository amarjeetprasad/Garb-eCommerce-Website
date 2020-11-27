<?php
include "../clientTemplate/header.php";
?>

<?php
session_start();
if(isset($_SESSION["clientName"]))
{
    header("location:home.php");
}
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("Opps! failed to connect with database");
$conf=false;
if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $password=$_POST["password"];
    $address=$_POST["address"];
    $gender=$_POST["gender"];
    $s="insert into clients (name,email,mobile,password,address,gender) values ('".$name."','".$email."','".$mobile."','".$password."','".$address."','".$gender."')";
    $r=mysqli_query($conn,$s);
    if($r)
    {
        $conf=true;
    }
    else
    {
        $conf=false;
    }
}


?>



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
            width: 600px;
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
        .right-section input:not([type="radio"]){
            display: block;
           margin: 0px 0px 20px 40px;
            width: 400px;
            height: 35px;
            outline: none;
        }
        .right-section textarea{
            margin: 0px 0px 20px 40px;
        }
        .right-section p{
            margin: 20px 0px 20px 40px;
            font-size: 20px;
        }
        .right-section input[type="submit"]{
            height: 50px;
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
    <script>
    function valid()
    {
        pwd=document.frm.password.value;
        cpwd=document.frm.cPassword.value;
        if(pwd!=cpwd)
        {
            document.frm.cPassword.focus();
            document.getElementById("error").innerHTML="password is not matched";
        }
        else
        {
            document.getElementById("error").innerHTML="";
        }
    }
    
    </script>






        <div class="fluid-container">
                <div class="row main">
                    <h2>Client Register Here</h2>
                    <div class="col-md-12 right-section">
                    <p style="color:orange; font-size:25px;"><?php  if($conf) echo "You have successfully done your signUp!";  ?></p>
                        <form action="signUp.php" name="frm" method="post">
                            <p>Enter Name:</p>
                            <input type="text" name="name" autocomplete="off" autofocus>
                            <p>Enter Email:</p>
                            <input type="email" name="email" autocomplete="off">
                            <p>Enter Mobile Number:</p>
                            <input type="text" name="mobile" autocomplete="off">
                            <p>Enter Password:</p>
                            <input type="password" name="password" autocomplete="off" >
                            <p>Enter Confirm Password:</p>
                            <input type="password" name="cPassword" autocomplete="off" >
                            <p id="error" style="color:red;"></p>
                            <p>Enter Full Address With Pin Code:</p>
                            <textarea name="address" id="" cols="40" rows="10" onfocus="valid()"></textarea>
                            <p>Gender: <input type="radio" name="gender" value="male">Male&nbsp;&nbsp;<input type="radio" name="gender" id="" value="female">Female</p>
                            <input type="submit" value="Register" name="submit" class="myButton">
                        </form>
                    </div>
                </div>
        </div>
    </div>


<?php
include "../clientTemplate/footer.php";
?>