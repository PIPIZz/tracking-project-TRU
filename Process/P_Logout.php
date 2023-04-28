<?php
session_start();
$_SESSION['sess_id'] = "";
$_SESSION['sess_status'] = "";
session_destroy();

echo "<script>window.location='../index.php?menu=home';</script>";
// if(empty($_SESSION['sess_id']) && empty($_SESSION['sess_status'])){
//     header("location: ../index.php");
// }
//     header("location: ../index.php");
?>