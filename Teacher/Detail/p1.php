
<div class="panel panel-default panel-hover">
    <!-- <div class="panel-heading">
        <div class="title">รายชื่อสมาชิก</div>
    </div> -->
    <div class="panel-body table-responsive">
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th style="text-align: center">
                        ลำดับ
                    </th>
                    <th style="text-align: center">
                        รหัสนักศึกษา
                    </th>
                    <th style="text-align: center">
                        ชื่อ-นามสกุล
                    </th>
                    <th style="text-align: center">
                        ภาค
                    </th>

                    <th style="text-align: center">
                        เบอร์โทร
                    </th>
                    <th style="text-align: center">
                        เกรด
                    </th>
                </tr>
            </thead>
            <tbody class="no-border-x">
                <?php
                                    include('../connect/config.php');
                                    $sql = "SELECT * FROM project_detail as d INNER JOIN student as s ON s.id=d.Stu_id INNER JOIN ba as b ON b.BA_id=s.Stu_BA INNER JOIN sector as se ON se.Sector_id=s.Sector WHERE Pro_id = '$id' ";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $res = $stmt->fetchAll();
                                    $i = 1;
                                    foreach($res as $val){       
                                 ?>

                <tr>
                    <td style="text-align: center">
                        <h4><?=$i?></h4>
                    </td>
                    <td style="text-align: center">
                        <?=$val['Stu_id'];?>
                    </td>
                    <td style="text-align: center">
                        <?=$val['Stu_name'];?>
                    </td>
                    <td style="text-align: center">
                        <?=$val['Sector_name'];?>
                    </td>
                    <td style="text-align: center">
                        <?=$val['Phone'];?>
                    </td>
                    <td style="text-align: center">
                        <?=$val['Grade'];?>
                    </td>
                </tr>

                <?php     $i++;    }         ?>
            </tbody>
        </table>
    </div>
</div>