<div class="main-content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">เกรด</div>
                <form action="#" method="GET" class="form-horizontal group-border-dashed">
                    <div class="panel-body">
                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                            <thead>
                                <tr>
                                    <th class="text-center">ลับดับที่</th>
                                    <th>ชื่อโครงงาน</th>
                                    <th>ภาค</th>
                                    <th>ปีการศึกษา</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                session_start();
                                $id=$_SESSION['sess_id'];
                                $BA =$_SESSION['sess_BA'];
                                include('../connect/config.php');
                                            
                                $sql = "SELECT * FROM project INNER JOIN sector ON Sector_id=Pro_Sector WHERE Pro_BA = '$BA' AND Step = 5 OR Step = 6 order by Step  ASC ,Pro_id DESC";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                $i = 1;
                                 
                                foreach($result as $val){
                                    if($val['Step'] == 5){
                                        $status = 'รอออกเกรด';
                                    }else if($val['Step'] == 6){
                                        $status = 'ออกเกรดแล้ว';
                                    }
                                ?>
                                <tr class="odd gradeX">
                                    <td class="text-center"><?=$i?></td>
                                    <td><?=$val['Pro_name']?></td>
                                    <td><?=$val['Sector_name']?></td>
                                    <td><?=$val['Year']+543?></td>
                                    <td><?php echo $status;?></td>
                                    <td><a href="Edit_grade.php?id=<?=$val['Pro_id']?>" class="btn btn-space btn-primary btn-lg ">แก้ไขเกรด</a>
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
<?php include('../Modal/M_Add_teacher.php');?>