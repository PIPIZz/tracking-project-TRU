<div class="main-content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">นักศึกษาที่ลงทะเบียนแล้ว
                </div>
                <div class="panel-body">
                    <table id="table1" class="table table-striped table-hover table-fw-widget">
                        <thead>
                            <tr>
                                <th>
                                    <h4> ลับดับที่</h4>
                                </th>
                                <th>
                                    <h4> ชื่อโครงงาน</h4>
                                </th>
                                <th>
                                    <h4> ภาค</h4>
                                </th>
                                <th>
                                    <h4> ภาคการศึกษา</h4>
                                </th>
                                <th>
                                    <h4> ปีการศึกษา</h4>
                                </th>
                                <th>
                                    <h4> สถานะ</h4>
                                </th>
                                <th>
                                    <h4></h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $id=$_SESSION['sess_id'];
                                include('../connect/config.php');         
                                $sql = "SELECT * FROM project as p  INNER JOIN step ON step_id = p.Step  INNER JOIN sector as s ON s.Sector_id=p.Pro_sector WHERE Teacher_1 ='$id' OR Teacher_2 ='$id'    ORDER BY Year DESC, Step  ASC";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result1 = $stmt->fetchAll();
                                $i = 1;
                                $pro_id = $val['Pro_id'];
                                foreach($result1 as $val){
                                    
                                ?>
                            <tr class="odd gradeX">
                                <td><?=$i?></td>
                                <td><?=$val['Pro_name']?></td>
                                <td><?=$val['Sector_name']?></td>
                                <td><?=$val['Term']?></td>
                                <td><?=$val['Year']+543?></td>
                                <td><?=$val['step_name']?><br>

                                <td><a href="Detail_enroll.php?id=<?=$val['Pro_id'];?>"
                                        class="btn btn-space btn-success btn-l "> รายละเอียดโครงงาน</a> 
                                <?php 
                                if($val['Pro_id']){
                                    $F_Pro_id = $val['Pro_id'];
                                    $sql_status = "SELECT * FROM file1 as f INNER JOIN project as p on f.Pro_id = p.Pro_id WHERE f.Pro_id='$F_Pro_id' ";
                                    $stmt_status = $conn->prepare($sql_status);
                                    $stmt_status->execute();
                                    $result_status = $stmt_status->fetchAll();

                                    foreach($result_status as $F_Status){
                                        if($F_Status['F_Status'] == 1){
                                        echo '<a href="../Process_teacher/P_checkFile.php?id='.$val['Pro_id'].'" class="btn btn-space btn-success btn-l">อนุมัติโครงงาน</a>';
                                        }
                                    }
                                    // echo'Exit Foreach';
                                } 
                                ?>     
                                     <br>
                                </td>

                            </tr>
                            <?php $i++; } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/jquery.min.js"> </script>
