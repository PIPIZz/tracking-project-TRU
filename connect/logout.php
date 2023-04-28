<?php


$_SESSION['sess_id'] = "";
$_SESSION['sess_status'] = "";

if(empty($_SESSION['sess_id']) && empty($_SESSION['sess_status'])){
    header("location: ../index.php?menu=home");
}
?>