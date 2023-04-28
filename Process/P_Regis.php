<?php

$button = isset($_REQUEST['button_click']);

if ($button){
   
    $id = $_REQUEST['id'];
    $password = $_REQUEST['password'];
    $password1 = md5($password);

    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $sector = $_REQUEST['sector'];
    $BA = $_REQUEST['BA'];
    $phone = $_REQUEST['phone'];

    $button = $_REQUEST['button_click'];
    include('../connect/config.php');

        $sql_c ="SELECT * From student where id = '$id'";
        $stmt_c = $conn->prepare($sql_c);
        $stmt_c->execute();
        $count = $stmt_c->rowCount();
 
        if($count > 0 ){
            echo "<script>alert('Username Duplicate')</script>";
            echo "<script>window.location='../index.php?menu=register'</script>";
            exit();
        }

        $sql_email ="SELECT * From student where email = '$email'";
        $stmt_email = $conn->prepare($sql_email);
        $stmt_email->execute();
        $count_email = $stmt_email->rowCount();

        if($count_email > 0 ){
     
            echo "<script>alert('Email Duplicate')</script>";
            echo "<script>window.location='../index.php?menu=register'</script>";     
            exit();
        }


    if ($button == 'insert') {

        $sql = "INSERT INTO student ( id, Stu_name, Stu_BA, Phone, Password, Sector, Status, email ) 
        VALUES('$id','$name',$BA,'$phone','$password1',$sector,'1','$email')";  
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();
      
        if($result){         
                // echo "<script>alert('บันทึกสำเร็จ')</script>";
                echo "<script>window.location='../index.php?menu=home&alert=true'</script>";           
        }    
    } else {
        echo "<script>alert('Error')</script>";
    }
}



?>