<?php 
   $id = $_REQUEST['T_id'];
   if(!empty($id)){
    include('../connect/config.php');

        $sql ="DELETE  FROM teacher WHERE T_id ='$id'";

        $stmt = $conn->prepare($sql);
        $stmt ->execute();
        $results = $stmt->fetch();

            if($results == null){
                echo "<script>alert('Success')</script>";
                echo "<script>window.location='../Faculty/index.php?menu=teacher'</script>";
            }else{
                echo "<script>alert('Error.$results')</script>";
                echo "<script>window.location='../Faculty/index.php?menu=teacher'</script>";
            }
    }else{
        echo "<script>alert('Error')</script>";
        echo "<script>window.location='../Faculty/index.php?menu=teacher'</script>";
    }
?>