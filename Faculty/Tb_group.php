<?php 

include('../Process/c_session.php');
session_start();
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
                    <div class="col-sm-12">
                        <div class="panel panel-default panel-table">
                            <div class="panel-heading">รายชื่อโครงงาน
                            </div>
                            <div class="panel-body">


                                <table id="table1" class="table table-striped table-hover table-fw-widget">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">ลำดับ</th>
                                            <th >ชื่อโครงงาน</th>
                                            <th >ภาค</th> 
                                            <th >สาขา</th>                        
                                            <th style="text-align: center"> เพิ่มรายชื่อ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                            $BA = $_SESSION['sess_BA'];
                                            // echo ($BA);
                                            include('../connect/config.php');                                           
                                            $sql = "SELECT * FROM project as p INNER JOIN sector as s ON s.Sector_id=p.Pro_Sector INNER JOIN ba as b ON b.BA_id=p.Pro_BA where Step = 4";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            $i = 1;
                                                    foreach($result as $val){
                                            ?>
                                        <tr class="odd gradeX">
                                            <!-- <td style="text-align: center"><?=$i?></td> -->
                                            <td style="text-align: center" ><?=$i?></td>
                                            <td ><?=$val['Pro_name']?></td>
                                            <td ><?=$val['Sector_name']?></td>
                                            <td ><?=$val['BA_name']?></td>
                                            <td style="text-align: center">
                                                <a class="btn btn-rounded btn-space btn-success"
                                                    href="../Process_Faculty/P_Addcart_Pro.php?id=<?=$val["Pro_id"];?>">เพิ่มรายชื่อ</a>
                                            </td>
                                        </tr>
                                        <?php
                                         $i++; } 
                                         ?>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php require_once('footter.php');?>
</body>

</html>