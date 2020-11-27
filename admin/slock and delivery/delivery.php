<?php
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");
$conf=false;
if(isset($_POST["delete"]))
{
    $id=$_POST["id"];
    $s="delete from custorders where id='".$id."'";
    $r=mysqli_query($conn,$s);
    if($r)
    {
        $conf=true;
    }
    else
    {
       $conf=true;
    }
}



$s="select * from custorders";
$r=mysqli_query($conn,$s);


?>

<?php
include "../../adminTemplate/header.php";
?>

<style>
    table{
        margin:40px auto;
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
</style>
<div class="body">
<h1 align=center>Ordered List</h1><hr>

<p align=center style="color:brown; font-size:20px;"><?php  if($conf) echo "successfully deleted please check!" ; ?></p>

<table align=center border=2 cellpadding=9 class="table table-hover table-dark">
    <tr>
        <th>Product Id</th>
        <th>Size</th>
        <th>Units</th>
        <th>Customer Name</th>
        <th>Customer Mobile</th>
        <th>Customer Email</th>
        <th>Customer Address</th>
    </tr>
    <?php while($row=mysqli_fetch_assoc($r)) { ?>
    <tr>
        <td><?php   echo $row["id"] ; ?></td>
        <td><?php   echo $row["productId"] ; ?></td>
        <td><?php   echo $row["size"] ; ?></td>
        <td><?php   echo $row["unit"] ; ?></td>
        <td><?php   echo $row["custName"] ; ?></td>
        <td><?php   echo $row["custMobile"] ; ?></td>
        <td><?php   echo $row["custEmail"] ; ?></td>
        <td><?php   echo $row["custAddress"] ; ?></td>
    </tr>
    <?php  } ?>
    
</table>
<hr>
<h4 align=center>Delete Customer order If Order Has been done.</h4>

<div class="row main">
    <h2>Delete From list</h2>
    <div class="col-md-12 right-section">
        <form action="<?php $_PHP_SELF; ?>" method="post">
            <p>Enter Id:</p>
            <input type="text" name="id" autocomplete="off" autofocus>
            <input type="submit" value="Delete" name="delete" class="myButton">
        </form>
    </div>
</div>

</div>


<?php
include "../../adminTemplate/footer.php";
?>