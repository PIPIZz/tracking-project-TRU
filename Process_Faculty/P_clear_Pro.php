<?php

ob_start();
session_start();
$Line = $_GET["Line"];
$_SESSION["ProID"][$Line] = "";

header("location:../Faculty/index.php?menu=Date_test");

?>