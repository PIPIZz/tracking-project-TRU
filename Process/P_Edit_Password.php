<?php 
        session_start();
        $button = isset($_REQUEST['button_edit']);
        if($button){
            $old_password = $_REQUEST['Password'];
            $new1_password = $_REQUEST['edit_Password1'];
            $new2_password = $_REQUEST['edit_Password2'];

            $id = $_SESSION['sess_id'];
            
            include('../connect/config.php');

            $sql = "SELECT * FROM student  WHERE id = '$id' ";
            $stmt = $conn->prepare($sql);
            $stmt ->execute();
            $res = $stmt->fetch();

            $name =$res['Stu_name'];
            

            if(md5($old_password) !== $res['T_Password']){
                echo "<script>alert('Old Password Not Match')</script>";
                echo "<script>window.location='../students/index.php?menu=home'</script>";
                exit();
            }

            if($new1_password != $new2_password){
                echo "<script>alert('New Password Not Match')</script>";
                echo "<script>window.location='../students/index.php?menu=home'</script>";
                exit();
            }
            
            $pass = md5($new1_password);
            if ($button == 'edit') {
                $sql_edit = " UPDATE student ";
                $sql_edit .= " SET Stu_name='$name', ";
                $sql_edit .= " Password ='$pass' ";
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