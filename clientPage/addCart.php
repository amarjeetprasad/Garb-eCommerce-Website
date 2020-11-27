<?php
session_start();
$conn=mysqli_connect("localhost","root","","admindb");
if(!$conn)
die("opps-- failed to connect with database");
if(isset($_GET["p_id"]))
{
    $p_id=$_GET["p_id"];
    $s="select * from product where ProductID='". $p_id."'";
    $r=mysqli_query($conn,$s);
    $row=mysqli_fetch_assoc($r);
    $_SESSION["cartProduct"][$p_id]=$row;
    header("location:home.php");
}

?>