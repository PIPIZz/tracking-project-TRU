<?php

$button = isset($_REQUEST['button_click']);

if ($button){
    ##################################################################################################################################
    ##################################################################################################################################
    $id = $_REQUEST['T_id'];
    $name = $_REQUEST['T_name'];
    $password = $_REQUEST['password'];
    $password1 =md5($password);
    $BA = $_REQUEST['T_BA'];
    $status = $_REQUEST['status'];
    $button = $_REQUEST['button_click'];

    ##################################################################################################################################
    ##################################################################################################################################

    include('../connect/config.php');

    $sql_id ="SELECT * From teacher where T_id = '$id'";
    $stmt_id = $conn->prepare($sql_id);
    $stmt_id->execute();
    $count_id = $stmt_id->rowCount();

    if($count_id > 0 ){
        echo "<script>alert('Username Duplicate ')</script>";
        echo "<script>window.location='../Faculty/Add_T.php'</script>";     
        exit();
    }


    if ($button == 'insert') {
        
        $sql = "INSERT INTO teacher (T_id, T_name, T_BA, T_Status, T_Password) 
        VALUES('$id','$name','$BA','$status','$password1')";  
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        echo $result;
        if($result){     
                echo "<script>alert('Success')</script>";
                echo "<script>window.location='../Faculty/index.php?menu=teacher'</script>";
            }
      
    } else {
        echo "<script>alert('Error')</script>";
        echo "<script>window.location='../Faculty/index.php?menu=teacher'</script>";
    }
}



?>