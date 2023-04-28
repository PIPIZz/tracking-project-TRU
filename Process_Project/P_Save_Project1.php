<?php

session_start();
$button = isset($_REQUEST['button_click']);

if($button){

include('../connect/config.php');

        $name = $_REQUEST['name'];
        $Term = $_REQUEST['Term']; 
        $BA = $_REQUEST['BA'];
        $Year = $_REQUEST['Year'];
        $Year2 = $Year-543 ;
        $T_name1 = $_REQUEST['T_name1'];
        $T_name2 = $_REQUEST['T_name2'];
        $step = 1;
        $grade = '';
        $sector =  $_SESSION['sess_sector'];
        // exit();

        if(empty($name)){
          echo "<script>alert('Input Project's name ')</script>";
          echo "<script>window.location='../students/index.php?menu=Project'</script>";
          exit();
        }

        if(empty($Year)){
          echo "<script>alert('Input Year')</script>";
          echo "<script>window.location='../students/index.php?menu=Project'</script>";
          exit();
        }

        function myfunction($v)
          {
          if ($v === $_SESSION["sess_id"])
            {
            return true ;
            }
          return null;
          }

        $checkStu = array_map("myfunction", $_SESSION["StuID"]);

        if($checkStu[0] == null){
            echo "<script>alert('กรุณาเพิ่มตนเอง')</script>";
            echo "<script>window.location='../students/index.php?menu=Project'</script>";
            exit();
        }
   
        if($_SESSION["StuID"][0] == null){
          echo "<script>alert('Add Memmer')</script>";
          echo "<script>window.location='../students/index.php?menu=Project'</script>";
          exit();
        }
     
  if ($button == 'insert') {

    $sql = "INSERT INTO project (Pro_id,Pro_name,Pro_BA,Pro_sector,Year,Term,Teacher_1,Teacher_2,Step) 
    VALUES('','$name','$BA','$sector','$Year2','$Term','$T_name1','$T_name2','$step')";  
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();

    $sql1 = "SELECT * FROM project  Where Pro_name = '$name'";
    $stmt1 = $conn->prepare($sql1);
    $stmt1 ->execute();
    $res1 = $stmt1->fetch();

    $id = $res1['Pro_id'];
    // print $id; 
    //print$name; print$BA; print $Year;print $Term; print $T_name1;print $step;
    // exit();
    for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
     {
	  if($_SESSION["StuID"][$i] != "")
      {
        $sql2 = "INSERT INTO project_detail (Pro_id,Stu_id,Grade) 
        VALUES('$id', '".$_SESSION["StuID"][$i]."', '$grade')";  
        $stmt2 = $conn->prepare($sql2);
        $result2 = $stmt2->execute();
        
        $sql3 ="UPDATE student SET Status=2 WHERE id='".$_SESSION["StuID"][$i]."' ";
        $stmt3 = $conn->prepare($sql3);
        $result3 = $stmt3->execute();
      }
    }
  
  if($result){
    if($result2){
      if($result3){
      $_SESSION["pro_name"] = "";
      $_SESSION["BA1"] = "";
      $_SESSION["Term1"] = "";
      $_SESSION["Year1"] = "";
      $_SESSION["T_name1"] = "";
      $_SESSION["T_name2"] = "";
      $_SESSION["StuID"] ="";
      $_SESSION['sess_status'] = 2 ;

        echo "<script>alert('Add Project Success')</script>";
        echo "<script>window.location='..students/index.php?menu=Project'</script>";
      }else{
          echo "<script>alert('Error3')</script>";
        }
    }else{
      echo "<script>alert('Error2')</script>";
    }
}
  }else {
    echo "<script>alert('Error')</script>";
}

}
?>