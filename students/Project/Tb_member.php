<?php 
include('../Process/C_session.php');

    $_SESSION["pro_name"] = $_GET['pro_name'];
    $_SESSION["BA1"] = $_GET['BA'];
    $_SESSION["Term1"] = $_GET['Term'];
    $_SESSION["Year1"] = $_GET['Year'];
    $_SESSION["T_name1"] = $_GET['T_name1'];
    $_SESSION["T_name2"] = $_GET['T_name2'];

    $BA = $_SESSION['sess_BA']; 
    $sector = $_SESSION['sess_sector'];
    include('../connect/config.php'); 
    $i =1;
    $search_keyword = '';
    
    // echo $_POST['search']['keyword'];

        if(!empty($_POST['search']['keyword'])) {
            $search_keyword = $_POST['search']['keyword'];
                
        $query = "SELECT * FROM student INNER JOIN sector ON Sector_id = Sector WHERE  Stu_BA='$BA' AND Status = 1 AND id LIKE :keyword ";
   
        $pdo_statement = $conn->prepare($query);
        $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();
        
        if(empty( $result)){

            $query = "SELECT * FROM student INNER JOIN sector ON Sector_id = Sector WHERE  Stu_BA='$BA' AND Status = 1 AND Stu_name LIKE :keyword ";
   
            $pdo_statement = $conn->prepare($query);
            $pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
            $pdo_statement->execute();
            $result = $pdo_statement->fetchAll();
        }
        // print_r ( $result); 
        }else{
            $sql = "SELECT * FROM student INNER JOIN sector ON Sector_id = Sector WHERE Stu_BA = '$BA' AND Status = 1 AND Sector = '$sector'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }
          
?>
<div class="container "><br><br><br>
    <h1>รายชื่อนักศึกษา</h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <form class="d-flex" action="" method="POST">
            <input class="form-control me-2" type="search" placeholder="ค้นหารหัสนักศึกษา" name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword'>   
        </form>
    </div>
    <br>

    <table class="table table-primary table-striped table-hover ">
        <thead>
            <tr>
                <th scope="col" class="text-center">ลำดับ</th>
                <th scope="col">รหัสนักศึกษา</th>
                <th scope="col">ชื่อ-นามสกุล</th>
                <th scope="col">ภาค</th>
                <th scope="col">เบอร์โทร</th>
                <th scope="col">..</th>
            </tr>
        </thead>
        <tbody>
            <?php        
                foreach($result as $item){                                                            
            ?>
            <tr>
                <td scope="row " class="text-center"><?=$i?></td>
                <td><?php echo $item['id'];?></td>
                <td name="Stu_name"><?php echo $item["Stu_name"];?></td>
                <td name="Sector"><?php echo $item["Sector_name"];?></td>
                <td name="Phone"><?php echo $item["Phone"];?></td>
                <td><a href="../Process_Project/P_Addcart.php?id=<?=$item["id"];?>"
                        class="btn btn-primary">เพิ่มรายชื่อ</a>
                </td>
            </tr>
            <?php $i++; }?>
        </tbody>
    </table>
</div>
