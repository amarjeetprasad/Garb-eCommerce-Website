<?php
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");
$conf=false;
if(isset($_POST["remove"]))
{
    $p_id=$_POST["productId"];
    $s="delete from product where productID='".$p_id."'";
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


<?php
include "../../adminTemplate/header.php";
?>
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
            margin: 0px 0;
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
                <h2>Remove Products:</h2>
                <p style="color:red; font-size:25px; text-align:center;"><?php if($conf) echo "successfully deleted!"; ?></p>
                <div class="col-md-12 right-section">
                    <form action="remove.php" method="POST">
                        <p>Enter Product Id:</p>
                        <input type="text" name="productId" autocomplete="off" autofocus>
                        <input type="submit" value="Remove" name="remove" class="myButton">
                    </form>
                </div>
            </div>
        </div>
 

<?php
include "../../adminTemplate/footer.php";
?>