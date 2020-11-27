<?php
session_start();
if(isset($_GET["p_id"]))
{
    $p_id=$_GET["p_id"];
    unset($_SESSION["cartProduct"][$p_id]);
}
else
{
    echo "<script>alert('Failed to remove please Try again !');</script>";
}
header("location:viewCart.php");

?>