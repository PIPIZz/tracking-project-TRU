<?php
session_start();

        if(isset($_REQUEST['login'])){
            $user = $_REQUEST['username'];
            $pass = $_REQUEST['password'];
            $pass1 = md5($pass);
            // print $user." ".$pass;
            // exit();
            if(empty($user) && empty($pass)){
                echo "<script>alert('Invalid username and password!');</script>";
                echo "<script>window.location='../index.php?menu=home';</script>";
                exit();
            }

            include('../connect/config.php');
           
            $sql_login = "SELECT * FROM student  WHERE id='$user' AND Password='$pass1'  ";
            $stmt = $conn->prepare($sql_login);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            

            $sql_login2 = "SELECT * FROM teacher  WHERE T_id='$user' AND T_Password='$pass1' ";
            $stmt2 = $conn->prepare($sql_login2);
            $stmt2->execute();
            $count2 = $stmt2->rowCount();
            $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

           
            if($count == 1 && !empty($row)){
                $_SESSION['sess_id']        = $row['id'];
                $_SESSION['sess_pass']      = $row['Password'];
                $_SESSION['sess_name']      = $row['Stu_name'];
                $_SESSION['sess_BA']        = $row['Stu_BA'];
                $_SESSION['sess_sector']    = $row['Sector'];
                $_SESSION['sess_status']    = $row['Status'];
                $_SESSION['sess_phone']     = $row['Phone'];

                // echo "<script>alert('Login student = ".$_SESSION['sess_name']."');</script>";
                echo "<script>window.location='../students/index.php?menu=home';</script>";
            }else if($count2 == 1 && !empty($row2)){
               
                $_SESSION['sess_id'] = $row2['T_id'];
                $_SESSION['sess_pass'] = $row2['T_Password'];
                $_SESSION['sess_status'] = $row2['T_Status'];
                $_SESSION['sess_name'] = $row2['T_name'];
                $_SESSION['sess_BA'] = $row2['T_BA']; 
                
                // echo "<script>alert('teacher');</script>";

                if($_SESSION['sess_status']== 'Teacher'){
                    // อาจารย์ที่ปรึกษา
                    echo "<script>window.location='../Teacher/index.php?menu=home';</script>";
                }else if($_SESSION['sess_status']== 'Secretary'){
                    // เลขาคณะ
                    echo "<script>window.location='../Faculty/index.php?menu=home';</script>";
                }else if($_SESSION['sess_status']== 'Admin'){
                    // แอดมิร กรอกเกรด
                    echo "<script>window.location='../Admin/index.php?menu=home';</script>";
                }
                else{
                    // echo "<script>alert('Login ".$_SESSION['sess_status']." = ".$_SESSION['sess_name']."');</script>";
                    echo "<script>window.location='../index.php?menu=role';</script>";
                }
            }

            echo "<script>alert(' username or password Not match');</script>";
            echo "<script>window.location='../index.php?menu=home';</script>";
            exit();
            
        }else{
            echo "<script>alert('Incorrect Plasess Login Again');</script>";
            echo "<script>window.location='../index.php?menu=home';</script>";
            exit();
        }
?>