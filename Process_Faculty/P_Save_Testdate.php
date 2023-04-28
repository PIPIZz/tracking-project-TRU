<?php
ob_start();
session_start();
$button = isset($_POST['button_click']);
include('../connect/config.php');
if($button){

  $date = $_POST['date'];
  $time = $_POST['time']; 
  $place = $_POST['place'];
  $direc = array_filter($_POST['direc']);

  // print_r($direc);exit();

  if ($button == 'insert' && $_SESSION["ProID"] != "") {

    foreach($direc as $val){

      $stmt = $conn->prepare("SELECT * FROM director WHERE Direc_name='$val'");
      $stmt->execute([$val]); 
      $director = $stmt->fetch();

      if ($director) {
        $director_id[] = $director['Direc_id'];
      } else {
        $sql = "INSERT INTO director (Direc_name) VALUES ('$val')";
        $conn->query($sql);
        $director_id[] = $conn->lastInsertId();
      }
    }

    for ($i=1;$i<=(int)$_SESSION["intLine"];$i++) {
      // $arr = array(':Pro_id' => $_SESSION["ProID"][$i], ':Direc_id' => $director_id, ':tDate' => $date, ':tTime' => $time, ':Place' => $place);
      
      // $sql = "INSERT INTO date_test(Pro_id,Direc_id,tDate,tTime,Place) ";
      // $sql += " VALUES( :Pro_id, :Direc_id, :tDate, :tTime, :Place) ";
      // $stmt = $conn->prepare($sql);
      // $result = $stmt->execute($arr);
      // array(, , ':tDate' => $date, ':tTime' => $time, ':Place' => $place )
      
      $stepPro = "UPDATE project SET Step = 5 WHERE Pro_id = ".$_SESSION["ProID"][$i]." "; 
      $results = $conn->query($stepPro);

      $count_dir =COUNT($director_id);
      for($item=0;$item<$count_dir;$item++){  
      $sql = "INSERT INTO date_test (Pro_id,Direc_id,tDate,tTime,Place) 
              VALUES(".$_SESSION["ProID"][$i].", '$director_id[$item]', '$date', '$time', '$place')";
     
      $result = $conn->query($sql);
      } 

    
          
    }if($result){
             if($results){
              $_SESSION["ProID"] ==  null;
              $_SESSION["intLine"] == null;
              echo "<script>alert('succes')</script>";
              echo "<script>window.location='../Faculty/index.php?menu=Date_test'</script>";
              }else{
                  echo "<script>alert('stepPro')</script>";
                  echo "<script>window.location='../Faculty/index.php?menu=Date_test'</script>";
              }
            }else{
              echo "<script>alert('Error2')</script>";
              echo "<script>window.location='../Faculty/index.php?menu=Date_test'</script>";
          }

    } else {
      echo "<script>alert('Plasess add group')</script>";
      echo "<script>window.location='../Faculty/index.php?menu=Date_test'</script>";
    }

}else {
  echo "<script>alert('Error')</script>";
}




?>