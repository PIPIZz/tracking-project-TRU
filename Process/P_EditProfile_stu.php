<?php

$button = isset($_REQUEST['button_edit']);

if ($button){
  
    $id = $_REQUEST['edit_id'];
    $name = $_REQUEST['edit_Stu_name'];
    $BA = $_REQUEST['edit_stu_BA'];

    $email = $_REQUEST['edit_email'];
    $sector = $_REQUEST['edit_Sector'];
    $Phone = $_REQUEST['edit_Phone'];
    $status = $_REQUEST['edit_status'];
    // echo $id ;
    // exit();
    ##################################################################################################################################
    ##################################################################################################################################
    include('../connect/config.php');


    $sql_email ="SELECT * From student where email = '$email'";
    $stmt_email = $conn->prepare($sql_email);
    $stmt_email->execute();
    $count_email = $stmt_email->rowCount();

    if($count_email > 0 ){
        echo "<script>alert('Email Duplicate ')</script>";
        echo "<script>window.location='../students/index.php?menu=home'</script>";     
        exit();
    }


    if ($button == 'insert') {
        $sql_edit = " UPDATE student ";
        $sql_edit .= " SET Stu_name='$name', ";
        $sql_edit .= " Stu_BA='$BA', ";
        $sql_edit .= " Sector='$sector', ";
        $sql_edit .= " Phone='$Phone', ";
        $sql_edit .= " email ='$email' ";
        $sql_edit .= " WHERE id ='$id' ";
    
        $stmt = $conn->prepare($sql_edit);
        $result = $stmt->execute();

        if($result){ 
                echo "<script>alert('Success')</script>";
                echo "<script>window.location='../students/index.php?menu=home'</script>";     
        }else
            {  
            echo "<script>alert('Error')</script>";
            echo "<script>window.location='../students/index.php?menu=home'</script>";     
            }  
    }
}



?>