<div class="main-content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">เพิ่มผู้ใช้
                    <div class="tools">
                        <span><a class="btn btn-xl  btn-success" href="Add_T.php">เพิ่มข้อมูลผู้ใช้</a>
                        </span>
                    </div>
                </div>
                <form method="post">
                    <div class="panel-body">
                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                            <thead>
                                <tr>
                                    <th>ลับดับที่</th>
                                    <th>รหัสผู้ใช้</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>สาขา</th>
                                    <th>ตำแหน่ง</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $BA=$_SESSION['sess_BA'];
                                include('../connect/config.php');                                
                                $sql = "SELECT * FROM teacher  INNER JOIN ba ON BA_id = T_BA WHERE T_name NOT LIKE '---%'";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                $i = 1;
                                    foreach($result as $val){
                                        if($val['T_Status'] == "Teacher"){
                                            $T_Status = "อาจารย์ที่ปรึกษา";
                                          }elseif($val['T_Status'] == "T_Admin"){
                                            $T_Status =  "อาจารย์ที่ปรึกษาและแอดมิน";
                                          }elseif($val['T_Status'] == "Admin"){
                                            $T_Status =  "แอดมิน";
                                          }elseif($val['T_Status'] == "Secretary"){
                                            $T_Status =  "เลขาคณะ";
                                          }

                                ?>
                                <tr class="odd gradeX">
                                    <td><?=$i?></td>
                                    <td><?=$val['T_id']?></td>
                                    <td><?=$val['T_name']?></td>
                                    <td><?=$val['BA_name']?></td>
                                    <td><?php echo $T_Status;?></td>
                                    <td>
                                     <a href="index.php?menu=edit_t&T_id=<?=$val['T_id'];?>"
                                            class="btn btn-space btn-primary btn-lg ">
                                            แก้ไข
                                        </a>
                                        <a href="../Process_Faculty/P_Del_teacher.php?T_id=<?=$val['T_id'];?>"
                                            class="btn btn-space btn-danger btn-lg ">
                                            ลบ
                                        </a>

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
<script src="../assets/jquery.min.js"> </script>
