<?php
session_start();

        $button = isset($_REQUEST['submit']);

        $Status_file =$_POST['status'];
        $Pro_id =$_POST['Pro_id'];
        $type1 = $_POST['type'];

        include('../connect/config.php');
        
         $date1 = date("Ymd_His");
        $numrand3 = (mt_rand());
       
    if($button == '1'){
  
        $fileupload3 = (isset($_POST['fileupload3']) ? $_POST['fileupload3'] : '');
        $upload3=$_FILES['fileupload3']['name'];

        if($upload3 !='') { 
            $path3="../fileupload/";
            $type3 = strrchr($_FILES['fileupload3']['name'],".");
            $newname3 =$numrand3.$date1.$type3;
            $path_copy3=$path3.$newname3;
            $path_link3="../fileupload/".$newname3;
            move_uploaded_file($_FILES['fileupload3']['tmp_name'],$path_copy3);  
        }

      
        $sql1 = "INSERT INTO file1 (F_id,Pro_id,File,Type,F_Status) 
        VALUES('','$Pro_id','$newname3','$type1','$Status_file')";  
        $stmt1 = $conn->prepare($sql1);
        $result1 = $stmt1->execute();
            if($result1){
                    echo "<script>alert('success')</script>";            
                    echo "<script>window.location='../students/index.php?menu=Project'</script>";
                }else{
                    echo "<script>alert('Error2')</script>";    
                }
            

    }else{
        echo "<script>alert('Error1')</script>";
        echo "<script>window.location='../students/index.php?menu=Project'</script>";
    } 

?>