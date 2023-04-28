<?php 
        session_start();
        $button = isset($_REQUEST['button_edit']);
        if($button){
            $new1_password = $_REQUEST['edit_Password1'];
            $new2_password = $_REQUEST['edit_Password2'];

            $id = $_SESSION["T_edit_id"];
            
            if($new1_password != $new2_password){
                echo "<script>alert('Password Not Match')</script>";
                echo "<script>window.location='../Faculty/index.php?menu=teacher'</script>";
                exit();
            }
            
           
            include('../connect/config.php');

            $sql = "SELECT * FROM teacher  WHERE T_id = '$id' ";
            $stmt = $conn->prepare($sql);
            $stmt ->execute();
            $res = $stmt->fetch();

            $name =$res['T_name'];
            
            
            $pass = md5($new1_password);
            if ($button == 'edit') {
                $sql_edit = " UPDATE teacher ";
                $sql_edit .= " SET T_name='$name', ";
                $sql_edit .= " T_Password ='$pass' ";
                $sql_edit .= " WHERE T_id ='$id' ";
            
                $stmt = $conn->prepare($sql_edit);
                $result = $stmt->execute();
        
                if($result){ 
                        $_SESSION["T_edit_id"] ="";
                        echo "<script>alert('success')</script>";
                        echo "<script>window.location='../Faculty/index.php?menu=teacher'</script>";     
                }else
                    {  
                    echo "<script>alert('Error')</script>";
                    echo "<script>window.location='../Faculty/index.php?menu=teacher'</script>";    
                    }  
            }
        }
?>