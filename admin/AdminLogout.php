<?php
session_start();
unset($_SESSION["adminName"]);
header("location:../index.php");


?>