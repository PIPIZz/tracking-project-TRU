<?php 
 session_start(); 
 include('../connect/config.php');
 $id = $_GET['id'];
 
 $sql = "SELECT * FROM  file1  WHERE Pro_id = '$id' AND F_Status= 1    ";
 $stmt = $conn->prepare($sql);
 $stmt->execute();
 $res = $stmt->fetch();
 $count = $stmt->rowCount();

if($count < 1){
    echo "<script>alert('No Project Waitting allow')</script>";
   echo "<script>window.location='../Teacher/index.php?menu=enroll'</script>";  
}else{
    header("Location:../Teacher/check_file.php?id=$id");
}
?>