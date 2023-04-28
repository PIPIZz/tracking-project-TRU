<div class="panel panel-border-color-primary ">
    <div class="panel-heading panel-heading-divider">
        <h3> นักศึกษาที่ลงทะเบียนทั้งหมด</h3>
    </div>
    <div class="panel-body">
        <table  class="table table-condensed table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th style="text-align: center">ปีการศึกษา</th>
                    <th style="text-align: center">เทอมการศึกษา</th>
                    <th style="text-align: center">วิศวกรรมเครื่องกล</th>
                    <th style="text-align: center">วิศวกรรมไฟฟ้า</th>
                    <th style="text-align: center">วิศวกรรมอุตสาหการ</th>
                    <th style="text-align: center">เทคโนโลยีอุตสาหกรรม</th>
                    <th style="text-align: center">นักศึกษารวมทั้งหมด</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $BA = $_SESSION['sess_BA'];
                
                include('../connect/config.php');                                           
                $sql = "SELECT * FROM project GROUP BY  Term";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                $result = $stmt->fetchAll();
                 $i = 1;
                      foreach($result as $val){
                        $Term = $val['Term'];
                        $Year =$val['Year'];
                        $sql1 = "SELECT * FROM project Where Pro_BA =1 AND Year = '$Year' AND Term = '$Term' ";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $count1 = $stmt1->rowCount();

                        $sql2 = "SELECT * FROM project Where Pro_BA =2 AND Year = '$Year' AND Term = '$Term'";
                        $stmt2 = $conn->prepare($sql2);
                        $stmt2->execute();
                        $count2 = $stmt2->rowCount();

                        $sql3= "SELECT * FROM project Where Pro_BA =3 AND Year = '$Year' AND Term = '$Term'";
                        $stmt3 = $conn->prepare($sql3);
                        $stmt3->execute();
                        $count3 = $stmt3->rowCount();

                        $sql4 = "SELECT * FROM project Where Pro_BA =4 AND Year = '$Year' AND Term = '$Term'";
                        $stmt4 = $conn->prepare($sql4);
                        $stmt4->execute();
                        $count4 = $stmt4->rowCount();
                        

                        $count_total =$count1+$count2+$count3+$count4;
                ?>
                <tr class="odd gradeX">
                    <td style="text-align: center"><?=$val['Year']+543?></td>
                    <td style="text-align: center"><?=$val['Term']?></td>
                    <td style="text-align: center"><?=$count1?></td>
                    <td style="text-align: center"><?=$count2?></td>
                    <td style="text-align: center"><?=$count3?></td>
                    <td style="text-align: center"><?=$count4?></td>
                    <td style="text-align: center"><?=$count_total?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>