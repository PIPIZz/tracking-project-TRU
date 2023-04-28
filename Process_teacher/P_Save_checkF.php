<?php
    session_start();

        $button = isset($_POST['edit']);
        include('../connect/config.php');
        $choice = $_POST['choice'];
        $Pro_id =$_POST['Pro_id'];  
        $File = $_POST['file'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $step = $_POST['step'];      
        $F_id = $_POST['F_id'];
        $reason =$_POST['reason'];
        $date1 = date("Ymd_His");
        $numrand = (mt_rand());

    if ($button == 'insert') {
            if($choice == '2'){
        
                $step1 =$step+1;
                $sql = " UPDATE file1 ";
                $sql .= " SET Type='$type', ";
                $sql .= " F_Status='$choice' ";
                $sql .= " WHERE F_id ='$F_id' ";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute();
                
                //////////////////////////////////////
                

                $sql1 = " UPDATE project ";
                $sql1 .= " SET Step='$step1' ";
                $sql1 .= " WHERE Pro_id ='$Pro_id'";
                $stmt1 = $conn->prepare($sql1);
                $result1 = $stmt1->execute();

            if($result){
                    if($result1){
                        echo "<script>alert('success')</script>";            
                        echo "<script>window.location='../Teacher/index.php?menu=enroll'</script>";
                    }else{
                        echo "<script>alert('Error2')</script>";    
                    }
                }else{
                    echo "<script>alert('Error3')</script>";   
                }

        }else if($choice == '3'){

            $fileupload = (isset($_POST['fileupload']) ? $_POST['fileupload'] : '');
            $upload1=$_FILES['fileupload']['name'];
    
            if($upload1 !='') { 
                $path="../fileupload/";
                $type = strrchr($_FILES['fileupload']['name'],".");
                $newname1 =$numrand.$date1.$type;
                $path_copy=$path.$newname1;
                $path_link="../fileupload/".$newname1;
                move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  
            }else if($upload1 ==''){
                $newname1 =$File;
            }
        $sql = " UPDATE file1 ";
        $sql .= " SET Type='$type', ";
        $sql .= " F_Status='$choice', ";
        $sql .= " File='$newname1' ";
        $sql .= " WHERE F_id ='$F_id' ";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();
            //////////////////////////////////
        $sql1 = "INSERT INTO file_detail(Fd_id,F_id, Type, Text_c) VALUES ('','$F_id','$type','$reason')";  
        $stmt1 = $conn->prepare($sql1);
        $result1 = $stmt1->execute();
        

                if($result){
                    if($result1){
                    echo "<script>alert('success')</script>";            
                    echo "<script>window.location='../Teacher/index.php?menu=enroll'</script>";
                    }else{
                        echo "<script>alert('Error2')</script>";    
                        echo "<script>window.location='../Teacher/index.php?menu=enroll'</script>";
                    }
                }else{
                    echo "<script>alert('Error')</script>";   
                    echo "<script>window.location='../Teacher/index.php?menu=enroll'</script>"; 
                }
        
    }else{
        echo "<script>alert('Error1')</script>";
        echo "<script>window.location='../Teacher/index.php?menu=enroll'</script>";
    } 
    }
?>