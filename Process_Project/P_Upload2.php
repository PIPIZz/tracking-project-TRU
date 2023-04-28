<?php
session_start();

        $button = isset($_REQUEST['submit']);

        $Status_file =$_POST['status'];
        $Pro_id =$_POST['Pro_id'];
        $type1 = $_POST['type'];
      
        include('../connect/config.php');
        $date1 = date("Ymd_His");
        $numrand2 = (mt_rand());

    if($button == '1'){
     
        $fileupload2 = (isset($_POST['fileupload2']) ? $_POST['fileupload2'] : '');
        $upload2=$_FILES['fileupload2']['name'];

        if($upload2 !='') { 
            $path2="../fileupload/";
            $type2= strrchr($_FILES['fileupload2']['name'],".");
            $newname2 =$numrand2.$date1.$type2;
            $path_copy2=$path2.$newname2;
            $path_link2="../fileupload/".$newname2;
            move_uploaded_file($_FILES['fileupload2']['tmp_name'],$path_copy2);  
        }

      

        $sql1 = "INSERT INTO file1 (F_id,Pro_id,File,Type,F_Status) 
        VALUES('','$Pro_id','$newname2','$type1','$Status_file')";  
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