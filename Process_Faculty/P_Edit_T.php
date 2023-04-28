<?php

$button = isset($_REQUEST['button_edit']);

if ($button){ 
    $id = $_REQUEST['edit_id'];
    $name = $_REQUEST['edit_T_name'];
    $BA = $_REQUEST['edit_T_BA'];
    $status = $_REQUEST['edit_status'];
 
    // echo $id;
    // echo $name;
    // echo $BA;
    // echo $status;
    // exit();
    ##################################################################################################################################
    ##################################################################################################################################
    include('../connect/config.php');

    if ($button == 'insert') {
        $sql_edit = "UPDATE teacher ";
        $sql_edit .= " SET T_name='$name', ";
        $sql_edit .= " T_BA='$BA', ";
        $sql_edit .= " T_Status ='$status' ";
        $sql_edit .= " WHERE T_id ='$id' ";   
        $stmt = $conn->prepare($sql_edit);
        $result = $stmt->execute();

        if($result){      
            echo "<script>alert('success')</script>";
            echo "<script>window.location='../Faculty/index.php?menu=teacher'</script>";              
        }else{  
            echo "<script>alert('Error')</script>";
        }  
    }
}



?>