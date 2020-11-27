<?php
include "../../adminTemplate/header.php";
?>

<?php

if(isset($_POST["update"]))
{
    // $_SESSION["p_id"]=$_POST["productId"];
    $p_id=$_POST["productId"];
    header("location:updateServer.php?p_id=$p_id");
}

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
                    <h2>Update Product:</h2>
                    <p align=center style="color:brown;"><?php if(isset($_GET["conf"])) if($_GET["conf"]) echo "successfully updated!"; else echo "Failed to update try again!"; ?></p>
                <div class="col-md-12 right-section">
                    <form action="<?php $_PHP_SELF; ?>" method="post" enctype="multipart/form-data">
                        <p>Enter Product Id:</p>
                        <input type="text" name="productId" autocomplete="off" autofocus>
                        <input type="submit" value="Enter To Update" name="update" class="myButton">
                    </form>
                </div>
            </div>
        </div>
      

</div>
 

<?php
include "../../adminTemplate/footer.php";
?>