<?php
session_start();
if(isset($_SESSION["clientName"]))
{
    unset($_SESSION["clientName"]);
    unset($_SESSION["cartProduct"]);
    header("location:../index.php");
}

?>