<?php
include "../../adminTemplate/header.php";
?>
<?php

$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");


if(isset($_GET["p_id"]))
{
    $p_id=$_GET["p_id"];
    $s="select * from product where ProductID='".$p_id."'";
    $r=mysqli_query($conn,$s);
    $row=mysqli_fetch_assoc($r);
    $p_name=$row["ProductName"];
    $p_price=$row["ProductPrice"];
    $p_brand=$row["Brand"];
}
else
{
    header("location:update.php");
}

$conf=1;
if(isset($_POST["update"]))
{
    $id=$_POST["productId"];
    $name=$_POST["productName"];
    $price=$_POST["productPrice"];
    $brand=$_POST["brand"];
    $pic=$_FILES["pic"]["name"];
    $temp_pic=$_FILES["pic"]["tmp_name"];
    move_uploaded_file($temp_pic,"../addProducts/imgData/$pic");
    $s="update product set  ProductName='".$name."' , ProductPrice='".$price."' , ProductBrand='".$brand."',Pic='".$pic."'  where  ProductID='".$id."'";
    $r=mysqli_query($conn,$s);
    if($r!=0)
    {
        $conf=1;
        
    }
    else
    {
        $conf=0;
    }
    header("location:update.php?conf=$conf");
   
}




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
                    <h2>Update Product:</h2>
                <div class="col-md-12 right-section">
                    <form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                        <p>Enter Product Id:</p>
                        <input type="text" name="productId" autocomplete="off" value="<?php  echo $p_id; ?>" readonly>
                        <p>Enter Product Name:</p>
                        <input type="text" name="productName" autocomplete="off" value="<?php  echo $p_name; ?>">
                        <p>Enter Product Price:</p>
                        <input type="text" name="productPrice" autocomplete="off" value="<?php  echo $p_price; ?>">
                        <p>Enter Brand:</p>
                        <input type="text" name="brand" autocomplete="off" value="<?php  echo $p_brand; ?>">
                        <p>Enter Pic:</p>
                        <input type="file" name="pic" autocomplete="off" >
                        <input type="submit" value="Update" name="update" class="myButton">
                    </form>
                </div>
            </div>
        </div>


<?php
include "../../adminTemplate/footer.php";
?>