<?php
   // Database Connection
   include '../../connect/config.php';

   require_once 'config.php';

   if (isset($_POST['query'])) {
       $inputText = $_POST['query'];
       $sql = "SELECT * FROM student WHERE Stu_BA = '$BA' AND Status = 1 OR id LIKE :id ";
       $stmt = $conn->prepare($sql);
       $stmt->execute(['id' => '%' . $inputText . '%' ]);
       $result = $stmt->fetchAll();

       $i = 1;
       if ($result) {
           foreach($result as $item) {
               echo '<td scope="row" class="text-center">'.$i.'</td>';
               echo '<td>' .$item['id'].'</td>';
               echo '<td name="Stu_name">' .$item["Stu_name"].'</td>';
               echo '<td name="Sector">'.$item["Sector_name"].'</td>';
               echo '<td name="Phone">'  .$item["Phone"].'</td>';
               echo '<td><a href="../Process_Project/P_Addcart.php?id='.$item["id"].'" class="btn btn-primary">เพิ่มรายชื่อ</a></td>';
         $i++;  }
       } else {
         foreach($result as $item) {
           echo '<td scope="row" class="text-center">'.$i.'</td>';
           echo '<td>' .$item['id'].'</td>';
           echo '<td name="Stu_name">' .$item["Stu_name"].'</td>';
           echo '<td name="Sector">'.$item["Sector_name"].'</td>';
           echo '<td name="Phone">'  .$item["Phone"].'</td>';
           echo '<td><a href="../Process_Project/P_Addcart.php?id='.$item["id"].'" class="btn btn-primary">เพิ่มรายชื่อ</a></td>';
            $i++;  }
       }
   }
?>