<?php
session_start();

if($_SESSION['sess_status'] != ""){


}else if($_SESSION['sess_status'] == 'Teacher' && $_SESSION['sess_status'] != ""){
    
}else if($_SESSION['sess_status'] == 'Secretary' && $_SESSION['sess_status'] != ""){
    
}else if($_SESSION['sess_status'] == 'Admin' && $_SESSION['sess_status'] != ""){
    
}else if($_SESSION['sess_status'] == 'T_Admin' && $_SESSION['sess_status'] != ""){
    
}else{
    echo "<script>alert('Plasess Login');</script>";
    echo "<script>window.location='../index.php?menu=home';</script>";
}

?>