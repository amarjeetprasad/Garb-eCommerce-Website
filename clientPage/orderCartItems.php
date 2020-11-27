<?php
session_start();
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");
if(isset($_GET["p_ids"]))
{
    $p_ids=$_GET["p_ids"];
    $p_ids=explode(",",$p_ids);
    $conf=0;
    $clientName=$_SESSION["clientName"];
    $clientMobile=$_SESSION["clientMobile"];
    $clientEmail=$_SESSION["clientEmail"];
    $clientAddresss=$_SESSION["clientAddress"];
    for($i=0;$i<count($p_ids);$i++)
    {
        $p_id=$p_ids[$i];
        $s="insert into custorders (productId,custName,custMobile,custEmail,custAddress,unit)  values ('".$p_id."','".$clientName."','".$clientMobile."','".$clientEmail."','".$clientAddresss."',1)";
        $r=mysqli_query($conn,$s);
        if($r)
        {
            $conf=1;
            
        }
        else
        {
            $conf=0;
        }
    }
    header("location:viewCart.php?conf=$conf");
}


?>