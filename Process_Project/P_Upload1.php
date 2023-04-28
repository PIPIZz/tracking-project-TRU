<?php
session_start();

        $button = isset($_REQUEST['submit']);

        $Status_file =$_POST['status'];
        $Pro_id =$_POST['Pro_id'];
        $type1 = $_POST['type'];      
        include('../connect/config.php');

        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
    if($button == '1'){

        $fileupload1 = (isset($_POST['fileupload1']) ? $_POST['fileupload1'] : '');
        $upload1=$_FILES['fileupload1']['name'];

        if($upload1 !='') { 
            $path="../fileupload/";
            $type = strrchr($_FILES['fileupload1']['name'],".");
            $newname1 =$numrand.$date1.$type;
            $path_copy=$path.$newname1;
            $path_link="../fileupload/".$newname1;
            move_uploaded_file($_FILES['fileupload1']['tmp_name'],$path_copy);  
        }
        $sql1 = "INSERT INTO file1 (F_id,Pro_id,File,Type,F_Status) 
        VALUES('','$Pro_id','$newname1','$type1','$Status_file')";  
        $stmt1 = $conn->prepare($sql1);
        $result1 = $stmt1->execute();
            if($result1){
                    echo "<script>alert('success')</script>";            
                    echo "<script>window.location='../students/index.php?menu=Project'</script>";
                }else{
                    echo "<script>alert('Error2')</script>";    
                    echo "<script>window.location='../students/index.php?menu=Project'</script>";
                }

    }else{
        echo "<script>alert('Error1')</script>";
        echo "<script>window.location='../students/index.php?menu=Project'</script>";
    } 

?>