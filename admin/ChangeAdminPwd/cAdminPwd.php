<?php
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");
if(isset($_POST["Change"]))
{
        $userId=$_POST["userId"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
        $s="update admin set password='".$cpassword."' where userid='".$userId."' and password='".$password."'";
        $r=mysqli_query($conn,$s);
        if($r)
        {
              header("location:../AdminLogout.php");
        }
        else
        {
                
                echo "<script>alert('failed to update please try again');</script>";
        }
}



?>

<?php
include "../../adminTemplate/header.php";
?>
<div class="body">

<style>
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
            padding: 0px 20px;
            text-align: center;
        }
        .right-section input:not([type="radio"]){
            display: block;
           margin: 0px 0px 20px 40px;
            width: 400px;
            height: 35px;
            outline: none;
        }
        .right-section p{
            margin: 20px 0px 20px 40px;
            font-size: 20px;
        }
        .right-section input[type="submit"]{
            height: 50px;
        }
    </style>
        <div class="body">
            <div class="row main">
                    <h2>Change Your Password:</h2>
                <div class="col-md-12 right-section">
                    <form action="<?php $_PHP_SELF;  ?>" method="post" enctype="multipart/form-data">
                        <p>Enter User Id:</p>
                        <input type="text" name="userId" autocomplete="off" autofocus>
                        <p>Enter Old Password:</p>
                        <input type="password" name="password" autocomplete="off">
                        <p>Enter New Password:</p>
                        <input type="password" name="cpassword" autocomplete="off">
                        <input type="submit" value="Change" name="Change" class="myButton">
                    </form>
                </div>
            </div>
        </div>

</div>

<?php
include "../../adminTemplate/footer.php";
?>