<?php
            session_start();
            include('../../connect/config.php');
            $id = $_SESSION['sess_id'];
            $sql = "SELECT * FROM project_detail as d INNER JOIN project as p ON d.Pro_id = p.Pro_id Where Stu_id = '$id' ";
            $stmt = $conn->prepare($sql);
            $stmt ->execute();
            $res = $stmt->fetch();

            
?>
<div class="card">
    <div class="card-body">
        <h3>ผลสอบโครงงาน</h3>
        <h4 class="text-center"> ผลการสอบโครงงานของ Project 1 <br><br>
            ชื่อ Project <?= $res['Pro_name'];?> <br><br>
            ผลการสอบ :
                                    <?php if($res['Grade']== null){
                                        echo'Waiting Grade';
                                            }else{
                                                if($res['Grade']== 'F'){
                                                    echo 'ไม่ผ่าน';
                                                }else if($res['Grade']== 'P'){
                                                    echo 'ไม่ผ่าน';
                                                }else{
                                                    echo 'ผ่าน';
                                                }
                                                
                                            }
                                    ?>
        </h4>
    </div>
</div>