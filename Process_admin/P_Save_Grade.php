<?php

session_start();
$button = isset($_REQUEST['button_editGrade']);
if($button){

      include('../connect/config.php');
      $edit_Grade = $_REQUEST['edit_Grade'];

      $Pro_id = $_REQUEST['Pro_id'];
      $Stu_id = $_REQUEST['Stu_id'];
      $id = $_REQUEST['i'];

      $sql = "SELECT * FROM project WHERE Pro_id = '$Pro_id' ";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetch();
         
      $name = $res['Pro_name'];
      $BA = $res['BA'];
      $Term = $res['Term'];     
      $edit_garde = $_POST['edit_Grade']; 

      if ($button == 'insert') {
              
        /* พอเป็นเกรดเดียวกัน ไม่อัพเดทเกรดทั้งหมด อัพเดทอันแรกอันเดียว */

            $sql1 = " UPDATE project ";
            $sql1 .= " SET Pro_name='$name', ";
            $sql1 .= " Step=6 ";
            $sql1 .= " WHERE Pro_id ='$Pro_id'";
            $stmt1 = $conn->prepare($sql1);
            $result1 = $stmt1->execute();
          
            if($result1){ 
                if (!empty($edit_garde)) {
                  foreach($edit_garde as $inx => $val) {
                    $sql_edit = " UPDATE project_detail ";
                    $sql_edit .= " SET Grade='".$val."', ";
                    $sql_edit .= " Pro_id='$Pro_id' ";
                    $sql_edit .= " WHERE Stu_id ='".$inx."' ";
                    $stmt = $conn->prepare($sql_edit);
                    $result = $stmt->execute();
                  }
              }
                if($result){
                  echo "<script>alert('Success')</script>";
                  $_SESSION["StuID"] ="";
                  $_SESSION["edit_Grade"] ="";
                  $_SESSION["i"] ="";
                  echo "<script>window.location='../Admin/index.php?menu=grade'</script>";
                  }else{
                    echo "<script>alert('Error2.$result')</script>";
                } 
          }else{
            print_r ($result1);
            echo "<script>alert('Error1.$result1')</script>";
          } 
        }else {
          echo "<script>alert('if ($button == 'insert') Error')</script>";
      }
}else {
    echo "<script>alert('Error')</script>";
}




?>