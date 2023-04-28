<?php 
session_start();

    $new_password = $_GET['password1'];

    $email = $_GET['email'];
    $token = $_GET['token'];

    include('../connect/config.php');

    $pass = md5($new_password);

    $sql_edit = " UPDATE student ";
    $sql_edit .= " SET reset_link_token	= $token, ";
    $sql_edit .= " Password = '$pass' ";
    $sql_edit .= " WHERE email = $email ";

    $stmt = $conn->prepare($sql_edit);
    $result = $stmt->execute();

    if($result){ 
            echo "<script>alert('Change Password Success')</script>";
            echo "<script>window.location='../index.php?menu=home'</script>";     
    }else
        {  
        echo "<script>alert('Error')</script>";
        echo "<script>window.location='../index.php?menu=home'</script>";    
        }  


?>