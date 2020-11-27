<?php
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");
$conf=false;
if(isset($_POST["add"]))
{
    $p_id=$_POST["productId"];
    $p_name=$_POST["productName"];
    $p_price=$_POST["productPrice"];
    $p_brand=$_POST["brand"];
    $p_quantity=$_POST["quantity"];
    $p_pic=$_FILES["pic"]["name"];
    $p_temp_pic=$_FILES["pic"]["tmp_name"];
    move_uploaded_file($p_temp_pic,"imgData/$p_pic");
    $s="insert into product values ('".$p_id."','".$p_name."','".$p_price."','".$p_brand."','".$p_pic."','".$p_quantity."','".null."')";
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
                    <h2>Add Products:</h2>
                    <p style="color:red; font-size:25px; text-align:center;"><?php if($conf) echo "successfully added!"; ?></p>
                <div class="col-md-12 right-section">
                    <form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                        <p>Enter Product Id:</p>
                        <input type="text" name="productId" autocomplete="off">
                        <p>Enter Product Name:</p>
                        <input type="text" name="productName" autocomplete="off">
                        <p>Enter Product Price:</p>
                        <input type="text" name="productPrice" autocomplete="off">
                        <p>Enter Brand:</p>
                        <input type="text" name="brand" autocomplete="off">
                        <p>Enter Quantity Of This Product:</p>
                        <input type="text" name="quantity" autocomplete="off">
                        <p>Enter Pic:</p>
                        <input type="file" name="pic" autocomplete="off">
                        <input type="submit" value="Add" name="add" class="myButton">
                    </form>
                </div>
            </div>
        </div>


<?php
include "../../adminTemplate/footer.php";
?>