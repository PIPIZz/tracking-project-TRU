<?php

ob_start();
session_start();
$Line = $_GET["Line"];
$_SESSION["StuID"][$Line] = "";

header("location:../students/index.php?menu=Project");

?>