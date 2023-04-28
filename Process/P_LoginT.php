<?php
session_start();

        if(isset($_REQUEST['btn_choice'])){
            $choice = $_REQUEST['choice'];
            print  $choice ;
            if($choice == 1){
                echo "<script>window.location='../Teacher/index.php?menu=home';</script>";
            }else if ($choice == 2){
                echo "<script>window.location='../Admin/index.php?menu=home';</script>";
            }
            
        }
?>