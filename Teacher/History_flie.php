<?php
require_once('../Process/P_C_session.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once('head.php');?>

<body>
    <div class="be-wrapper bbe-fixed-sidebar be-color-header-danger">
        <?php require_once('navbar.php');?>
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="panel-heading panel-heading-divider">รายละเอียดไฟล์</div>
                        <div class="panel-body">
                            <div class="panel panel-default panel-table">
                                <div class="panel-heading">ส่ง 3 บท
                                </div>
                                <form action="1.php" method="GET" class="form-horizontal group-border-dashed">
                                    <div class="panel-body">
                                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                                            <thead>
                                                <tr>
                                                    <th>ลับดับที่</th>
                                                    <th>ชื่อโครงงาน</th>
                                                    <th>บทที่</th>
                                                    <th>ปีการศึกษา</th>
                                                    <th>เครื่องมือ</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                session_start();
                                $id=$_SESSION['sess_id'];
                                // echo $BA;
                                include('../connect/config.php');
                                            
                                $sql = "SELECT * FROM project as p INNER JOIN file1 as f ON p.Pro_id = f.Pro_id WHERE  F_Status= 1  AND Teacher_1 = '$id' OR Teacher_2 = '$id' ";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                $i = 1;
                                foreach($result as $val){

                                //  print_r($result);foreach($result as $val){
                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?=$i?></td>
                                                    <td><?=$val['Pro_name'];?></td>
                                                    <td><?=$val['Type'];?></td>
                                                    <td><?=$val['Year']+543;?></td>
                                                    <td><a class="btn btn-space btn-success btn-l "
                                                            href="./check_file.php?id=<?=$val['F_id'];?>&T=<?=$val['Type'];?>">ดูเพิ่มเติม</a>

                                                    </td>
                                                </tr>
                                                <?php $i++; } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>
<?php require_once('footter.php');?>

</html>